
// Initialize variables
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let events = {};
let selectedDate;

// Initialize map
let map;
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

// Open modal to add/edit events
function openModal(date) {
  selectedDate = date;
  const eventForDate = events[date] ? events[date].detail : "";
  document.getElementById("eventInput").value = eventForDate;
  
  const locationForDate = events[date] ? events[date].location : "";
  document.getElementById("locationInput").value = locationForDate;

  if (locationForDate) {
    const coordinates = { lat: -34.397, lng: 150.644 }; // Placeholder coordinates
    map.setCenter(coordinates);
  }

  document.getElementById("eventModal").style.display = "block";
}

// Close modal
function closeModal() {
  document.getElementById("eventModal").style.display = "none";
}

// Save event
function saveEvent() {
  const eventDetail = document.getElementById("eventInput").value;
  const eventLocation = document.getElementById("locationInput").value;
  if (eventDetail || eventLocation) {
    events[selectedDate] = { detail: eventDetail, location: eventLocation };
  } else {
    delete events[selectedDate];
  }

  const today = new Date().toISOString().split('T')[0];
  if (selectedDate === today) {
    scheduleNotification(eventDetail);
  }

  if (eventLocation) {
    fetchWeather(eventLocation);
  }

  closeModal();
  renderCalendar(currentMonth, currentYear);
}

// Schedule notifications
function scheduleNotification(eventDetail) {
  if (Notification.permission !== 'granted') {
    Notification.requestPermission();
  }
  
  if (Notification.permission === 'granted') {
    new Notification('Upcoming Event', {
      body: `You have an event scheduled: ${eventDetail}`
    });
  }
}

// Fetch weather information
function fetchWeather(location) {
  fetch('https://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=4df5ba506cc21784a35d5eb06481a1e2&lang=vi')
    .then(response => response.json())
    .then(data => {
      const weatherInfo = data.weather[0].description;
      alert(`Dự báo thời tiết tại ${location} trong ngày sự kiện sẽ là ${weatherInfo}`);
    })
    .catch(error => console.error("Error fetching weather data:", error));
}

// Render calendar
function renderCalendar(month, year) {
  let firstDay = new Date(year, month).getDay();
  let daysInMonth = 32 - new Date(year, month, 32).getDate();

  let table = document.getElementById("calendar");
  table.innerHTML = "<tr><th>CN</th><th>T.2</th><th>T.3</th><th>T.4</th><th>T.5</th><th>T.6</th><th>T.7</th></tr>";
  
  let date = 1;
  for (let i = 0; i < 6; i++) {
    let row = document.createElement("tr");

    for (let j = 0; j < 7; j++) {
      let cell = document.createElement("td");
      if (i === 0 && j < firstDay) {
        cell.innerHTML = "";
      } else if (date > daysInMonth) {
        break;
      } else {
        const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
        cell.innerHTML = date;
        if (events[fullDate]) {
          cell.innerHTML += "<br>" + events[fullDate].detail;
          cell.style.backgroundColor = "pink";
        }
        cell.onclick = function() { openModal(fullDate); };
        date++;
      }
      row.appendChild(cell);
    }
    table.appendChild(row);
  }

  document.getElementById("monthYear").innerText = new Date(year, month).toLocaleString('default', { month: 'long' }) + " " + year;
}

// Navigate to previous and next months
function prevMonth() {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  renderCalendar(currentMonth, currentYear);
}

function nextMonth() {
  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  renderCalendar(currentMonth, currentYear);
}

// Request notification permission
if (Notification.permission !== 'granted') {
  Notification.requestPermission();
}

// Initial rendering of the calendar
renderCalendar(currentMonth, currentYear);


// Function to update the current time and day of the week
function updateTimeAndDay() {
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  const seconds = String(now.getSeconds()).padStart(2, '0');
  const currentTime = `${hours}:${minutes}:${seconds}`;
  document.getElementById("currentTime").innerText = ", " + currentTime;

const days = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
const currentWeekday = days[now.getDay()];
document.getElementById("currentWeekday").innerText = "Hôm nay là: " + currentWeekday;
}

// Update the time and day every second
setInterval(updateTimeAndDay, 1000);

// Initial update
updateTimeAndDay();


// Fetch and display the current weather and temperature in Vietnamese
function fetchAndDisplayWeatherVietnamese() {
  fetch('https://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=4df5ba506cc21784a35d5eb06481a1e2&lang=vi')
    .then(response => response.json())
    .then(data => {
      const weatherDescription = data.weather[0].description;
      const temperature = Math.round(data.main.temp - 273.15);  // Convert from Kelvin to Celsius
      document.getElementById("currentWeather").innerText = "Thời tiết: " + weatherDescription;
      document.getElementById("currentTemperature").innerText = ", " + temperature + "°C";
    })
    .catch(error => console.error("Error fetching weather data:", error));
}
/*
// Call the function to fetch and display the weather in Vietnamese
fetchAndDisplayWeatherVietnamese();

const danhSachKhachHang = [];

const modal = document.getElementById("themKhachHangModal");
const btn = document.querySelector(".tim_kiem_them button[type='button']");
const span = document.getElementsByClassName("dong_cua_so")[0];
const form = document.getElementById("themKhachHangForm");
const btnXuatExcel = document.getElementById("xuatExcel");
const btnNhapExcel = document.getElementById("nhapExcel");
const inputExcel = document.getElementById("chonFileExcel");

const showModal = () => modal.style.display = "block";
const hideModal = () => modal.style.display = "none";


const exportToExcel = (data) => {
  const ws = XLSX.utils.json_to_sheet(data);
  const wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "KhachHang");
  XLSX.writeFile(wb, "DanhSachKhachHang.xlsx");
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
//   const KhachHang = {
//     idnv: document.getElementById("idnv").value,
//     hotennv: document.getElementById("hotennv").value,
//     emailnv: document.getElementById("emailnv").value,
//     dienthoainv: document.getElementById("dienthoainv").value,
//     ngaysinhnv: document.getElementById("ngaysinhnv").value,
//     gioitinhnv: document.getElementById("gioitinhnv").value,
//     diachinv: document.getElementById("diachinv").value,
//   };
//   addEmployee(KhachHang);
// });

btnXuatExcel.addEventListener("click", () => {
  exportToExcel(danhSachKhachHang);
});

btnNhapExcel.addEventListener("click", () => {
  inputExcel.click();
});

inputExcel.addEventListener("change", (e) => {
  const file = e.target.files[0];
  importFromExcel(file);
});
*/