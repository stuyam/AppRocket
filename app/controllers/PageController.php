<?php

use AppRocket\FileHandler;
use AppRocket\Validate;
use AppRocket\DataNormalizer;

class PageController extends \BaseController {

  protected $fileHandler;
  protected $validate;
  protected $page;
  protected $dataNormalizer;

  public function __construct(FileHandler $fileHandler, Validate $validate, Page $page, DataNormalizer $dataNormalizer)
  {
    $this->fileHandler    = $fileHandler;
    $this->validate       = $validate;
    $this->page           = $page;
    $this->dataNormalizer = $dataNormalizer;
  }

  public function edit()
  {
    $viewData = $this->dataNormalizer->editorViewData(Input::all());
    return View::make('edit', $viewData);
  }

	public function editExisting($name)
  {
    if ($page = Page::whereName($name)->first()) {
      $data = json_decode($page['data'], true);
      $data['name'] = $name;
      $data['id'] = $page->id;
      $viewData = $this->dataNormalizer->editorViewData(Input::all(), $data);
      return View::make('edit', $viewData);
    }
    return '404';
	}

  public function editPost()
  {
    $user_id          = Auth::id();
    $post             = Input::all();
    $id               = Input::has('id') ? Input::get('id') : false;
    $background_image = Input::file('background_image');

    //Check to make sure the person owns the page they are trying to edit
    if( $this->page->canEditName($user_id, $id) )
      return "You don't have permission to modify this App Rocket Page";

    if( $validation = $this->validate->edit($post, $id) )
      return Redirect::back()->withInput()->withErrors($validation);

    $background = $this->getBackground($post, $background_image);

    $images = ['screen-0', 'screen-1', 'screen-2', 'screen-3'];
    foreach($images as $i) {
      if(Input::hasFile($i))
        $screens[$i.'-meta'] = $this->fileHandler->nameFile(Input::file($i));
      else
        $screens[$i.'-meta'] = null;
    }

    $page_id = $this->page->savePage($id, $user_id, $post, $background, $screens);

    if( ! $this->dataNormalizer->isFirstCharacterHex($background) )
      $this->fileHandler->saveFile($background_image, $page_id, $background);

    foreach($images as $key=>$i) {
      if(Input::hasFile($i))
         $this->fileHandler->saveFile(Input::file($i), $page_id, $screens[$key]);
    }

    return Redirect::to("/$post[name]");
  }

  public function view($name){
    $page = Page::where('name', '=', $name)->first();
    if( ! $page)
    {
      return Response::make('404 Page Not Found!');
    }
    $user = User::where('id', '=', $page->user_id)->first();

    if ( ! $user->subscribed())
    {
      return Response::make('404 Page Not Found!');
    }

    $page['data'] = json_decode($page['data'], true);
    return View::make('dump', $page);
  }

  private function getBackground($input, $image)
  {
    if($input['back_option'] == 'color'){
      if($this->dataNormalizer->isFirstCharacterHex($input['background_color']))
        return $input['background_color'];
      else
        return '#'.$input['background_color'];
    }
    else
    {
      return $this->fileHandler->nameFile($image);
    }
  }

}