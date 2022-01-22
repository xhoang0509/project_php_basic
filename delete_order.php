<?php
require './admin/connect.php';
$id = $_POST['id'];


$sql = "update orders set status = -1 where id = '$id'";
mysqli_query($connect, $sql);
echo "1";