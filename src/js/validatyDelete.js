//* Alerta para confirmação de exclusão
const deletar = () => {
  var c = confirm("Deseja excluir?");
  if (c === true) {
    return true;
  } else {
    return false;
  }
};
