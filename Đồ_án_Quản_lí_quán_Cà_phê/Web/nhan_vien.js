// Mảng để lưu trữ thông tin nhân viên
var danhSachNhanVien = [];

var modal = document.getElementById("themNhanVienModal");
var btn = document.querySelector(".tim_kiem_them button[type='button']");
var span = document.getElementsByClassName("dong_cua_so")[0];
var form = document.getElementById("themNhanVienForm");
var btnXuatExcel = document.getElementById("xuatExcel");

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
  
  // Lấy giá trị từ các input
  var ten_day_du = document.getElementById("ten_day_du").value;
  var ngay_thang_nam_sinh = document.getElementById("ngay_thang_nam_sinh").value;
  var gioi_tinh = document.getElementById("gioi_tinh").value;
  var so_dien_thoai = document.getElementById("so_dien_thoai").value;
  var dia_chi_email = document.getElementById("dia_chi_email").value;
  var dia_chi_thuong_tru = document.getElementById("dia_chi_thuong_tru").value;

  // Thêm thông tin nhân viên vào khung dưới
  var khungDuoi = document.querySelector(".khung_duoi");
  var nhanVienMoi = document.createElement("div");
  nhanVienMoi.innerHTML = `<p>Tên đầy đủ: ${ten_day_du}, Ngày tháng năm sinh: ${ngay_thang_nam_sinh}, Giới tính: ${gioi_tinh}, Số điện thoại: ${so_dien_thoai}, Địa chỉ email: ${dia_chi_email}, Địa chỉ thường trú: ${dia_chi_thuong_tru}</p>`;
  khungDuoi.appendChild(nhanVienMoi);

  // Lưu thông tin nhân viên vào mảng
  var nhanVien = {
    ten_day_du,
    ngay_thang_nam_sinh,
    gioi_tinh,
    so_dien_thoai,
    dia_chi_email,
    dia_chi_thuong_tru
  };
  danhSachNhanVien.push(nhanVien);

  modal.style.display = "none"; // Đóng modal sau khi thêm
});

// Thêm sự kiện click cho nút "Xuất Excel"
btnXuatExcel.addEventListener("click", function() {
  luuVaoExcel(danhSachNhanVien);
});

function luuVaoExcel(data) {
  var ws = XLSX.utils.json_to_sheet(data);
  var wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "NhanVien");
  XLSX.writeFile(wb, "DanhSachNhanVien.xlsx");
}

// ... (phần mã cũ của bạn)

var btnNhapExcel = document.getElementById("nhapExcel");
var inputExcel = document.getElementById("chonFileExcel");

btnNhapExcel.addEventListener("click", function() {
    inputExcel.click();
});

inputExcel.addEventListener("change", function(e) {
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        var data = e.target.result;
        var workbook = XLSX.read(data, { type: 'binary' });
        var sheet_name_list = workbook.SheetNames;
        var xlData = XLSX.utils.sheet_to_json(workbook.Sheets[sheet_name_list[0]]);
        
        // Hiển thị dữ liệu trong khung_giua
        var khungGiua = document.querySelector(".khung_giua");
        khungGiua.innerHTML = ""; // Xóa dữ liệu cũ
        xlData.forEach(function(row) {
            var div = document.createElement("div");
            div.innerHTML = `<p>${JSON.stringify(row)}</p>`;
            khungGiua.appendChild(div);
        });
    };
    reader.readAsBinaryString(file);
});

/*----------------------------------------------------------------------------------------------------------------------------------------------*/

var btnNhapExcel = document.getElementById("nhapExcel");
var inputExcel = document.getElementById("chonFileExcel");

btnNhapExcel.addEventListener("click", function() {
    inputExcel.click();
});

inputExcel.addEventListener("change", function(e) {
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        var data = e.target.result;
        var workbook = XLSX.read(data, { type: 'binary' });
        var sheet_name_list = workbook.SheetNames;
        var xlData = XLSX.utils.sheet_to_json(workbook.Sheets[sheet_name_list[0]]);
        
        // Hiển thị dữ liệu trong khung_giua
        var khungGiua = document.querySelector(".khung_giua");
        khungGiua.innerHTML = ""; // Xóa dữ liệu cũ
        xlData.forEach(function(row) {
            var div = document.createElement("div");
            div.innerHTML = `<p>${JSON.stringify(row)}</p>`;
            khungGiua.appendChild(div);
        });
    };
    reader.readAsBinaryString(file);
});
