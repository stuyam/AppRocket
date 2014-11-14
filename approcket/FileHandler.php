<?php namespace AppRocket;

class FileHandler {

  public function saveFile($file, $folder, $filename)
  {
    $file->move(public_path().'/uploads/'.$folder, $filename);
  }

  public function nameFile($file)
  {
    return md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
  }
} 