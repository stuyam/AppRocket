<?php

use AppRocket\FileHandler;
use AppRocket\Validate;

class PageController extends \BaseController {

  protected $fileHandler;
  protected $validate;
  protected $page;

  public function __construct(FileHandler $fileHandler, Validate $validate, Page $page)
  {
    $this->fileHandler = $fileHandler;
    $this->validate = $validate;
    $this->page = $page;
  }

  public function edit()
  {
    return View::make('edit');
  }

	public function editExisting($name)
  {
    if ($page = Page::whereName($name)->first()) {
      $data = json_decode($page['data'], true);
      $data['name'] = $name;
      $data['id'] = $page->id;
      return View::make('edit', ['old_data' => $data]);
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

    $this->validate->edit($post, $id);

    $background = $this->getBackground($post, $background_image);

    $images = ['screenshot1', 'screenshot2', 'screenshot3', 'screenshot4'];
    foreach($images as $i) {
      if(Input::hasFile($i))
        $screens[] = $this->fileHandler->nameFile(Input::file($i));
    }

    $page_id = $this->page->savePage($id, $user_id, $post, $background, $screens);

    if( ! $this->isFirstCharacterHex($background) )
      $this->fileHandler->saveFile($background_image, $page_id, $background);

    $j = 0;
    foreach($images as $i) {
      if(Input::hasFile($i))
         $this->fileHandler->saveFile(Input::file($i), $page_id, $screens[$j]);
      $j++;
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
      if($this->isFirstCharacterHex($input['background_color']))
        return $input['background_color'];
      else
        return '#'.$input['background_color'];
    }
    else
    {
      return $this->fileHandler->nameFile($image);
    }
  }

  private function isFirstCharacterHex($val)
  {
    return substr($val, 0, 1) === '#';
  }
}