<!----------------->
                    </div>
<!------------->
                <div class="ho_tro">
<!----------------->
                    <label class="chu" id="currentWeekday"></label>
                    <label class="chu" id="currentTime"></label><br>
                    <label class="chu" id="currentWeather"></label>
                    <label class="chu" id="currentTemperature"></label><br>
                    <button onclick="prevMonth()">Tháng trước</button>
                    <button onclick="nextMonth()">Tháng sau</button>
                    <label class="chu"><i>-----------------</i></label>
                    <label class="chu" id="monthYear"></label>
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
                            <input id="eventInput" placeholder="Chi tiết sự kiện" type="text" />
                            <input id="locationInput" placeholder="Địa điểm sự kiện" type="text" />
                            <div id="map"></div>
                            <button onclick="saveEvent()">Save</button>
                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d7458.282836627456!2d106.70556619999999!3d20.82599509999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDQ5JzMzLjUiTiAxMDbCsDQyJzE5LjQiRQ!5e0!3m2!1svi!2s!4v1700901101691!5m2!1svi!2s" width="100%" height="30%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!----------------->
                </div>
<!------------->
            </div>
<!--------->
        </div>
<!---->
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/trang_chu.js" defer></script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>