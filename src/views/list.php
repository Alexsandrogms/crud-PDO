<?php
session_start();

require_once '../model/FornecedorDao.php';

if(isset($_SESSION['return-update'])) {
  echo $_SESSION['return-update'];
  //* Destruida a sessão
  session_destroy();
  header('Refresh:1');
}

if(isset($_SESSION['return-delete'])) {
  echo $_SESSION['return-delete'];
  //* Destruida a sessão
  session_destroy();
  header('Refresh:1');
}

$fornecedorDao = new FornecedorDao();
$fornecedores = $fornecedorDao->read();

$row = (array)$fornecedores;

if(count($row) <= 0): 
  echo '<div style="text-align: center; color: red;"> <h2>Nenhum registrado foi encontrado!</h2><img src="../assets/search.svg" style="width: 40%; margin-top: 80px; opacity: 0.7;"/></div>'; 
  echo '<a href="./admin.php"><input type="button" value="Voltar" style="padding: 5px 20px ;background: green; color: #fff;" /></a>';
else:
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/list.css" />
    <link rel="stylesheet" href="../css/global.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div class="container">
        <div class="row-header">
          <nav>
            <div class="navbar">
              <a href="../../index.php" id="add"><p>Novo Fornecedor</p></a>
              <a href="#" id="add"><p>Fornecedores</p></a>
            </div>
          </nav>
        </div>
        <section>
          <!--for demo wrap-->
          <h1>Fornecedores</h1>
          <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nome Completo</th>
                  <th>Email</th>
                  <th>CNPJ</th>
                  <th title="Número '1' está ativo '0' inativo">Status</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
              <tbody>
                <?php foreach($fornecedores as $fornecedor): ?>
                <tr>
                  <td id="cod"><?php echo $fornecedor['cod'] ?></td>
                  <td><?php echo $fornecedor['nome'] ?></td>
                  <td><?php echo $fornecedor['email'] ?></td>
                  <td><?php echo $fornecedor['cnpj'] ?></td>
                  <td><?php echo $fornecedor['status']?>
                    <a class="edit" href="../views/update.php?id=<?php echo $fornecedor['cod']; ?>">Editar</a>
                    <a href="../controller/delete.php?cod=<?php echo $fornecedor['cod'] ?>" class="del" onclick="return deletar()">Excluir</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>
        <div class="row-footer">
          <p>copyright © 2020 - <a href="https://www.linkedin.com/in/alexsandrogomes">Alexsandro Gomes Paiva</a></p>
        </div>
    </div>
    <script src="../js/validatyDelete.js"></script>
  </body>
</html>
<?php endif; ?>