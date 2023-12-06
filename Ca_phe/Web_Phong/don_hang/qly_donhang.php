<?php
$conn = mysqli_connect("localhost","student","123456","quancaphe");
    if(isset($_POST['action'])){
        $id = $_GET['id'];
        $stats = $_POST['action'];
        $update = "UPDATE `don_hang` SET `status`='$stats' WHERE `iddon_hang`='$id'";
        $updatequery = mysqli_query($conn, $update);
    }

    $lim = 10;
    $curr = !empty($_GET['page']) ? $_GET['page']:1;
    $offset = ($curr - 1) * $lim ;
    $qly = "SELECT * FROM don_hang ORDER BY iddon_hang DESC LIMIT $lim OFFSET $offset";
?>

<link rel="stylesheet" href="../asset/css/qly_don.css">
<style>
    .qly{
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }
    .pathfinder{
        width: 80%;
        margin-right:0px;
    }
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }
        thead{
            background-color: #c49967;
        }
        thead,tbody,
        td {
            border: 1px solid black;
            padding: 8px;
        }
        .path{
        margin-left: 5px;
        padding: 5px;
        border: 1px solid black;
        color: black;
    }
    .select{
        margin-left: 5px;
        padding: 5px;
        border: 1px solid white;
        color: white;
        background-color: black;
    }
    .pathfinder{
        display: flex;
        justify-content: flex-end;
        margin-right: 30px;
    }
</style>
<div class="title">
    <h1>Quản lý đơn hàng</h1>
</div>
<div class="qly">
    <table>
        <thead>
            <td>STT</td>
            <td>Danh sách sản phẩm</td>
            <td>Tên khách hàng</td>
            <td>SĐT khách hàng</td>
            <td>Thời gian đặt hàng</td>
            <td>Quản lý</td>
        </thead>
            <?php
                $sqlqly = mysqli_query($conn, $qly);
                $stt = 0;
                foreach($sqlqly as $sqly){
                    $stt+=1;
                    $sqlsdt=("SELECT * FROM `khach_hang` WHERE `idkh` = $sqly[idkhach_hang]");
                    $sdtq = mysqli_query($conn, $sqlsdt);
                    $sdtl = mysqli_fetch_array($sdtq);
                    $sdt = $sdtl['sdtkh'];
            ?>
        <tbody>
            <td><?php echo "$stt"?></td>
            <td><?php echo "$sqly[danhsachsp]"?></td>
            <td><?php echo "$sqly[ten_kh]"?></td>
            <td><?php echo "$sdt"?></td>
            <td><?php echo "$sqly[thoigianlap]"?></td>
            <td>
            <form action="../don_hang/qly_donhang.php?id=<?php echo $sqly['iddon_hang'];?>" method="POST">
                <select name = "action" onchange="onapply(this)">
                <?php
                    $stat =  "$sqly[status]";
                    if($stat == 0){
                        echo '<option value="0" selected>Hoàn thành</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3">Hủy</option>';
                    }else if($stat == 1){
                        echo '<option value="0">Hoàn thành</option>
                            <option value="1" selected>Đang xử lý</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3">Hủy</option>';
                    }else if($stat == 2){
                        echo '<option value="0">Hoàn thành</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2" selected>Đang giao hàng</option>
                            <option value="3">Hủy</option>';
                    }else if($stat == 3){
                        echo '<option value="0">Hoàn thành</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3" selected>Hủy</option>';
                    }
                ?>
                </select>
                    <input type="hidden" id="val" name="val" value=<?php echo "$stat"?>>
                    <button type="submit" name="change">Áp dụng</button>
                </form>
                <?php
                if(isset($_POST['change'])){
                    echo $change = '';         
                    }           
                ?>
                
            </td>
        </tbody>
                <?php
                    }
                ?>
    </table>
</div>
<br>
<div class="pathfinder">
    <?php
        $totalRecords = mysqli_query($conn, "SELECT * FROM don_hang")->num_rows;
        $totalPage = ceil($totalRecords/$lim);
        for($num=1;$num<=$totalPage;$num++){
            if($num != $curr){
                ?>
        <a class="path" href="../don_hang/qly_donhang.php?lim=<?php echo $lim ?>&page=<?php echo $num ?>"><?php echo $num?></a>
                <?php
            }else{
    ?>
        <a class="select"><?php echo $num?></a>
    <?php
            }
        }
    ?>
</div>
