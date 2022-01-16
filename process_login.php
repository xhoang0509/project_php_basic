<?php
session_start();

require("admin/connect.php");

if(empty($_POST['email']) || empty($_POST['password'])) {
	$_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
	header('location:login.php');
	exit();
}
if(isset($_SESSION['id'])) {
    header("location:index.php");
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$remember_login;
if($_POST['remember_login']) {
	$remember_login = true;
} else {
	$remember_login = false;
}

$sql = "select * from customers where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 0) {
	$_SESSION['error'] = 'Mật khẩu không chính xác';
	header('location:login.php');
	exit();
}

$each = mysqli_fetch_array($result);
$id = $each['id'];
$_SESSION['id'] = $each['id'];
$_SESSION['name'] = $each['name'];
if($remember_login) {
	$token = uniqid("user_", true).(string)time();
	$sql = "update customers set
	token = '$token'
	where id = '$id'";
	mysqli_query($connect, $sql);
	setcookie('remmember', $token, time() + 60*60*24 * 30); // 1 month
}

header('location:index.php');
