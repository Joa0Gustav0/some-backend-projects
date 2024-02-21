<?php

require __DIR__ . "/crud.php";

function contains($containType, $entryData) {
  $CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if ($containType === "number") {
    $CHARS = "0123456789";
  }

  $containsChar = false;
  foreach(str_split($entryData) as $char) {
    if (str_contains(strtolower($CHARS), strtolower($char))) {
      $containsChar = true;
    }
  }

  return $containsChar;
}

class FormularyValidation {
  static $validationErrors = 0;

  function __construct() {
    if (FormularyValidation::validateInputs() && count($_POST) > 0) {
      $this->registerUserIntoDatabase();
    }
  }

  function registerUserIntoDatabase() {
    if ($databaseCrud = new DatabaseCrud()) {
      $databaseCrud->setSQLStatement(
        "INSERT INTO registers (UserName, UserAge, UserEmail, UserHobbie) VALUES('{$_POST["nome"]}',{$_POST["idade"]},'{$_POST["email"]}','{$_POST["hobbie"]}')"
      );
    }
  }

  static function validateSingleInput($entryInputName, $entryInputData) {
    if (
      !contains("text", $entryInputData)
      && !contains("number", $entryInputData)) {
      echo 
      "<p class='main__greeting-texts__form-status-text'>⚠ O campo '" . $entryInputName ."' deve ser preenchido corretamente.</p>";
      FormularyValidation::$validationErrors++;
      return;
    }

    
    try {
      if ($entryInputName === "nome" && contains("number", $entryInputData)) {
        FormularyValidation::$validationErrors++;
        throw new \Exception("O campo '" . $entryInputName . "' não pode conter números");
      }
      if ($entryInputName === "email") {
        $checkfulCrud = new DatabaseCrud();
        foreach($checkfulCrud->setSQLStatement("SELECT * FROM registers") as $register) {
          if (strtolower($register["UserEmail"]) === strtolower($entryInputData)) {
            FormularyValidation::$validationErrors++;
            throw new \Exception("O email inserido já está em uso.");
          }
        }
      }
    } catch(\Exception $exc) {
      echo "<p class='main__greeting-texts__form-status-text'>⚠ " . $exc->getMessage() . "</p>";
    }
  }

  static function validateInputs() {
    foreach($_POST as $inputName => $inputData) {
      if ($inputName !== "submit") {
        FormularyValidation::validateSingleInput($inputName, $inputData);
      }
    }

    return FormularyValidation::$validationErrors === 0;
  }
}