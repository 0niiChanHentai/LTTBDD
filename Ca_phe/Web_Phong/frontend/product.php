<?php
    $conn = mysqli_connect("localhost","root","","quancaphe");
    if(isset($_GET["search"]) && !empty($_GET["search"])){
        $search = $_GET["search"];
        $sql = "SELECT * FROM san_pham WHERE tensp LIKE '%$search%' ORDER BY tensp ASC ";
    }
    else{
        $sql = "SELECT * FROM san_pham ORDER BY masp ASC";
    }
    $query = mysqli_query($conn, $sql); 
?>

<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/product.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/slider.css" type="text/css">
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
            <div class="content">   
                <div class="side-menu">
                    <h2>Danh muc san pham</h2>
                    <ul><a href="../frontend/product.php">Tat ca danh muc</a>
                        <li>Danh muc 1</li>
                        <li>Danh muc 2</li>
                    </ul>
                </div>
                <div class="list-product"> 
                    <div class="title">
                        <h1>Danh muc : </h1>
                        <div class="action">
                            <form action="" method="GET">
                                <input type="text" name="search" value="" placeholder="search name" width="300px">
                                <button type="submit" onclick = "">Search</button>
                                <button type="submit" onclick = "window.locatin.href = '../frontend/product'">Search All</button>  
                            </form>
                        </div>
                    </div>
                    <div class="list">
                        <?php
                            foreach ($query as $row) {
                        ?>
                            <div class="show">
                                <img src="../frontend/picture/<?php echo "$row[hinhanh]"?>" alt="img" width="200px" height="200px">
                                <p><a href="product_info.php?id=<?php echo "$row[masp]"?>" ><?php echo "$row[tensp]"?></a></p>
                                <p class="price"><?php echo "$row[giathanh]"?> VND</p>
                                
                                <div class="do">
                                    <form action="addtocart.php" method="post">
                                        <input type="hidden" name="ten_sanpham" value="<?php echo "$row[tensp]"?>">
                                        <input type="hidden" name="hinh_anh" value="<?php echo "$row[hinhanh]"?>">
                                        <input type="hidden" name="id" value="<?php echo "$row[masp]"?>">
                                        <input type="hidden" name="don_gia" value="<?php echo "$row[giathanh]"?>">
                                        <button class="into-cart" name="grab">Thêm vào giỏ hàng</button>
                                    </form>
                                    <form action="buynow.php" method="post">
                                        <input type="hidden" name="ten_sanpham" value="<?php echo "$row[tensp]"?>">
                                        <input type="hidden" name="hinh_anh" value="<?php echo "$row[hinhanh]"?>">
                                        <input type="hidden" name="id" value="<?php echo "$row[masp]"?>">
                                        <input type="hidden" name="don_gia" value="<?php echo "$row[giathanh]"?>">
                                        <button class="cart" name="buy">Mua ngay</button>
                                    </form>
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
    </body>
</html>