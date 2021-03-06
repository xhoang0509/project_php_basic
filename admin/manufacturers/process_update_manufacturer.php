<?php
require '../check_admin_login.php';
require '../connect.php';

$id = $_POST['id'];

if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone'])) {
    $_SESSION['error'] = 'Yêu cầu nhập đủ thông tin!';
    header("location:update_manufacturer.php?id=$id");
    exit();
}


$name = mysqli_real_escape_string($connect,$_POST['name']);
$address = mysqli_real_escape_string($connect,$_POST['address']);
$phone = mysqli_real_escape_string($connect,$_POST['phone']);

if(!empty($_FILES['photo']['size'])) {    
    $photo = $_FILES['photo'];
    $folder = '../../image/';
    $file_extension = explode('.', $photo['name'])[1]; // get extenstion of image
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($photo["tmp_name"], $path_file);
} else {
    $file_name = $_POST['old_photo'];
}

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