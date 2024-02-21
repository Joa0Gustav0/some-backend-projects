<?php 
  require_once __DIR__ . "/src/formulary-validation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/formulary.css">
  <title>Registro Já | Criação de Registro</title>
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
    <div class="main__greeting-texts">
      <h1 class="main__greeting-texts__title-text">👋 Registre-se Aqui!</h1>
      <?php new FormularyValidation() ?>
    </div>
    <form action="index.php" method="POST">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" autocomplete="off" placeholder="Insira seu nome..." maxlength="20" required>
      <label for="idade">Idade</label>
      <input type="number" name="idade" id="idade" placeholder="Insira sua idade..." min="0" max="150" required/>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" autocomplete="off" placeholder="Insira seu email..." maxlength="50" required/>
      <label for="hobbie">Hobbie</label>
      <input type="text" name="hobbie" id="hobbie" autocomplete="off" placeholder="Insira um hobbie" maxlength="20" required/>
      <input type="submit" name="submit" id="submit" value="Registrar Já!"/>
    </form>
  </main>
</body>
</html>