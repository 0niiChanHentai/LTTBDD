// Khởi tạo biến
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let events = {};
let selectedDate;

// Khởi tạo bản đồ
let map;
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

// Mở cửa sổ modal để thêm/sửa sự kiện
function openModal(date) {
  selectedDate = date;
  const eventForDate = events[date] ? events[date].detail : "";
  document.getElementById("eventInput").value = eventForDate;
  
  const locationForDate = events[date] ? events[date].location : "";
  document.getElementById("locationInput").value = locationForDate;

  if (locationForDate) {
    const coordinates = { lat: -34.397, lng: 150.644 }; // Tọa độ tạm thời
    map.setCenter(coordinates);
  }

  document.getElementById("eventModal").style.display = "block";
}

// Đóng cửa sổ modal
function closeModal() {
  document.getElementById("eventModal").style.display = "none";
}

// Lưu sự kiện
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

// Lên lịch thông báo
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

// Truy xuất thông tin thời tiết
function fetchWeather(location) {
  fetch('https://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=4df5ba506cc21784a35d5eb06481a1e2&lang=vi')
    .then(response => response.json())
    .then(data => {
      const weatherInfo = data.weather[0].description;
      alert(`Dự báo thời tiết tại ${location} trong ngày sự kiện sẽ là ${weatherInfo}`);
    })
    .catch(error => console.error("Error fetching weather data:", error));
}

// Hiển thị lịch
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

// Điều hướng đến tháng trước và tháng sau
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

// Yêu cầu quyền thông báo
if (Notification.permission !== 'granted') {
  Notification.requestPermission();
}

// Hiển thị ban đầu của lịch
renderCalendar(currentMonth, currentYear);


// Hàm để cập nhật thời gian hiện tại và ngày trong tuần
function updateTimeAndDay() {
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, '0');
  const minutes = String(now.getMinutes()).padStart(2, '0');
  const seconds = String(now.getSeconds()).padStart(2, '0');
  const currentTime = `${hours}:${minutes}:${seconds}`;
  document.getElementById("currentTime").innerText = "Bây giờ là: " + currentTime;

const days = ["Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy"];
const currentWeekday = days[now.getDay()];
document.getElementById("currentWeekday").innerText = "Hôm nay là : " + currentWeekday;
}

// Cập nhật thời gian và ngày mỗi giây
setInterval(updateTimeAndDay, 1000);

// Cập nhật ban đầu
updateTimeAndDay();


// Truy xuất và hiển thị thông tin thời tiết và nhiệt độ hiện tại bằng tiếng Việt
function fetchAndDisplayWeatherVietnamese() {
  fetch('https://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=4df5ba506cc21784a35d5eb06481a1e2&lang=vi')
    .then(response => response.json())
    .then(data => {
      const weatherDescription = data.weather[0].description;
      const temperature = Math.round(data.main.temp - 273.15);  // Chuyển đổi từ độ Kelvin sang độ Celsius
      document.getElementById("currentWeather").innerText = "Thời tiết: " + weatherDescription;
      document.getElementById("currentTemperature").innerText = "Nhiệt độ: " + temperature + "°C";
    })
    .catch(error => console.error("Error fetching weather data:", error));
}

// Gọi hàm để truy xuất và hiển thị thông tin thời tiết bằng tiếng Việt
fetchAndDisplayWeatherVietnamese();