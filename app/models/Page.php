<?php

class Page extends \Eloquent {
	protected $fillable = ['user_id', 'name', 'data'];

  public function canEditName($user_id, $id)
  {
    return ! Page::where('user_id', $user_id)->where('id', $id)->first() && $id != false;
  }

  public function savePage($id, $userid, $data_input, $background, $images){
    $data = array_intersect_key($data_input, array_flip([
      'title',
      'about',
      'app_store',
      'copyright',
      'phone_color',
      'text_color',
    ]));

    $data['background']  = $background;
    $data['screenshots'] = $images;

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
    return $page->id;
  }
}