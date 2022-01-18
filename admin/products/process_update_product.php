<?php
require '../check_admin_login.php';
require '../connect.php';
if(empty($_GET['id'])) {

}

if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description']) 
	|| empty($_POST['quantity']) || empty($_POST['manufacturer_id']) || empty($_POST['type'])) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin !';
    header('location:update_product.php?');
    exit();
}

$id = $_GET['id'];
$name = mysqli_real_escape_string($connect,$_POST['name']);
$photo = $_FILES['photo_new'];
$price = mysqli_real_escape_string($connect,$_POST['price']);
$description = mysqli_real_escape_string($connect,$_POST['description']);
$quantity = mysqli_real_escape_string($connect,$_POST['quantity']);
$manufacturer_id = mysqli_real_escape_string($connect,$_POST['manufacturer_id']);
$type = mysqli_real_escape_string($connect,$_POST['type']);


$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);



if(isset($_POST['photo']) && $photo['size'] == 0) {
	$sql = "update products
	set
	name = '$name' ,
	price = '$price' ,
	description = '$description',
	quantity = '$quantity',
	manufacturer_id = '$manufacturer_id',
	type = '$type'
	where id = '$id'";
} else {
	$sql = "update products
	set
	name = '$name' ,
	photo = '$file_name' ,
	price = '$price' ,
	description = '$description',
	quantity = '$quantity',
	manufacturer_id = '$manufacturer_id',
	type = '$type'
	where id = '$id'";

}


mysqli_query($connect, $sql);
require '../close_connect.php';
$_SESSION['product_name'] = "Sửa thành công sản phẩm !!!";
header('location:index.php');