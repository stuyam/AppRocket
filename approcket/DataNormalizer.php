<?php namespace AppRocket;

class DataNormalizer {

  public function editorViewData($input, $saved_data = [])
  {
    $value = [
      'id',
      'name',
      'title',
      'about',
      'app_store',
      'copyright',
      'phone_color',
      'background',
      'text_color',
      'screen-0-meta',
      'screen-1-meta',
      'screen-2-meta',
      'screen-3-meta',
    ];

    foreach($value as $v)
    {
      if( isset($input[$v]) )
        $data[$v] = $input[$v];
      elseif( isset($saved_data[$v]) )
        $data[$v] = $saved_data[$v];
      else
        $data[$v] = null;
    }

    return ['data' => $data];
  }

  public function isFirstCharacterHex($val)
  {
    return substr($val, 0, 1) === '#';
  }
} 