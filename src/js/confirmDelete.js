const confirmDelete = () => {
  var res = confirm("Deseja realmente excluir?");
  return res === true ? true : false;
};

const session = document.getElementById("status");

if (session) {
  setTimeout(() => {
    session.style.display = "none";
  }, 2000);
}
