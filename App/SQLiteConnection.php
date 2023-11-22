<?php
  namespace App;
  
  class SQLiteConnection {
    private static $instance = null;
    private $pdo;

    public function __construct() {
        $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new SQLiteConnection();
        }
        return self::$instance;
    }

    public function connect() {
        return $this->pdo;
    }
  }
?>
