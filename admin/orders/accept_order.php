<?php
require '../connect.php';

$id = $_POST['id_order'];

$sql = "update orders set status = 1 where id = '$id'";
mysqli_query($connect, $sql);


echo $id;