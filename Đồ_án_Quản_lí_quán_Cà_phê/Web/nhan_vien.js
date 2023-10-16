const danhSachNhanVien = [];

const modal = document.getElementById("themNhanVienModal");
const btn = document.querySelector(".tim_kiem_them button[type='button']");
const span = document.getElementsByClassName("dong_cua_so")[0];
const form = document.getElementById("themNhanVienForm");
const btnXuatExcel = document.getElementById("xuatExcel");
const btnNhapExcel = document.getElementById("nhapExcel");
const inputExcel = document.getElementById("chonFileExcel");

const showModal = () => modal.style.display = "block";
const hideModal = () => {
  modal.style.display = "none";
  form.onsubmit = (e) => {
    e.preventDefault();
    const nhanVien = {
      ten_day_du: document.getElementById("ten_day_du").value,
      ngay_thang_nam_sinh: document.getElementById("ngay_thang_nam_sinh").value,
      gioi_tinh: document.getElementById("gioi_tinh").value,
      so_dien_thoai: document.getElementById("so_dien_thoai").value,
      dia_chi_email: document.getElementById("dia_chi_email").value,
      dia_chi_thuong_tru: document.getElementById("dia_chi_thuong_tru").value
    };
    addEmployee(nhanVien);
  };
};

const renderEmployees = () => {
  const khungDuoi = document.querySelector(".khung_duoi");
  khungDuoi.innerHTML = "";
  danhSachNhanVien.forEach((employee, index) => {
    const nhanVienMoi = document.createElement("div");
    nhanVienMoi.innerHTML = `
      <p>${Object.values(employee).join(', ')}</p>
      <button class="btnXoa" data-id="${index}">Xóa</button>
      <button class="btnSua" data-id="${index}">Sửa</button>
    `;
    khungDuoi.appendChild(nhanVienMoi);
  });
};

const addEmployee = (employee) => {
  danhSachNhanVien.push(employee);
  renderEmployees();
  hideModal();
};

const updateEmployee = (id) => {
  const nhanVien = {
    ten_day_du: document.getElementById("ten_day_du").value,
    ngay_thang_nam_sinh: document.getElementById("ngay_thang_nam_sinh").value,
    gioi_tinh: document.getElementById("gioi_tinh").value,
    so_dien_thoai: document.getElementById("so_dien_thoai").value,
    dia_chi_email: document.getElementById("dia_chi_email").value,
    dia_chi_thuong_tru: document.getElementById("dia_chi_thuong_tru").value
  };
  danhSachNhanVien[id] = nhanVien;
  renderEmployees();
  hideModal();
};

const exportToExcel = (data) => {
  // ... (không thay đổi)
};

const importFromExcel = (file) => {
  // ... (không thay đổi)
};

btn.onclick = (event) => {
  event.preventDefault();
  showModal();
};

span.onclick = hideModal;

window.onclick = (event) => {
  if (event.target == modal) {
    hideModal();
  }
};

form.addEventListener("submit", (event) => {
  event.preventDefault();
  const nhanVien = {
    ten_day_du: document.getElementById("ten_day_du").value,
    ngay_thang_nam_sinh: document.getElementById("ngay_thang_nam_sinh").value,
    gioi_tinh: document.getElementById("gioi_tinh").value,
    so_dien_thoai: document.getElementById("so_dien_thoai").value,
    dia_chi_email: document.getElementById("dia_chi_email").value,
    dia_chi_thuong_tru: document.getElementById("dia_chi_thuong_tru").value
  };
  addEmployee(nhanVien);
});

btnXuatExcel.addEventListener("click", () => {
  exportToExcel(danhSachNhanVien);
});

btnNhapExcel.addEventListener("click", () => {
  inputExcel.click();
});

inputExcel.addEventListener("change", (e) => {
  const file = e.target.files[0];
  importFromExcel(file);
});

document.body.addEventListener("click", (event) => {
  if (event.target.classList.contains("btnXoa")) {
    const id = event.target.getAttribute("data-id");
    danhSachNhanVien.splice(id, 1);
    renderEmployees();
  } else if (event.target.classList.contains("btnSua")) {
    const id = event.target.getAttribute("data-id");
    const nhanVien = danhSachNhanVien[id];
    document.getElementById("ten_day_du").value = nhanVien.ten_day_du;
    document.getElementById("ngay_thang_nam_sinh").value = nhanVien.ngay_thang_nam_sinh;
    document.getElementById("gioi_tinh").value = nhanVien.gioi_tinh;
    document.getElementById("so_dien_thoai").value = nhanVien.so_dien_thoai;
    document.getElementById("dia_chi_email").value = nhanVien.dia_chi_email;
    document.getElementById("dia_chi_thuong_tru").value = nhanVien.dia_chi_thuong_tru;
    showModal();
    form.onsubmit = (e) => {
      e.preventDefault();
      updateEmployee(id);
    };
  }
});