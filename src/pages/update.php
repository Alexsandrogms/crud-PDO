<?php 
  require_once '../model/FornecedorDao.php';

  if(isset($_GET['id']) && !empty($_GET['id'])) :
    $id = $_GET['id'];

    $fornecedor = new FornecedorDao();
    $users = $fornecedor->getUser($id); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../public/style.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atualizar Fornecedor</title>
  </head>
  <body>
    <div class="container">
      <h4 class="center">Atualize os dados</h4>
      <?php foreach ($users as $user) : ?>
      <div class="row">
        <form class="col s12 push-m2" action="../controller/updateUserController.php" method="post">
          <div class="row">
            <input name="cod" type="text" value="<?php echo $user['cod'] ?>"hidden/>
            <div class="input-field col s8" id="input-group">
              <input id="name" name="name" type="text" class="validate" value="<?php echo $user['nome'] ?>" required />
              <label for="name">Nome</label>
              <span
                class="helper-text"
                data-error="Seu nome é obrigatório"
                data-success="Excelente"
                >Informe seu nome</span
              >
            </div>
            <div class="input-field col s8">
              <input id="email" name="email" type="email" class="validate"  value="<?php echo $user['email'] ?>" required />
              <label for="email">Email</label>
              <span
                class="helper-text"
                data-error="Informe um email válido, tente novamente!"
                data-success="Excelente"
                >Informe um email para contato</span
              >
            </div>
            <div class="input-field col s8">
              <input id="cnpj" name="cnpj" type="text" class="validate" value="<?php echo $user['cnpj'] ?>" required />
              <label for="cnpj">CNPJ</label>
              <span
                class="helper-text"
                data-error="OPS! tente novamente"
                data-success="Excelente"
                >Informe seu CNPJ</span
              >
            </div>
            <div class="input-field col s8">
              <p>Deseja atualizar seu status?</p>
              <p>Seu status atual está: <?php echo $user['status'] == 0 ? "Inativo" : "Ativo"; ?></p>
              <p>
                <label>
                  <input name="state" type="radio" value="1" checked/>
                  <span>Ativo</span>
                </label>
              </p>
              <p>
                <label>
                  <input name="state" type="radio" value="0" />
                  <span>Inativo</span>
                </label>
              </p>
            </div>
            <div class="col s8 center">
              <button
                class="btn waves-effect waves-light green"
                type="submit"
                name="action"
              >
                Enviar
                <i class="material-icons right">check</i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <?php endforeach; endif; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
