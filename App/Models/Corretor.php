<?php
namespace App\Models;
use App\SQLiteConnection;

class Corretor {
    public $id;
    public $nome;
    public $cpf;
    public $creci;

    public function __construct($id, $nome, $cpf, $creci) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->creci = $creci;
    }

    public static function getAll() {
        $corretores = [];
        $pdo = SQLiteConnection::getInstance()->connect();
        $result = $pdo->query("SELECT * FROM corretores");
        while($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $corretores[] = new Corretor($row['id'], $row['nome'], $row['cpf'], $row['creci']);
        }
        return $corretores;
    }

    public static function delete($id) {
      $pdo = SQLiteConnection::getInstance()->connect();
      $stmt = $pdo->prepare("DELETE FROM corretores WHERE id = :id");
      $stmt->execute([':id' => $id]);
      return $stmt->rowCount() > 0;
  }  
}
?>