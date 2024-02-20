<?php 

require_once __DIR__ . "/../src/page.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Yourself</title>
</head>
<body>
  <main>
    <header>
      <div>
        <p>>register-yourself.com</p>
        <div class="flags-container">
          <a href="?lang=pt-br">
            <img src="./media/pt-br-flag-icon.png" alt="Ícone de bandeira para representar idiomas.">
          </a>
          <a href="?lang=en">
            <img src="./media/en-flag-icon.png" alt="Ícone de bandeira para representar idiomas.">
          </a>
          <a href="?lang=es">
            <img src="./media/es-flag-icon.png" alt="Ícone de bandeira para representar idiomas.">
          </a>
        </div>
      </div>
      <p>>user-lang --set <?php echo strtoupper($_GET["lang"])?></p>
    </header>
    <p>><?php echo $page->content["nav-links-title"]?> --get</p>
    <nav>
      <?php 
        $navlinks = $page->content["nav-links"];
        foreach($navlinks as $index => $link) {
          if ($index === 0) {
            $href = "";
          } else {
            $href = "register-user";
          }

          echo 
          "<a href='?lang={$_GET["lang"]}&tab={$href}'>" . 
            $link . 
          "</a>";
        }
      ?>
    </nav>
  </main>
</body>
</html>