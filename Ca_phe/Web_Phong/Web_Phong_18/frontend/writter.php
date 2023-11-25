<?php
    $conn = mysqli_connect("localhost","root","","quancaphe");
    if(isset($_GET["search"]) && !empty($_GET["search"])){
        $search = $_GET["search"];
        $sql = "SELECT * FROM bai_viet WHERE tieu_de LIKE '%$search%' ORDER BY id_baiviet ASC ";
    }
    else{
        $sql = "SELECT * FROM bai_viet ORDER BY id_baiviet ASC";
    }
    $query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css">
        <link rel="stylesheet" href="../frontend/css/writter.css">
        <link rel="stylesheet" href="../frontend/css/slider.css" type="text/css">
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
            <div class="context">
                <div class="news">
                    <h2 style="text-align:center; font-size:50px; margin-left:90px">Các bài viết mới nhất</h2>
                    <div class="find-writter">
                        <form action="" method="GET" style="margin-left:500px">
                            <input type="text" name="search" value="" placeholder="search name" width="300px">
                            <button type="submit" onclick = "">Search</button>
                            <button type="submit" onclick = "window.locatin.href = '../frontend/writter.php'">Search All</button>  
                        </form>
                    </div>
                    <div class="writter">
                        <?php
                            foreach ($query as $row) {
                        ?>
                        <div class="show">
                            <img src="../frontend/picture/<?php echo "$row[anh_dai_dien]"?>" alt="img" width="150px" height="150px">
                            <div class="nd">
                                <p><?php echo "$row[tieu_de]"?></p>
                                <text><?php echo "$row[mo_ta_ngan]"?></text>
                                <br/>
                                <a href="writter_info.php?id=<?php echo "$row[id_baiviet]"?>">Xem thêm</a>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="info">
                    <?php
                        include "../frontend/same/footer.php";
                    ?>       
                </div>
            </div>  
        </div>
        <div class="clear"></div>
    </body>
</html>