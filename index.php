<?php 
session_start();

//* Verificando se existe a sessão
if(isset($_SESSION['return'])) {
  echo $_SESSION['return'];
  //* Destruida a sessão
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./src/css/index.css" />
    <link rel="stylesheet" href="./src/css/global.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="row-header">
        <nav>
          <div class="navbar">
            <a href="#"><p>Novo Fornecedor</p></a>
            <a href="./src/views/list.php"><p>Fornecedores</p></a>
          </div>
        </nav>
      </div>
      <div class="row-form">
        <div class="col"></div>
        <div class="col">
          <form action="./src/controller/create.php" method="post">
            <div class="form-input">
              <label for="nome">Full name</label>
              <input type="text" name="nome" id="nome" maxlength="80" required/>
            </div>
            <div class="form-input">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" maxlength="80" required />
            </div>
            <div class="form-input">
              <label for="cnpj">CNPJ</label>
              <input type="text" name="cnpj" id="cnpj" maxlength="14" required />
            </div>
            <div class="form-input-radio">
              <label for="select">Status:</label>
              <label class="status" for="one"><input type="radio" id="one"  name="status"  value="1">Ativo</label>
              <label class="status" for="two"><input type="radio" id="two" name="status" value="0">Inativo</label>
            </div>
            <div class="form-input">
              <button type="submit">Cadastre-se</button>
            </div>
          </form>
        </div>
        <div class="col"></div>
      </div>
      <div class="row-footer">
        <p>copyright © 2020 - <a href="https://www.linkedin.com/in/alexsandrogomes">Alexsandro Gomes Paiva</a></p>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/6fbf1874ed.js" crossorigin="anonymous"></script>
  </body>
</html>
