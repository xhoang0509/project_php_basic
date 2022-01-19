<?php
require '../check_admin_login.php';
require '../connect.php';

$name = mysqli_real_escape_string($connect,$_POST['name']);
$photo = $_FILES['photo'];
$price = mysqli_real_escape_string($connect,$_POST['price']);
$description = mysqli_real_escape_string($connect,$_POST['description']);
$quantity = mysqli_real_escape_string($connect,$_POST['quantity']);
$manufacturer_id = $_POST['manufacturer_id'];
$type = mysqli_real_escape_string($connect,$_POST['type']);

if(empty($name) || empty($photo) || empty($price) || empty($description) || empty($quantity) || empty($manufacturer_id) || empty($type) ) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
    header('location:add_product.php');
    exit();
}

if($price < 0) {
	 $_SESSION['error'] = 'Yêu cầu giá không được âm !';
    header('location:add_product.php');
    exit();
}
if($quantity < 0) {
	 $_SESSION['error'] = 'Yêu cầu số lượng không được âm !';
    header('location:add_product.php');
    exit();
}

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);


$sql = "INSERT INTO products(name,photo, price,description, quantity, manufacturer_id, type) 
VALUES ('$name', '$file_name', '$price', '$description', '$quantity', '$manufacturer_id', '$type')";

mysqli_query($connect, $sql);
$_SESSION['product_name'] = "Thêm thành công sản phẩm: ".$name;

header('location:index.php');
require '../close_connect.php';