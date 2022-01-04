<?php
require '../check_admin_login.php';

$name = $_POST['name'];
$photo = $_FILES['photo'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

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

require '../connect.php';
$sql = "update staffs
set
name = '$name' ,
photo = '$file_name' ,
address = '$address' ,
phone = '$phone',
email = '$email',
password='$password'
where id = '$id'";

mysqli_query($connect, $sql); 
die($sql);
require '../close_connect.php';
$_SESSION['staff_name'] = "Cập nhật thành công nhân viên: ".$name." !";
// header('location:index.php');