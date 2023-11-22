<?php 
  namespace App\Controllers;
  use App\Models\Corretor;
  
  class DeletecorretorController{
    public function index(){
      $id = $_POST['corretorId'];
      $success = Corretor::delete($id);
      if ($success) {
          header("Location: /?excluido=true");
          exit();
      } else {
          header("Content-Type: application/json");
          echo json_encode(["success" => false]);
      }
      echo json_encode(['success' => $success]);
    }
  }
?>