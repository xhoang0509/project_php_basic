<?php
$name = $_POST['name'];
$photo = $_POST['photo'];
$price = $_POST['price'];
$description = $_POST['description'];

$con = mysqli_connect('localhost','root','','abc_shop');
mysqli_set_charset($con,'utf8');
$sql="insert into product(name,photo,price,description)
values('$name','$photo','$price','$description')";

mysqli_query($con,$sql);
mysqli_close($con);
?>