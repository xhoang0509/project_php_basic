<?php
session_start();
require 'contants/PASSWORD_HASH.php';
require 'connect.php';

if(empty($_POST['email']) || empty($_POST['password'])) {
	$_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
	header('location:index.php');
	exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = md5($password).$PASSWORD_HASH;

$sql = "select * from admin where email = '$email' and password = '$password_hash' limit 1";
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result) != 1)  {
	$_SESSION['error'] = 'Tài khoản hoặc mật khẩu không chính xác !';
	header('location:index.php');
	exit();
} else {
	$each = mysqli_fetch_array($result);	
	$_SESSION['admin_name'] = $each['name'];
	$_SESSION['level'] = $each['level'];
	header('location:root/index.php');
	exit();
}
