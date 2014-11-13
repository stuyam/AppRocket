<?php

class PageController extends \BaseController {

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
    $userid = Auth::id();
    $all_post = Input::all();
    $id = Input::has('id') ? Input::get('id') : false;
    //Check to make sure the person owns the page they are trying to edit
    if( ! Page::where('user_id', $userid)->where('id', $id)->first() && $id != false)
    {
      return "You don't have permission to change this App Rocket Page";
    }
    $validator = Validator::make($all_post,
      [
        'name'              => "required|min:3|max:255|unique:pages,name,$id|alpha_dash",
        'title'             => 'required',
        'about'             => 'required',
        'text_color'        => 'required',
//        'screenshot'        => 'required|image',
        'background_image'  => 'image',
        'app_store'         => 'url',
      ]
    );

    if ($validator->fails())
    {
        return Redirect::back()->withInput()->withErrors($validator);
    }

    $background = $this->getBackground($all_post, Input::file('background'));

    $images = ['image', 'image2', 'image3', 'image4'];
    foreach($images as $i) {
      if(Input::hasFile($i))
        $screens[] = $this->getScreens(Input::file($i));
    }

    $this->savePage($id, $userid, $all_post, $background, $images);

    return Redirect::to("/$all_post[name]");
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
    if($input['back_option'] === 'color')
      if(substr($input['background_color'], 0, 1) === '#')
        return $input['background_color'];
      else
        return '#'.$input['background_color'];
    else
    {
      $background = md5(uniqid('backgroundID', true)).'.'.$image->getClientOriginalExtension();
      $image->move(public_path().'/backgrounds', $background);
    }
  }

  private function getScreens($image)
  {
    $img = md5(uniqid('imageID', true)).$image->getClientOriginalExtension();
    $image->move(public_path().'/screens', $img);
    return $img;

  }

  private function savePage($id, $userid, $data_input, $background, $images){
    $data = array_intersect_key($data_input, array_flip([
      'title',
      'about',
      'store_url',
      'copyright',
      'phone_color',
      'text_color',
    ]));

    $data['background'] = $background;
    $data['images']     = $images;

    if( $id ){
      $page = Page::find($id);
    }
    else {
      $page = new Page;
      $page->user_id = $userid;
    }
    $page->name = strtolower($data_input['name']);
    $page->data = json_encode($data);
    $page->save();
  }
}