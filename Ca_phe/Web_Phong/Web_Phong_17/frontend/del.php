<?php
    session_start();
    ob_start();
    if(isset($_SESSION["cart"])){
        if(isset($_GET['id'])){
            array_splice($_SESSION['cart'],$_GET['id'],1);
        }
        else{
            unset($_SESSION['cart']);
        }
        header('location: ../frontend/cart.php');
    }
?>