<?php
session_start();


if(empty($_POST['email']) || empty($_POST['password'])) {
	$_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
	header('location:index.php');
	exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

if(isset($_POST['remmember_login'])) {
	$remmember_login = true;
} else {
	$remmember_login = false;
}

require 'connect.php';
$sql = "select * from admin where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 0) {
	$_SESSION['error'] = 'Mật khẩu hoặc tài khoản không chính xác';
	header('location:index.php');
	exit();
}

require 'connect.php';
if($remmember_login==true) {
	$token = uniqid("admin_", true).(string)time();
	$sql = "update admin set
	token = '$token'
	where id = '$id'";
	mysqli_query($connect, $sql);
	setcookie('remmember', $token, time() + 60*60*24 * 30); // 1 month
} 
if (mysqli_num_rows($result) == 1){
	$each= mysqli_fetch_array($result);
	

	$_SESSION['id']= $each['id'];
	$_SESSION['name']= $each['name'];
	$_SESSION['level']= $each['level'];

	header('location:root/index.php');
	exit;
}
header('location:index.php');
