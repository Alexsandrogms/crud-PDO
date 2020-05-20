<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <link rel="stylesheet" href="public/style.css" />
    <link rel="stylesheet" href="public/style-modal.css" />
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
    <title>Not Found</title>
  </head>
  <style>
    .container h1 {
      color: red;
      font-size: 28px;
      text-align: center;
    }
  </style>
  <body>
    <div class="container">
      <h1>Nenhum registro foi encontrado!</h1>
      <div class="add">
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
          <?php include_once 'form.php' ?>
        </div>
      </div>
    </div>
    <script>
      const modal = document.getElementById("modal");

      const openModal = () => {
        modal.classList.remove("hide");
      };

      const exitModal = () => {
        document.getElementById("button-exit").onclick = () => {
          modal.classList.add("hide");
        };
        window.onclick = (e) => {
          e.target == modal ? modal.classList.add("hide") : false;
        };
      };

      exitModal();

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
