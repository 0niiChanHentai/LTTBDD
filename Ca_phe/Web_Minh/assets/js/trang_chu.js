let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let events = {};

// Lịch
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

// Chuyển sang tháng trước
function prevMonth() {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  renderCalendar(currentMonth, currentYear);
}

// Chuyển sang tháng sau
function nextMonth() {
  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  renderCalendar(currentMonth, currentYear);
}

renderCalendar(currentMonth, currentYear);


// Cập nhật Lịch
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

// Cập nhật thời gian và ngày
setInterval(updateTimeAndDay, 1000);

updateTimeAndDay();