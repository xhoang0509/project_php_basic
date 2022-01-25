<?php
session_start();
if(isset($_SESSION['id'])) {
    header("location:index.php");
    exit();
}

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone'])) {
	$_SESSION['error'] = "Yêu cầu nhập đủ thông tin";
	header("location:register.php");
	exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];


require 'admin/connect.php';
$sql = "select * from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 1) {
	$_SESSION['error'] = "Email này đã tồn tại, hãy đăng kí email khác !";
	header("location:register.php");
	exit();
}
$sql = "insert into customers(name, email, password, phone)
values('$name', '$email', '$password', '$phone')";
mysqli_query($connect, $sql);

require 'admin/close_connect.php';

$_SESSION['success'] = "Đăng kí thành công";
$_SESSION['name'] = $name;
$_SESSION['email_register'] = $email;
$_SESSION['password_register'] = $password;
header("location:login.php");
