var modal = document.getElementById("themNhanVienModal");
var btn = document.querySelector(".tim_kiem_them button[type='button']");
var span = document.getElementsByClassName("dong_cua_so")[0];
var form = document.getElementById("themNhanVienForm");

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

form.addEventListener("submit", function(event) {
  event.preventDefault();
  var ten_day_du = document.getElementById("ten_day_du").value;
  var ngay_thang_nam_sinh = document.getElementById("ngay_thang_nam_sinh").value;
  var gioi_tinh = document.getElementById("gioi_tinh").value;
  var so_dien_thoai = document.getElementById("so_dien_thoai").value;
  var dia_chi_email = document.getElementById("dia_chi_email").value;
  var dia_chi_thuong_tru = document.getElementById("dia_chi_thuong_tru").value;
  var khungDuoi = document.querySelector(".khung_duoi");
  var nhanVienMoi = document.createElement("div");
  nhanVienMoi.innerHTML = `<p>Tên đầy đủ: ${ten_day_du}, Ngày tháng năm sinh: ${ngay_thang_nam_sinh}, Giới tính: ${gioi_tinh}, Số điện thoại: ${so_dien_thoai}, Địa chỉ email: ${dia_chi_email}, Địa chỉ thường trú: ${dia_chi_thuong_tru}</p>`;
  khungDuoi.appendChild(nhanVienMoi);
  modal.style.display = "none"; // Đóng modal sau khi thêm
});
