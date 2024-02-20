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
      "nav-links" => ["Register Users", "Analise Registers"]
    ],
    "es" => [
      "nav-links-title" => "pestañas de la aplicación",
      "nav-links" => ["Registrar Usuarios", "Analizar Registros"]
    ],
  ];

  public $userLanguage = "pt-br";
  public $content = null;

  static function getUserLanguage() {
    try {
      if (!isset($_GET["lang"]) || $_GET["lang"] === "") {
        return "pt-br";
      } 
      else if (!array_key_exists($_GET["lang"], self::$availableContentLanguage)) {
        throw new \Exception(
          "<p class='warning'>> user-lang --get</p>".
          "<p class='warning'>> 404 language not found</p>"

        );
      } else {
        return $_GET["lang"];
      }
    } catch(\Exception $exc) {
      echo $exc->getMessage();
      return "pt-br";
    }
  } 

  private function getContent() {
    $this->userLanguage = PageContent::getUserLanguage();
    $this->content = PageContent::$availableContentLanguage[$this->userLanguage];
  }

  public function __construct() {
    $this->getContent();
  }
}