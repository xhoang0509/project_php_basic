<?php
require '../check_admin_login.php';
require '../connect.php';

$name = mysqli_real_escape_string($connect,$_POST['name']);
$address = mysqli_real_escape_string($connect,$_POST['address']);
$phone = mysqli_real_escape_string($connect,$_POST['phone']);
$photo = $_FILES['photo'];

if(empty($name) || empty($address) || empty($phone) || empty($photo) ) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
    header('location:add_manufacturer.php');
    exit();
}

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);


$sql = "insert into manufacturers(name, photo, address, phone)
values('$name', '$file_name', '$address', '$phone')";
mysqli_query($connect, $sql);
require '../close_connect.php';
$_SESSION['manufacturer_name'] = "Thêm thành công nhà sản xuất: ".$name." !";
header('location:index.php');