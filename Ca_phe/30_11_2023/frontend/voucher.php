<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css">
        <link rel="stylesheet" href="../frontend/css/slider.css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "same/menu.php";
                ?>
            </div>   
            <div class="slider">
                <?php
                    include "same/slider.php";
                ?>
                <script src="../frontend/js/slider.js"></script>
            </div>      
            <div class="list-voucher" style="margin-top:80px">
                <h2 style="text-align:center;margin-top:10px;margin-left:10px">Danh sách Voucher ưu đãi</h2>
                <table style = "margin-top:10px;margin-left:100px;width:80%;border:2px solid black;">
                    <tr>
                        <th>Mã ưu đãi</th>
                        <th>Tên voucher</th>
                        <th>Giá trị</th>
                        <th>HSD</th>
                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost","root","","quancaphe");
                        $sql = "SELECT * FROM voucher ORDER BY id_voucher DESC";
                        $query = mysqli_query($conn, $sql);
                        foreach ($query as $row) {
                    ?>
                    <tr>
                        <td><?php echo"$row[ma_sale]"; ?></td>
                        <td><?php echo"$row[ten_uu_dai]"; ?></td>
                        <td><?php echo"$row[gia_tri]"; ?></td>
                        <td><?php
                        $td = date('Y/m/d');
                        $today = new DateTime($td);
                        $expire = new DateTime($row['hsd']);  
                        $qty = $row['qty'];
                            if($expire < $today) {
                                echo 'Expired';
                            } else if($expire>$today && $qty==0){
                                echo 'Hết Voucher';
                            }else {
                                echo"$row[hsd]";
                            }
                        }
                            ?></td>
                    </tr>
                </table>
            </div>
            <div class="footer">
                <div class="info">
                    <?php
                        include"../frontend/same/footer.php";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>