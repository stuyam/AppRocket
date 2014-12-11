<?php namespace AppRocket;

use Illuminate\Support\Facades\Response;

class Respond {

  protected $response;

  public function __construct(Response $response){
    $this->response = $response;
  }

  public function with404(){
    return $this->response->make('Page not found 404!', 404);
  }

} 