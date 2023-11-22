<?php 
  namespace App\Controllers;
  use App\Models\Corretor;

  class HomeController {
    public function index(){
      $corretores = Corretor::getAll();
      
      \App\Views\MainView::render('home', ['corretores' => $corretores]);
    }
  
  }

?>