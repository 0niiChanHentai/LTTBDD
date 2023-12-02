<?php
    $conn = mysqli_connect("localhost","root","","quancaphe");
    $id = $_GET['id'];
    $sql = "SELECT * FROM bai_viet WHERE id_baiviet = '$id' ";
    $query = mysqli_query($conn, $sql);
    $cols = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css">
        <link rel="stylesheet" href="../frontend/css/slider.css" type="text/css">
        <!-- <link rel="stylesheet" href="../frontend/css/writter.css"> -->
        <link rel="stylesheet" href="../frontend/css/writter_info.css">
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
            <!-- <button onclick = "window.location.href='../frontend/writter.php'" type="submit" class='btn-back' style="width:50px;height:30px;margin-left:40px;margin-top:20px">Back</button> -->
            <div class="context">
                <br>
                <h1 style="text-align:center;width:100%"><?php echo $cols['tieu_de'] ?></h1>
                <br>
                <div class="news-info">
                    <div>
                        <div>
                            <img src="../frontend/picture/<?php echo $cols['anh_dai_dien']?>" alt="img" width="400px" height="300px" class="anh-dai-dien">
                            <div class="noi-dung">
                                <?php echo $cols['noi_dung'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="related">
                    <ul>
                        <h2>Các bài viết liên quan</h2>
                        <ul>
                            <?php
                                $newsql= 'SELECT * FROM bai_viet ORDER BY id_baiviet ASC LIMIT 7 OFFSET 0';
                                $newquery = mysqli_query($conn, $newsql);
                             
                                foreach ($newquery as $col){
                                    ?>
                                    <li><a href="writter_info.php?id=<?php echo "$col[id_baiviet]"?>"><?php echo $col['tieu_de']?></a></li>
                                    <?php
                                }
                            ?>
                                    
                        </ul>
                    </ul>
                </div>
                
            </div>
            <div class="footer">
                    <div class="info">
                        <?php
                            include"../frontend/same/footer.php";
                        ?>
                    </div>
                </div>
        </div>
        <div class="clear"></div>
    </body>
</html>