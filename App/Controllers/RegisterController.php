<?php 
  namespace App\Controllers;

  class RegisterController {
    public function index(){
      if(isset($_POST['cpf']) && isset($_POST['creci']) && isset($_POST['nome'])){
        $cpf = $_POST['cpf'];
        $creci = $_POST['creci'];
        $nome = $_POST['nome'];

        $instance = \App\SQLiteConnection::getInstance();
        $registro = $instance->connect()->prepare("INSERT INTO Corretores values(null, ?, ?, ?)");
        $registro->execute(array($nome, $cpf, $creci));
        header('Location: /?success');
        exit();
      } else{
        header('Location: /?error');
        exit();
      }
      
    }
  }
?>