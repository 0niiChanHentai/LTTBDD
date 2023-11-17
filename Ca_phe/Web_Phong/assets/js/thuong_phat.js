const danhSachNhanVien = [];

const modal = document.getElementById("themNhanVienModal");
const btn = document.querySelector(".tim_kiem_them button[type='button']");
const span = document.getElementsByClassName("dong_cua_so")[0];
const form = document.getElementById("themNhanVienForm");
const btnXuatExcel = document.getElementById("xuatExcel");
const btnNhapExcel = document.getElementById("nhapExcel");
const inputExcel = document.getElementById("chonFileExcel");

const showModal = () => modal.style.display = "block";
const hideModal = () => modal.style.display = "none";

// const addEmployee = (employee) => {
//   id = idnv;
//   hoten = hotennv;
//   email = emailnv;
//   dienthoai = dienthoainv;
//   ngaysinh = ngaysinhnv;
//   gioitinh = gioitinhnv;
//   diachi = diachinv;
//   danhSachNhanVien.push(employee);
//   const khungDuoi = document.querySelector(".khung_duoi");
//   const nhanVienMoi = document.createElement("div");
//   nhanVienMoi.innerHTML = `<p>${Object.values(employee).join(', ')}</p>`;
//   khungDuoi.appendChild(nhanVienMoi);
//   hideModal();
// };

const exportToExcel = (data) => {
  const ws = XLSX.utils.json_to_sheet(data);
  const wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "NhanVien");
  XLSX.writeFile(wb, "DanhSachNhanVien.xlsx");
};

const importFromExcel = (file) => {
  const reader = new FileReader();
  reader.onload = (e) => {
    const data = e.target.result;
    const workbook = XLSX.read(data, { type: 'binary' });
    const sheet_name_list = workbook.SheetNames;
    const xlData = XLSX.utils.sheet_to_json(workbook.Sheets[sheet_name_list[0]]);
    const khungGiua = document.querySelector(".khung_giua");
    khungGiua.innerHTML = "";
    xlData.forEach((row) => {
      const div = document.createElement("div");
      div.innerHTML = `<p>${JSON.stringify(row)}</p>`;
      khungGiua.appendChild(div);
    });
  };
  reader.readAsBinaryString(file);
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

// form.addEventListener("submit", (event) => {
//   event.preventDefault();
//   const nhanVien = {
//     idnv: document.getElementById("idnv").value,
//     hotennv: document.getElementById("hotennv").value,
//     emailnv: document.getElementById("emailnv").value,
//     dienthoainv: document.getElementById("dienthoainv").value,
//     ngaysinhnv: document.getElementById("ngaysinhnv").value,
//     gioitinhnv: document.getElementById("gioitinhnv").value,
//     diachinv: document.getElementById("diachinv").value,
//   };
//   addEmployee(nhanVien);
// });

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