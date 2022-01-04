<?php
require '../check_admin_login.php';

$name = $_POST['name'];
$photo = $_FILES['photo'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$level=$_POST['level'];

$folder = '../../image/';
$file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into admin(name, photo, address, gender, email, password, level) 
VALUES ('$name', '$file_name', '$address', '$gender', '$email', '$password','$level')";
mysqli_query($connect, $sql);

$_SESSION['staff_name'] = "Thêm thành công nhân viên: ".$name;

header('location:index.php');
require '../close_connect.php';