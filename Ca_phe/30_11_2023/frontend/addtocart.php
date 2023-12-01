<?php
    session_start(); 
    if(isset($_POST['grab'])){
            $ten_sanpham=$_POST["ten_sanpham"];
            $hinh_anh=$_POST["hinh_anh"];
            $don_gia=$_POST["don_gia"];
            $id=$_POST["id"];
            $quantity=$_POST["quantity"];
            $sp=array($id,$ten_sanpham,$hinh_anh,$quantity,$don_gia);
        if(!empty($_SESSION['cart'])){
            $i=0;
            $khac = 0;
            for($i;$i<count($_SESSION['cart']);$i++){
                if($_SESSION['cart'][$i][1] == $ten_sanpham){
                    $_SESSION['cart'][$i][3] += $quantity;
                    break;
                }else{
                    $khac++;
                }
            }
            if($khac == count($_SESSION['cart'])){
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart']=array();
                } 
                array_push($_SESSION['cart'], $sp); 
            }
        }
        else{
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']=array();
            }   
            array_push($_SESSION['cart'], $sp); 
        }
    }
    header('location: ../frontend/product.php');

?>