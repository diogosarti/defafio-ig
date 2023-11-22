<?php
  namespace App;

  class Application
  {
    private $controller;

    private function getUrl(){
      return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    
    private function setApp(){
      $loadName = "App\Controllers\\";
      $url = $this->getUrl();

      if($url == "/"){
        $loadName.="Home";
      }else{
        $url = ltrim($url, '/');
        $loadName.=ucfirst(strtolower($url));
      }

      $loadName.="Controller";

      if(file_exists($loadName.".php")){
        $this->controller = new $loadName();
      } else{
        include('Views\pages\404.php');
        die();
      }
    }

    public function run(){
      $this->setApp();
      $this->controller->index();
    }
  }
?>