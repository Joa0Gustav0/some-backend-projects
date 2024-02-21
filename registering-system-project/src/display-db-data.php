<?php

require __DIR__ . "/crud.php";

class RegistersTable {
  static $dbData;

  private $content;

  function __construct() {
    if (RegistersTable::$dbData = 
    new DatabaseCrud()) {
      RegistersTable::$dbData = RegistersTable::$dbData->setSQLStatement("SELECT * FROM registers;");
      RegistersTable::generateTable();
    }
  }



  static function generateTable() {
    if (!RegistersTable::$dbData) {
      echo "<p>Nenhum registro conseguiu ser capturado... 🔎</p>";
      return;
    }

    foreach(RegistersTable::$dbData as $index => $register) {
      $index++;

      echo "<div class='register-container'>";
      echo "<h1>Registro {$index}</h1>";
      echo 
        "<div class='register-container__informations'>" . 
        "<p class='register-container__informations__topic'>👤 Nome:</p>" .
        "<p class='register-container__informations__data'>{$register["UserName"]}</p>" . 
        "</div>";
      echo 
        "<div class='register-container__informations'>" . 
        "<p class='register-container__informations__topic'>⏳ Idade:</p>" .
        "<p class='register-container__informations__data'>{$register["UserAge"]}</p>" . 
        "</div>";
      echo 
        "<div class='register-container__informations'>" . 
        "<p class='register-container__informations__topic'>📧 Email:</p>" .
        "<p class='register-container__informations__data'>{$register["UserEmail"]}</p>" . 
        "</div>";
      echo 
        "<div class='register-container__informations'>" . 
        "<p class='register-container__informations__topic'>🎈 Hobby:</p>" .
        "<p class='register-container__informations__data'>{$register["UserHobbie"]}</p>" . 
        "</div>";
      echo "</div>";
    }
  }
}