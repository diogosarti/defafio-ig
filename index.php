<?php
  require_once("vendor/autoload.php");
  use App\SQLiteConnection;
  $pdo = SQLiteConnection::getInstance()->connect();
  $pdo->exec("
        CREATE TABLE IF NOT EXISTS Corretores (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome varchar(255) NOT NULL,
            cpf varchar(11) NOT NULL,
            creci varchar(255) NOT NULL
  )");
  $app = new \App\Application;
  
  $app->run();
?>
