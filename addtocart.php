<?php
session_start();
if(empty($_SESSION['cart'])){
    $_SESSION['cart']=array();
}

$_SESSION['quantity']=$_GET['qty'];
// if(isset($_SESSION['quantity'])){
//     print_r($_SESSION['quantity']);
//     die();
// }
// else{
//     echo "no";
//     die();
// }

array_push($_SESSION['cart'], $_GET['id']);
// if(isset($_SESSION['cart'])){
//     echo "ok";
//     die();
// }
// else{
//     echo "no";
//     die();
// }

print_r($_SESSION['cart']);
// die();
header ("location: cart.php");
?>