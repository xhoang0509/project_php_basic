<?php
session_start();
$name = $_POST['name'];
$photo = $_FILES['photo'];
$price = $_POST['price'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$manufacturer_id = $_POST['product_id'];
$type = $_POST['type'];

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "INSERT INTO products(name,photo, price,description, quantity, manufacturer_id, type) 
VALUES ('$name', '$file_name', '$price', '$description', '$quantity', '$manufacturer_id', '$type')";

mysqli_query($connect, $sql);
$_SESSION['manufacturer_name'] = "Thêm thành công sản phẩm: ".$name;

header('location:index.php');
require '../close_connect.php';