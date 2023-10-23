
<!DOCTYPE html>

<html>
<head>
<title>Simple Calendar</title>
<link href="styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>


<h1>
                    <span id="currentWeather">Thời tiết: </span>
                </h1>
                <h1>
                    <span id="currentTemperature">Nhiệt độ: </span>
                </h1>
                <h2 id="currentTime">Bây giờ là: </h2>
                <h2 id="currentWeekday">Hôm nay là: </h2>
                <button onclick="prevMonth()">Tháng trước</button>
                <button onclick="nextMonth()">Tháng sau</button>
                <h2 id="monthYear"></h2>
                <table id="calendar">
                    <tr>
                        <th>Chủ Nhật</th>
                        <th>Thứ Hai</th>
                        <th>Thứ Ba</th>
                        <th>Thứ Tư</th>
                        <th>Thứ Năm</th>
                        <th>Thứ Sáu</th>
                        <th>Thứ Bảy</th>
                    </tr>
                </table>
                <div class="modal" id="eventModal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">×</span>
                        <h2>Add/Edit Event</h2>
                        <input id="eventInput" placeholder="Event details" type="text"/>
                        <input id="locationInput" placeholder="Event location" type="text"/>
                        <div id="map"></div>
                        <button onclick="saveEvent()">Save</button>
                        <button onclick="editEvent()">Sửa</button>
<button onclick="deleteEvent()">Xóa</button>

                    </div>
                </div>


<script src="calendar_script_with_map.js"></script>
<!-- Add this at the end of your HTML body -->
<script defer="" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;callback=initMap">
</script>
<script defer="" src="script.js"></script>
</body>
</html>