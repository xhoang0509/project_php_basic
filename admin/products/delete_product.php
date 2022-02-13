<?php
session_start();
require '../check_admin_login.php';

if($_SESSION['level'] == 0) {
	$_SESSION['error'] = "Bạn không có quyền xóa nhà sản xuất!";
	echo $_SESSION['error'];
	header('location:index.php');
	exit();
}

if(empty($_GET['id'])) {
	$_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để xóa !";
	header('location:index.php');
	exit();
}
$id = $_GET['id'];
require '../connect.php';
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows === 0) {
	$_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để xóa !";
	header('location:index.php');
	exit();
}
$each = mysqli_fetch_array($result);
$name = $each['name'];
$sql = "delete from products where id = '$id'";
mysqli_query($connect, $sql);
$error = mysqli_error($connect);

$_SESSION['success'] = "Đã xóa thành công nhà sản xuất: ".$name." !";
header('location:index.php');