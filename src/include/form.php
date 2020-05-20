<!DOCTYPE html>
<html lang="pt-br">
  <head> </head>
  <body>
    <div class="row">
      <form
        class="col s12 push-m2"
        action="./controller/createUserCotroller.php"
        method="POST"
      >
        <div class="row">
          <div class="input-field col s8" id="input-group">
            <input
              id="name"
              name="name"
              type="text"
              class="validate"
              required
            />
            <label for="name">Nome</label>
            <span
              class="helper-text"
              data-error="Seu nome é obrigatório"
              data-success="Excelente"
              >Informe seu nome</span
            >
          </div>
          <div class="input-field col s8">
            <input
              id="email"
              name="email"
              type="email"
              class="validate"
              required
            />
            <label for="email">Email</label>
            <span
              class="helper-text"
              data-error="Informe um email válido, tente novamente!"
              data-success="Excelente"
              >Informe um email para contato</span
            >
          </div>
          <div class="input-field col s8">
            <input
              id="cnpj"
              name="cnpj"
              type="text"
              class="validate"
              maxlength="14"
              minlength="5"
              required
            />
            <label for="cnpj">CNPJ</label>
            <span
              class="helper-text"
              data-error="OPS! tente novamente"
              data-success="Excelente"
              >Informe seu CNPJ</span
            >
          </div>
          <div class="input-field col s8">
            <p>Qual seu status de fornecedor?</p>
            <p>
              <label>
                <input name="state" type="radio" value="1" required/>
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
  </body>
</html>
