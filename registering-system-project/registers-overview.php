<?php 
require __DIR__ . "/src/display-db-data.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/registers.css">
  <title>Registro Já | Registros</title>
</head>
<body>
  <header class="header">
    <div class="header__container">
      <h1 class="header__container__logo-text">RegistroJá.com</h1>
      <nav class="header__container__nav">
        <a class="header__container__nav__navlinks" href="./registers-overview.php">
          Ver Registros
        </a>
        <a class="header__container__nav__navlinks" href="./index.php">
          Criar Registro
        </a>
      </nav>
    </div>
  </header>
  <main class="main">
    <h1 class="main__title-text">👀 Veja Alguns Registros!</h1>
    <?php  
      new RegistersTable();
    ?>
  </main>
</body>
</html>