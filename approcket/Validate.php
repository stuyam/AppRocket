<?php namespace AppRocket;

use \Validator;
use \Redirect;

class Validate {

  public function edit($post, $id)
  {
    $validator = $this->validate($post,
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
    return $validator->fails();
  }

  private function validate($post,$checks)
  {
    return Validator::make($post, $checks);
  }
} 