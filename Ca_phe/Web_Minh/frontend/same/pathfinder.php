<style>
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
<div class="pathfinder">
    <?php
        $lim = 16;
        $conn=mysqli_connect("localhost","student","123456","quancaphe");
        if(empty($_GET['id_danhmuc'])){
            $totalRecords = mysqli_query($conn, "SELECT * FROM san_pham")->num_rows;
        }else{
            $id_danhmuc = $_GET['id_danhmuc']; 
            $totalRecords = mysqli_query($conn, "SELECT * FROM san_pham WHERE id_danhmuc=$id_danhmuc")->num_rows;
        }
        $totalPage = ceil($totalRecords/$lim);
        for($num=1;$num<=$totalPage;$num++){
            if($num != $curr){
                ?>
        <a class="path" href="../frontend/product.php?lim=<?php echo $lim ?>&page=<?php echo $num ?>"><?php echo $num?></a>
                <?php
            }else{
    ?>
        <a class="select"><?php echo $num?></a>
    <?php
            }
        }
    ?>
</div>