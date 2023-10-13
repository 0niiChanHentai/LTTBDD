var modal = document.getElementById("themNhanVienModal");
var btn = document.querySelector(".tim_kiem_them button[type='button']"); // Chú ý: đã thay đổi từ 'submit' sang 'button'
var span = document.getElementsByClassName("close")[0];

btn.onclick = function(event) {
  event.preventDefault();
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}