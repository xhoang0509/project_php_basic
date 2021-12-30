<?php
session_start();

$id = $_GET['id'];

if(empty($_SESSION['cart'][$id])) {
    require 'admin/connect.php';
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    $number_rows = mysqli_num_rows($result);
    if($number_rows == 0) {
    	$_SESSION['error'] = "Không có sản phẩm này !";
    	header('location:index.php');
    	exit();
    }
    $_SESSION['cart'][$id]['name'] = $each['name'];
    $_SESSION['cart'][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$id]['price'] =  floatval($each['price']);
    $_SESSION['cart'][$id]['quantity'] = 1;
} else {
    $_SESSION['cart'][$id]['quantity']++;
}

$_SESSION['success'] = "Đã thêm thành công ".$_SESSION['cart'][$id]['name']." vào giỏ hàng";
header('location:index.php');


