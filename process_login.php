<?php
session_start();
if(isset($_SESSION['id'])) {
    header("location:index.php");
    exit();
}
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email) || empty($password)) {
	$_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
	header('location:login.php');
	exit();
}

require("admin/connect.php");
$sql = "select * from customers where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 0) {
	$_SESSION['error'] = 'Mật khẩu không chính xác';
	header('location:login.php');
	exit();
}
$each = mysqli_fetch_array($result);
$_SESSION['id'] = $each['id'];
$_SESSION['name'] = $each['name'];
header('location:index.php');
