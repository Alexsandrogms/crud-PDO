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
