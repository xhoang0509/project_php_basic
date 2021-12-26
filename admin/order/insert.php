<?php
$name = $_POST['name'];
$photo = $_POST['photo'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];


$con = mysqli_connect('localhost','root','','abc_shop');
mysqli_set_charset($con,'utf8');

$sql="insert into order(name,phone,photo,address,email)
values('$name','$phone','$photo','$address','$email')";
die($sql);

mysqli_query($con,$sql);
mysqli_close($con);
