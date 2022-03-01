<?php
session_start();
require 'admin/connect.php';
require 'admin/utils/validation_js.php';

if(empty($_POST['product_id'])) {
	header("location:index.php");
	exit();
}

$product_id = $_POST['product_id'];

if(empty($_SESSION['id_customer'])) {
	$_SESSION['error_rating'] = 'Yêu cầu đăng nhập để đánh giá sản phẩm';
	header("location:detail.php?id=$product_id");
	exit();	
} else {
	if(empty($_POST['rating']) || empty($_POST['comment'])) {
		$_SESSION['error_rating'] = 'Yêu cầu nhập đủ thông tin để đánh giá sản phẩm';
		header("location:detail.php?id=$product_id");
		exit();
	} else {
		$customer_id = $_SESSION['id_customer'];
		$rating = $_POST['rating'];
		$comment = $_POST['comment'];
		$comment = validation_js($comment);

		$sql = "INSERT INTO product_rating(product_id, customer_id, rating, comment)
		VALUES ('$product_id', '$customer_id', '$rating', '$comment')";

		mysqli_query($connect, $sql);

		require 'admin/close_connect.php';
		header("location:detail.php?id=$product_id");
	}
}


