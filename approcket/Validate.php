<?php namespace AppRocket;

use \Validator;

class Validate {

  public function edit($post, $id)
  {
    $validator = Validator::make($post,
      [
        'name'              => "required|min:3|max:255|unique:pages,name,$id|alpha_dash",
        'title'             => 'required',
        'about'             => 'required',
        'text_color'        => 'required',
        'screenshot1'        => 'required|image',
        'background_image'  => 'image',
        'app_store'         => 'url',
      ]
    );

    if ($validator->fails())
    {
      return Redirect::back()->withInput()->withErrors($validator);
    }
  }
} 