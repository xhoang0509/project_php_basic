<?php
$id = $_POST['id'];
$photo = $_FILES['photo_new'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$folder = 'image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);

require './admin/connect.php';
if(isset($_POST['photo']) && $photo['size'] == 0) {
	$sql = "update customers set
	address = '$address',
	phone = '$phone'
	where id = '$id'";
} else {
	$sql = "update customers set
	photo = '$file_name',
	address = '$address',
	phone = '$phone'
	where id = '$id'";
}


mysqli_query($connect, $sql);
require 'admin/close_connect.php';
header("location:profile.php");