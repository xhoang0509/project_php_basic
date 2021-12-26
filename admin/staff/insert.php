<?php
$name = $_POST['name'];
$photo = $_POST['photo'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

$con = mysqli_connect('localhost','root','','abc_shop');
mysqli_set_charset($con,'utf8');
$sql="insert into staff(name,photo,phone,address,gender,email,password)
values('$name','$photo','$phone','$address','$gender','$email','$password')";

mysqli_query($con,$sql);
mysqli_close($con);
?>