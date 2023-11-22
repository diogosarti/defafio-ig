<?php 
  namespace App\Views;

  class MainView{
    public static function render($filename, $data = []){
      extract($data);
      include ('pages/'.$filename.".php");
    }
  }

?>