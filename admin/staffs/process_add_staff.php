<?php
require '../check_admin_login.php';
require '../connect.php';
require '../contants/PASSWORD_HASH.php';

if(!isset($_POST['name']) || !isset($_POST['address']) || !isset($_POST['gender']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['level'])) {
	$_SESSION['add_staff_error'] = 'Yêu cầu nhập đủ thông tin !';
	header("location:add_staff.php");
	exit();
}

$name = mysqli_real_escape_string($connect,$_POST['name']);
$photo = $_FILES['photo'];
$address = mysqli_real_escape_string($connect,$_POST['address']);
$gender = $_POST['gender'];
$email = mysqli_real_escape_string($connect,$_POST['email']);
$password = mysqli_real_escape_string($connect,$_POST['password']);

$password_hash = md5($password).$PASSWORD_HASH;
$level=$_POST['level'];

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);


$sql = "insert into admin(name, photo, address, gender, email, password, level) 
VALUES ('$name', '$file_name', '$address', '$gender', '$email', '$password_hash','$level')";

mysqli_query($connect, $sql);

$_SESSION['staff_name'] = "Thêm thành công nhân viên: ".$name;

header('location:index.php');
require '../close_connect.php';