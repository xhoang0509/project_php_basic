<?php
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

$con = mysqli_connect('localhost','root','','abc_shop');
mysqli_set_charset($con,'utf8');
$sql="insert into manufacturer(name,address,phone,photo)
values('$name','$address','$phone','$photo')";

mysqli_query($con,$sql);
mysqli_close($con);
?>