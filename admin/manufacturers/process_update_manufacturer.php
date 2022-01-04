<?php
require '../check_super_admin_login.php';

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_FILES['photo'];

if(empty($name) || empty($address) || empty($phone) || empty($photo) ) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
    header('location:update_manufacturer.php');
    exit();
}

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "update manufacturers
set
name = '$name' ,
photo = '$file_name' ,
address = '$address' ,
phone = '$phone'
where id = '$id'";

mysqli_query($connect, $sql);
require '../close_connect.php';
$_SESSION['manufacturer_name'] = "Sửa thành công nhà sản xuất: ".$name." !";
header('location:index.php');