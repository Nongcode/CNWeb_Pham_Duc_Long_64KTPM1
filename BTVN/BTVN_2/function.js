const addProductBtn = document.getElementById("btnAddProduct");
const editProductBtns = document.querySelectorAll(".editbtn");
const deleteProductBtns = document.querySelectorAll(".deletebtn");

addProductBtn.addEventListener("click", () => openModal("addModal"));
editProductBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.getElementById("SuaID").value = btn.dataset.id;
    document.getElementById("SuaName").value = btn.dataset.name;
    document.getElementById("SuaPrice").value = btn.dataset.price;
    openModal("btnSua");
  });
});
deleteProductBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.getElementById("XoaID").value = btn.dataset.id;
    openModal("btnXoa");
  });
});

function openModal(modalId) {
  document.getElementById(modalId).style.display = "flex";
}

document.querySelectorAll(".close").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.getElementById(btn.dataset.closeModal).style.display = "none";
  });
});
