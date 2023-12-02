<?php
    if(isset($_POST['gui'])){
        $hten = $_POST['hten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $ndung = $_POST['ndung'];
        $conn = mysqli_connect("localhost","student","123456","quancaphe");
        $sql = "INSERT INTO lienhe(hten,sdt,email,ndung) VALUES ('$hten','$sdt','$email','$ndung')";
        $action = mysqli_query($conn,$sql);
        echo "
            <script>
                alert('Yêu cầu của bạn đã được xác nhận. MỘC sẽ sớm liên hệ lại cho bạn để trao đổi');
            </script>
             ";
        header("../frontend/contact.php");
    }
?>

<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/slider.css">
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
            <div class="contact">
                <h1 style="text-align:center">Liên hệ với chúng tôi</h1>
                <div style="display:flex">
                    <div class="contact-l" style="float:left;width:55%;padding-left:50px">
                    <form action="../frontend/contact.php" method="post">
                        <input type="text" placeholder="Họ & tên" name="hten" style="margin-left:150px;width:400px;margin-top:10px;height:20px">  
                        <input type="text" placeholder="SĐT" name="sdt" style="margin-left:150px;width:400px;margin-top:10px;height:20px">
                        <input type="text" placeholder="Email" name="email" style="margin-left:150px;width:400px;margin-top:10px;height:20px">
                        <textarea placeholder="Nội dung" name="ndung" style="margin-left:150px;width:400px;margin-top:10px;height:150px;display:block;text-align:start" cols="40" rows="5"></textarea>
                        <button type="submit" name="gui" style="margin-left:250px;width:100px;height:40px;margin-top:20px">Gửi yêu cầu</button>
                    </form>
                    </div>
                    <div class="contact-r" style="width:44%;border-left:1px solid black; padding-left:40px">
                        <h2>Trụ sở Hải Phòng</h2>
                        <h4>SĐT: 0123456789</h4>
                        <h4>Email: CafeMoc24@gmail.com</h4>
                        <h4>Địa chỉ: </h4> 
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br/>
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.0523828781725!2d106.68701387433309!3d20.8295910945914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a71e10a700d3d%3A0xf727ddd15e8b33e8!2zTeG7mWMgQ2FmZQ!5e0!3m2!1svi!2s!4v1701148346520!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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