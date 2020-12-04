<?php
$connection= mysqli_connect("localhost", "root" , "" , "project4_ecommerce");
        if(!$connection){
            die("Connection failed: " . mysqli_connect_error());
        }
session_start();
$itemtodelete=$_GET['id'];
$arr=array();
$arr=$_SESSION['cart'];
$_SESSION['cart']=array_diff($_SESSION['cart'], array($itemtodelete));
header("location: cart.php");
?>