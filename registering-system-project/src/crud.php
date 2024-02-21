<?php 


class DatabaseCrud {
  public $connection;
  
  function __construct() {
    $this->createConnection();
  }
  
  private function createConnection() {
    $database = [
      "host" => "localhost",
      "dbname" => "ry_registers",
      "user" => "root",
      "password" => "2409SQLGustav@@2409"
    ];
    try {
      $this->connection = new PDO(
        "mysql:host={$database["host"]};dbname={$database["dbname"]}",
        $database["user"],
        $database["password"]
      );
    } catch(Exception $exc) {
      echo "<p class='main__greeting-texts__form-status-text'>Conexão com banco de dados falhou: {$exc->getMessage()}</p>";
    }
  }

  public function setSQLStatement($entryStatement) {
    try {
      if (str_contains($entryStatement, "SELECT")) {
        return $this->connection->query($entryStatement);
      }
      $this->connection->query($entryStatement);
    } catch(Exception $exc) {
      echo "Erro ao criar registro no banco de dados: {$exc->getMessage()}";
      return;
    } 

    if (str_contains($entryStatement, "INSERT INTO")) {
      unset($_POST);
      header("Location: ".$_SERVER['PHP_SELF']);
    }
  }
}