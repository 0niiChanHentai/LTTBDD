<div class="full-menu">
    <div class="logo">
        <a href="../frontend/feindex.php"><img  src="../frontend/picture/logo.png" alt="logo" width="150px" height="120px"></a>
    </div>
    <div class="menu-bar">
        <div class="menu">
            <a href="../frontend/feindex.php">Trang chủ</a>
        </div>
        <div class="dropdown">
        <a href="../frontend/product.php">Sản phẩm</a>
        <div class="dropdown-content">
            <?php
                $conn = mysqli_connect("localhost","student","123456","quancaphe");
                $danhmuc = "SELECT * FROM danh_muc";
                $dmquery = mysqli_query($conn, $danhmuc);
                foreach($dmquery as $dms){    
                    ?>
                    <a href="../frontend/product.php?id_danhmuc='<?php echo $dms['id_danhmuc']?>'"><?php echo $dms['ten_danhmuc'];?></a>        
                <?php
                }
            ?>
        </div>
        </div>
        <div class="menu">
            <a href="../frontend/writter.php">Bài viết</a>
        </div>
        <div class="menu">
            <a href="../frontend/voucher.php">Voucher</a>
        </div>
        <div class="menu">
            <a href="../frontend/contact.php">Liên hệ</a>
        </div>
        <div class="menu-last">
            <a href="../frontend/about.php">Về chúng tôi</a>
        </div>
    </div>
    <div class="action">
        <a href="../frontend/cart.php"><img src="../frontend/picture/cart.jpg" alt="cart-icon" width="50px" height="50px"></a>
    </div>
</div>