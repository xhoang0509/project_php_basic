<?php
session_start();
$name_receiver = $_POST['name'];
$address_receiver = $_POST['address_receiver'];
$phone_receiver = $_POST['phone'];
$total_price = $_POST['total_price'];
$notes = $_POST['notes'];
$customer_id = $_SESSION['id'];

$cart = $_SESSION['cart'];

require 'admin/connect.php';
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
header('location:index.php');

