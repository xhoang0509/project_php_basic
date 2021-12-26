<?php
session_start();
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
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

require '../connect.php';
$sql = "insert into manufacturers(name, photo, address, phone)
values('$name', '$file_name', '$address', '$phone')";
mysqli_query($connect, $sql);
require '../close_connect.php';
header('location:add_manufacturer.php');