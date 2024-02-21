<?php

class Formulary {
  public $content = "";

  public function addInput($label, $type) {
    $this->content .= 
    "<label for='{$label}'>" . ucfirst($label) . "</label><input autocomplete='off' type='{$type}' name='{$label}' id='{$label}' min='0' " . 
     Formulary::getInputMaxAttributeBasedOnType($type)
    . " />";
    return $this;
  }

  static function getInputMaxAttributeBasedOnType($entryType) {
    switch($entryType) {
      case "text":
        return "maxlength='50'";
        break;
      case "number":
        return "max='150'";
        break;
    }
  }

  public function __construct($formularyActionFile) {
    $this->content = "<form action='{$formularyActionFile}' method='POST'>";
  }

  public function getResultFormulary() {
    return $this->content . "<input type='submit' name='submit' id='submit'></form>";
  }
}

function createNewFormulary() {
  $formularyActionFile = "index.php";
  
  $newFormulary = new Formulary($formularyActionFile);
  $newFormulary->addInput("nome", "text")->addInput("idade", "number")->addInput("email", "text")->addInput("hobbie", "text");
  
  return $newFormulary->getResultFormulary();
}

function getTabContent($tab) {
  switch ($tab) {
    case "register-tab":
      return createNewFormulary();
      break;
    case "view-tab":
      return "Table";
      break;
  }
}