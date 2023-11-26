<?php
include '../ket_noi.php';

try{
    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
    else{
        $search = $_POST['timKiem'];
        $sql = "SELECT * FROM san_pham WHERE tensp LIKE '%$search%' ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }

}
catch(Exception){
    echo (' ERROR!');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">

                        <label class="title">DANH SÁCH SẢN PHẨM</label>

                        <div class="tim_kiem_them">
                            <form method="post">
                                <input type="nhap" style="width: 60%" name="timKiem" placeholder="Nhập tên sản phẩm">
                                <button type="submit" name="submit" value="Tim Kiem">Tìm kiếm</button>
                            </form>
                        </div>

                    </div>
<!----------------->
                    <div class="khung_giua">
                        <button type="button" name="submit" id="themmoinv">Thêm</button>
                        <button id="xuatExcel">Xuất Excel</button>
                        <button id="nhapExcel">Nhập Excel</button>
                        <input type="file" id="chonFileExcel" style="display:none;">
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <table>
                                <thead>
                                    <tr style="background-color: #c49967;">
                                        <th style="width: 5%">STT</th>
                                        <th style="width: 15%">Tên sản phẩm</th>
                                        <th style="width: 10%">Giá (VND)</th>
                                        <th>Thành phần</th>
                                        <th style="width: 15%">Ghi chú</th>
                                        <th style="width: 5%">Sửa</th>
                                        <th style="width: 5%">Xóa</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $rowNumber = 1;
                                        foreach($result as $items): ?>
                                    <tr>
                                        <td><?php echo($rowNumber)?></td>
                                        <td><?php echo($items['tensp'])?></td>
                                        <td><?php echo($items['giathanh'])?></td>
                                        <td><?php echo($items['thanhphan'])?></td>
                                        <td><?php echo($items['ghichu'])?></td>
                                        <td>
                                            <form action="sua_sp.php" method="post">
                                                <button type="submit" value="<?php echo($items['masp'])?>" name="buttonValue">S</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="xoa_sp.php" method="post">
                                                <button type="submit" value="<?php echo($items['masp'])?>" name="buttonValue">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php 
                                        $rowNumber++;
                                        endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="../assets/js/san_pham.js" defer></script>

    <script>
            document.getElementById("themmoinv").addEventListener("click", function() {
            window.location.href = "them_sp.php";
        });

            document.getElementById("xoabonv").addEventListener("click", function() {
            window.location.href = "xoa_sp.php";
        });
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>