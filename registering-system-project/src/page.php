<?php

namespace App;

class PageContent {

  static $availableContentLanguage = [
    "pt-br" => [
      "nav-links-title" => "abas da aplicação",
      "nav-links" => ["Registrar Usuários", "Analisar Registros"]
    ],
    "en" => [
      "nav-links-title" => "application tabs",
      "nav-links" => ["Registrar Usuários", "Analisar Registros"]
    ],
    "es" => [
      "nav-links-title" => "pestañas de la aplicación",
      "nav-links" => ["Registrar Usuarios", "Analizar Registros"]
    ],
  ];

  static $userLanguage = "pt-br";
  public $content = null;

  static function getUserLanguage() {
    try {
      if (!isset($_GET["lang"]) || $_GET["lang"] === "") {
        return "pt-br";
      } 
      else if (!array_key_exists($_GET["lang"], self::$availableContentLanguage)) {
        throw new \Exception(
          "<p>> user-lang --get</p>".
          "<p>> 404</p>"

        );
      } else {
        return $_GET["lang"];
      }
    } catch(\Exception $exc) {
      echo $exc->getMessage();
    }
  } 

  private function getContent() {
    self::$userLanguage = self::getUserLanguage();
    $this->content = PageContent::$availableContentLanguage[PageContent::$userLanguage];
  }

  public function __construct() {
    $this->getContent();
  }
}

$page = new PageContent();