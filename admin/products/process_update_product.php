<?php
session_start();
$name = $_POST['name'];
$photo = $_FILES['photo'];
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$manufacturer_id = $_POST['manufacturer_id'];
$type = $_POST['type'];

if(empty($name) || empty($photo) || empty($price) || empty($description) || empty($quantity) || empty($manufacturer_id) || empty($type)) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
    header('location:update_product.php');
    exit();
}

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "update products
set
name = '$name' ,
photo = '$file_name' ,
price = '$price' ,
description = '$description'
quantity = '$quantity'
manufacturer_id = '$manufacturer_id'
type = '$type'
where id = '$id'";

mysqli_query($connect, $sql);
require '../close_connect.php';
$_SESSION['product_name'] = "Sửa thành công sản phẩm: ".$name." !";
header('location:index.php');