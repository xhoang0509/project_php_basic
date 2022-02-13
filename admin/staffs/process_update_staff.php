<?php
require '../check_admin_login.php';
require '../connect.php';
require '../contants/PASSWORD_HASH.php';

$name = mysqli_real_escape_string($connect,$_POST['name']);
$photo = $_FILES['photo'];
$address = mysqli_real_escape_string($connect,$_POST['address']);
$gender = $_POST['gender'];
$email = mysqli_real_escape_string($connect,$_POST['email']);
$password = mysqli_real_escape_string($connect,$_POST['password']);

$password_hash = md5($password).$PASSWORD_HASH;

if(empty($name) || empty($photo) || empty($address) || empty($gender) || empty($email) || empty($password)) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
    header('location:update_staff.php');
    exit();
}

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);


$sql = "update staffs
set
name = '$name' ,
photo = '$file_name' ,
address = '$address' ,
phone = '$phone',
email = '$email',
password='$password_hash'
where id = '$id'";

mysqli_query($connect, $sql); 
die($sql);
require '../close_connect.php';
$_SESSION['staff_name'] = "Cập nhật thành công nhân viên: ".$name." !";
// header('location:index.php');