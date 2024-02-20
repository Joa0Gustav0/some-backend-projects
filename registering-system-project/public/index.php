<?php 

require_once __DIR__ . "/../src/page.php";

?>

<!DOCTYPE html>
<html translate="no">
<head>
  <meta charset="UTF-8">
  <meta name="google" content="notranslate">
  <link rel="stylesheet" href="../src/styles/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Yourself</title>
</head>
<body>
  <main>
    <?php $page = new App\PageContent() ?>
    <header>
      <div>
        <p>>register-yourself.com</p>
        <div class="flags-container">
          <a class="pt-br-flag" href="?lang=pt-br">
            <img src="./media/pt-br-flag-icon.png" alt="Ícone de bandeira para representar idiomas.">
          </a>
          <a class="en-flag" href="?lang=en">
            <img src="./media/en-flag-icon.png" alt="Ícone de bandeira para representar idiomas.">
          </a>
          <a class="es-flag" href="?lang=es">
            <img src="./media/es-flag-icon.png" alt="Ícone de bandeira para representar idiomas.">
          </a>
        </div>
      </div>
      <p>>user-lang --set <?php echo strtoupper($page->userLanguage)?></p>
    </header>
    <p>><?php echo $page->content["nav-links-title"]?> --get</p>
    <nav>
      <?php 
        $navlinks = $page->content["nav-links"];
        foreach($navlinks as $index => $link) {
          if ($index === 0) {
            $href = "";
            if (isset($_GET["tab"])) {
              if ($_GET["tab"] !== "view-users") {
                $class = "nav-link active";
              } else {
                $class = "nav-link";
              }
            } else {
              $class = "nav-link active";
            }
          } else {
            $href = "view-users";
            if (isset($_GET["tab"])) {
              if ($_GET["tab"] === "view-users") {
                $class = "nav-link active";
              } else {
                $class = "nav-link";
              }
            } else {
              $class = "nav-link";
            }
          }


          echo 
          "<a class='{$class}' href='?lang={$_GET["lang"]}&tab={$href}'>" . 
            $link . 
          "</a>";
        }
      ?>
    </nav>
  </main>
</body>
</html>