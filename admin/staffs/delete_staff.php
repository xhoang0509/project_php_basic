<?php
require '../check_admin_login.php';

if(empty($_GET['id'])) {
	$_SESSION['error'] = "Yêu cầu chọn nhân viên để xóa !";
	header('location:index.php');
	exit();
}
$id = $_GET['id'];
require '../connect.php';
$sql = "select * from admin where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows === 0) {
	$_SESSION['error'] = "Yêu cầu chọn nhân viên để xóa !";
	header('location:index.php');
	exit();
}
$each = mysqli_fetch_array($result);
$name = $each['name'];
$sql = "delete from admin where id = '$id'";
mysqli_query($connect, $sql);
$error = mysqli_error($connect);
// if(!empty($error)) {
// 	$_SESSION['error'] = "Không thể xóa nhà sản xuất ".$name." vì đang chứa sản phẩm !";
// 	header('location:index.php');
// 	exit();
// }
$_SESSION['success'] = "Đã xóa thành công nhân viên: ".$name." !";
header('location:index.php');