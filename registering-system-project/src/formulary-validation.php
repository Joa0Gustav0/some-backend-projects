<?php

namespace App;

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
  static $validationError = 0;

  static function validateSingleInput($entryInputName, $entryInputData) {
    if (
      !contains("text", $entryInputData)
      && !contains("number", $entryInputData)) {
      echo 
      "<p class='main__greeting-texts__form-status-text'>⚠ O campo '" . $entryInputName ."' deve ser preenchido corretamente.</p>";
      FormularyValidation::$validationError++;
      return;
    }

    
    try {
      if ($entryInputName === "nome" && contains("number", $entryInputData)) {
        FormularyValidation::$validationError++;
        throw new \Exception("O campo '" . $entryInputName . "' não pode conter números");
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
  }
}