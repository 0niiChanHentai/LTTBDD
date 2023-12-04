<?php
    $conn = mysqli_connect("localhost","root","","quancaphe");
    if(isset($_GET["search"]) && !empty($_GET["search"])){
        $search = $_GET["search"];
        $sql = "SELECT * FROM bai_viet WHERE tieu_de LIKE '%$search%' ORDER BY id_baiviet ASC ";
    }
    else{
        // $sql = "SELECT * FROM bai_viet ORDER BY id_baiviet ASC";
        $lim = !empty($_GET['lim'])? $_GET['lim']:6;
        $curr = !empty($_GET['page']) ? $_GET['page']:1;
        $offset = ($curr - 1) * $lim ;
        $sql = "SELECT * FROM `bai_viet` ORDER BY id_baiviet ASC LIMIT $lim OFFSET $offset";
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
                    include "../frontend/same/menu.php";
                ?>
            </div>          
            <div class="slider">
                <?php
                    include "../frontend/same/slider.php";
                ?>
                <script src="../frontend/js/slider.js"></script>
            </div>
            <div class="home">
                <div class="news">
                    <h2 style="text-align:center; font-size:50px; margin-left:90px">Các bài viết mới nhất</h2>
                    <div class="find-writter">
                        <form action="" method="GET" style="margin-left:500px">
                            <input type="text" name="search" value="" placeholder="search name" width="300px">
                            <button type="submit" onclick = "">Search</button>
                            <button type="submit" onclick = "window.locatin.href = '../frontend/writter.php'">Search All</button>  
                        </form>
                    </div>
                    <div class="contain">
                        <div class="writter">
                            <?php
                                foreach ($query as $row) {
                            ?>
                            <div class="show">
                                
                                <img src="../frontend/picture/<?php echo "$row[anh_dai_dien]"?>" alt="img">
                                <div class="nd">    
                                    <p><?php echo "$row[tieu_de]"?></p>
                                    <text><?php echo "$row[mo_ta_ngan]"?></text>   
                                </div>
                                <a href="writter_info.php?id=<?php echo "$row[id_baiviet]"?>">Xem thêm</a>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="hot">
                            <h2>Các bài viết HOT</h2>
                            <?php
                                $hot = "SELECT * FROM bai_viet ORDER BY id_baiviet DESC LIMIT 7 OFFSET 0";
                                $hotq = mysqli_query($conn,$hot);
                                foreach($hotq as $hots){
                            ?>
                                    <a href="writter_info.php?id=<?php echo "$hots[id_baiviet]"?>"><?php echo "$hots[tieu_de]"?></a>
                                    <br>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="page">
                    <div class="pathfinder">
                        <?php
                            $lim = 6;
                            $conn=mysqli_connect("localhost","student","123456","quancaphe");
                            $totalRecords = mysqli_query($conn, "SELECT * FROM bai_viet")->num_rows;
                            $totalPage = ceil($totalRecords/$lim);
                            for($num=1;$num<=$totalPage;$num++){
                                if($num != $curr){
                                    ?>
                            <a class="path" href="../frontend/writter.php?lim=<?php echo $lim ?>&page=<?php echo $num ?>"><?php echo $num?></a>
                                    <?php
                                }else{
                        ?>
                            <a class="select"><?php echo $num?></a>
                        <?php
                                }
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