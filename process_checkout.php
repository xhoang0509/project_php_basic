<?php
session_start();
require 'admin/connect.php';

if(empty($_SESSION['id_customer'])) {
	header("location:index.php");
	exit();
}

if(empty($_POST['name']) || empty($_POST['address_receiver']) || empty($_POST['phone'])) {
	$_SESSION['notifi'] = "Yêu cầu nhập đủ thông tin để tiến hàng đặt hàng";
	header("location:profile.php");
	eixt();
}

$name_receiver = $_POST['name'];
$address_receiver = $_POST['address_receiver'];
$phone_receiver = $_POST['phone'];
$total_price = $_POST['total_price'];
$notes = $_POST['notes'];
$customer_id = $_SESSION['id_customer'];

$cart = $_SESSION['cart'];


$status = 0; // moi dat
$sql = "INSERT INTO orders(customer_id, name_receiver, phone_receiver, address_receiver, notes, status, total_price)
VALUES ('$customer_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$notes', '$status', '$total_price')";
mysqli_query($connect, $sql);



$sql = "select max(id) from orders where customer_id = '$customer_id'";
$result = mysqli_query($connect, $sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

foreach ($cart as $product_id => $each) {
	$quantity = $each['quantity'];
	$sql = "insert into order_product(order_id, product_id, quantity)
	values('$order_id', '$product_id', '$quantity')";
	mysqli_query($connect, $sql); 
}

require 'admin/close_connect.php';
unset($_SESSION['cart']);
$_SESSION['checkouted'] = true;
header('location:purchase.php');

