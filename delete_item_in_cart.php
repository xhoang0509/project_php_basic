<?php
session_start();
if(empty($_GET['id'])) {
	$_SESSION['error'] = "Chọn sản phẩm để xóa !";
	header('location:cart.php');
	exit();
}
$id = $_GET['id'];
$name = $_SESSION['cart'][$id]['name'];
unset($_SESSION['cart'][$id]);
$_SESSION['name_product'] = "Xóa thành công sản phẩm ".$name;
header('location:cart.php');