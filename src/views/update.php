<?php

session_start();
require_once '../model/FornecedorDao.php';

if(isset($_SESSION['return-update'])):
  echo $_SESSION['return-update'];

  session_destroy();
  header('Refresh:1');
endif;

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])):
    $id = trim($_GET['id']);
    $fornecedorDao = new FornecedorDao();
    $fornecedores = $fornecedorDao->readWhere($id);

    foreach ($fornecedores as $fornecedor):
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/global.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style></style>
  </head>
  <body>
    <div class="container">
      <div class="row-header">
          <nav>
            <div class="navbar">
              <a href="../../index.php" id="add"><p>Novo Fornecedor</p></a>
              <a href="./list.php" id="add"><p>Fornecedores</p></a>
            </div>
          </nav>
        </div>
      <div class="row-form">
        <div class="col"></div>
        <div class="col">
          <form action="../controller/update.php" method="post">
            <div class="form-input" hidden>
              <label for="cod">Cod</label>
              <input type="text" name="cod" id="cod" maxlength="1" value="<?php echo $fornecedor['cod']; ?>"/>
            </div>
            <div class="form-input">
              <label for="nome">Nome completo</label>
              <input type="text" name="nome" id="nome" maxlength="80" value="<?php echo $fornecedor['nome']; ?>" required/>
            </div>
            <div class="form-input">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" maxlength="80" value="<?php echo $fornecedor['email']; ?>" required />
            </div>
            <div class="form-input">
              <label for="cnpj">CNPJ</label>
              <input type="text" name="cnpj" id="cnpj" maxlength="14" value="<?php echo $fornecedor['cnpj']; ?>" required />
            </div>
            <div class="form-input-radio">
              <label for="select" title="Número '1' está ativo '0' inativo">Status: <?php echo $fornecedor['status']; ?></label>
              <label class="status" for="one"><input type="radio" id="one"  name="status"  value="1" required>Ativo</label>
              <label class="status" for="two"><input type="radio" id="two" name="status" value="0" >Inativo</label>
            </div>
            <div class="form-input">
              <button type="submit">Atualize seus dados</button>
            </div>
          </form>
        </div>
        <div class="col"></div>
      </div>
      <div class="row-footer">
        <p>copyright © 2020 - <a href="https://www.linkedin.com/in/alexsandrogomes">Alexsandro Gomes Paiva</a></p>
      </div>
    </div>
  </body>
</html>
<?php
    endforeach;
else: 
  header('Location: ./list.php');
endif;
?>