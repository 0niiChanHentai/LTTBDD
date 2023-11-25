<?php
    session_start(); 
    if(isset($_POST['grab'])){
        if(($_SESSION['cart'])==null){
            $ten_sanpham=$_POST["ten_sanpham"];
            $hinh_anh=$_POST["hinh_anh"];
            $don_gia=$_POST["don_gia"];
            $id=$_POST["id"];
            if($_POST["quantity"]==null){
                $quantity=1;
            }else{
                $quantity=$_POST["quantity"];
            }
            $sp=array($id,$ten_sanpham,$hinh_anh,$quantity,$don_gia);
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']=array();
            }   
            array_push($_SESSION['cart'], $sp);
        }
        else{
            $i=0;
            for($i;$i<count($_SESSION['cart']);$i++){
                if($_POST["ten_sanpham"] == $_SESSION['cart'][$i][1]){
                    if($_POST["quantity"]==null){
                        $_SESSION['cart'][$i][3] += 1;
                    }
                    else{
                        $_SESSION['cart'][$i][3] += $_POST["quantity"];
                    }
                    break;
                }else{
                    if($i==(count($_SESSION['cart'])-1)){
                        $ten_sanpham=$_POST["ten_sanpham"];
                        $hinh_anh=$_POST["hinh_anh"];
                        $don_gia=$_POST["don_gia"];
                        $id=$_POST["id"];
                        if($_POST["quantity"]==null){
                            $quantity=1;
                        }else{
                            $quantity=$_POST["quantity"];
                        }
                        $sp=array($id,$ten_sanpham,$hinh_anh,$quantity,$don_gia);
                        if(!isset($_SESSION['cart'])){
                            $_SESSION['cart']=array();
                        }   
                        array_push($_SESSION['cart'], $sp);
                    }
                }
            }
        }
        
    }
    header('location: ../frontend/product.php');
?>