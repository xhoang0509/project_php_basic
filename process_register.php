<?php
session_start();
if(isset($_SESSION['id'])) {
    header("location:index.php");
    exit();
}
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
if(empty($name) || empty($email) || empty($password)) {
	$_SESSION['error'] = "Yêu cầu nhập đủ thông tin";
	header("location:register.php");
	exit();
}

require 'admin/connect.php';
$sql = "select * from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows == 1) {
	$_SESSION['error'] = "Email này đã tồn tại, hãy đăng kí email khác !";
	header("location:register.php");
	exit();
}
$sql = "insert into customers(name, email, password)
values('$name', '$email', '$password')";
mysqli_query($connect, $sql);


require 'admin/close_connect.php';


$_SESSION['success'] = "Đăng kí thành công";
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
header("location:login.php");
