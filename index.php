<?php

session_start();

require_once './src/model/FornecedorDao.php';

if (isset($_SESSION['sucess'])) {
  echo "<p id='status'>".$_SESSION['sucess']."</p>";
  session_destroy();
}

$fornecedorDao = new FornecedorDao();
$users = $fornecedorDao->getUser(); 
$row = (array) $users; 
if (count($row) <= 0) : 
  include_once './src/include/404.php'; 
else : ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="./src/public/style.css" />
    <link rel="stylesheet" href="./src/public/style-modal.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home page</title>
  </head>

  <body>
    <div class="container">
      <header>
        <h3 class="center">Fornecedores</h3>
      </header>
      <div class="table">
        <table class="striped responsive-table">
          <thead>
            <tr>
              <th>QrCode</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>CNPJ</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
            <tr>
              <td class="hidden"><?php echo $user['cod'] ?></td>
              <td><img id="qrcode" src="./src/img_qrcode/<?php echo $user['img_url']; ?>.png"></td>
              <td><?php echo $user['nome'] ?></td>
              <td><?php echo $user['email'] ?></td>
              <td><?php echo $user['cnpj'] ?></td>
              <td><?php echo $user['status'] ?></td>
              <td>
                <a id="edit" class="btn-floating btn-medium waves-effect waves-light yellow" href="./src/pages/update.php?id=<?php echo $user['cod'] ?>"><i class="material-icons">edit</i></a>
                
                <a 
                  id="del" 
                  class="btn-floating btn-medium waves-effect waves-light red" 
                  href="./src/controller/deleteUserController.php?id=<?php echo $user['cod'] ?>&img=<?php echo $user['img_url']; ?>" onclick="return confirmDelete()">
                  <i class="material-icons">delete</i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="add">
        <p>Adicione novo fornecedor</p>
        <a id="add"  class="btn-floating btn-large waves-effect waves-light" onclick="openModal()"><i class="material-icons">add</i></a>
      </div>
      <!-- Modal -->
      <div class="content-modal hide" id="modal">
        <div class="modal-toshow">
          <h5 class="center">Informe seus dados</h5>
          <a
            class="btn-floating btn-small waves-effect waves-light"
            id="button-exit"
            ><i class="material-icons">close</i></a
          >
          <?php include_once './src/include/form.php' ?>
        </div>
      </div>
      <footer class="footer">
        <div class="footer-copyright center">
          <p>
            Copyright © 2020 -
            <a href="https://www.linkedin.com/in/alexsandrogomes"
              >Alexsandro Gomes Paiva</a
            >
          </p>
        </div>
      </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./src/js/modal.js"></script>
    <script src="./src/js/confirmDelete.js"></script>
  </body>
</html>
<?php endif; ?>
