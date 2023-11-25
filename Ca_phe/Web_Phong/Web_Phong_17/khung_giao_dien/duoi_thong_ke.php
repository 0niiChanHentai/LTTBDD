<!----------------->
</div>
<!------------->
                <div class="ho_tro">
<!----------------->
                    <div class="lich" style="padding-left:2%; width:100%">

                        <h3>Biểu đồ doanh thu 7 ngày gần nhất:</h3>
                        <canvas id="barChart7DaysLich" width="400" height="200"></canvas>

                        <h3>Biểu đồ doanh thu 30 ngày gần nhất:</h3>
                        <canvas id="lineChart30DaysLich" width="400" height="200"></canvas>

                        <script>
                            var barChartLabels7DaysLich = <?php echo json_encode($recent7Days); ?>;
                            var barChartData7DaysLich = <?php echo json_encode(array_values($total7Days)); ?>;
                            createBarChart(barChartLabels7DaysLich, barChartData7DaysLich, 'Doanh thu ngày', 'barChart7DaysLich');

                            var lineChartLabels30DaysLich = <?php echo json_encode($recent30Days); ?>;
                            var lineChartData30DaysLich = <?php echo json_encode(array_values($total30Days)); ?>;
                            createLineChart(lineChartLabels30DaysLich, lineChartData30DaysLich, 'Doanh thu ngày', 'lineChart30DaysLich');
                        </script>
                    </div>
<!----------------->
                </div>
<!------------->
            </div>
<!--------->
        </div>
<!---->
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/doanh_thu.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer="" src="../assets/js/trang_chu.js"></script>

    <script>
        document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_sp.php";
        });

        document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_sp.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->