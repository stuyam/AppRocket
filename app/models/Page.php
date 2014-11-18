<?php

class Page extends \Eloquent {
	protected $fillable = ['user_id', 'name', 'data'];

  public function doesUserOwnPage($user_id, $name)
  {
    return $this->where('user_id', $user_id)->whereId($name)->first();
  }

  public function canEditName($user_id, $id)
  {
    return ! $this->where('user_id', $user_id)->where('id', $id)->first() && $id != false;
  }

  public function savePage($id, $user_id, $data_input, $background, $screens){
    $data = array_intersect_key($data_input, array_flip([
      'title',
      'about',
      'app_store',
      'google_play',
      'facebook',
      'twitter',
      'analytics',
      'copyright',
      'phone_color',
      'text_color',
    ]));

    $data['background']  = $background;
    $data = array_merge($data, $screens);

    if( $id ){
      $page = $this->find($id);
    }
    else {
      $page = new Page;
      $page->user_id = $user_id;
    }
    $page->name = strtolower($data_input['name']);
    $page->data = json_encode($data);
    $page->save();
    return $page->id;
  }
}