<?php
require '../check_admin_login.php';
require '../connect.php';

if(empty($_POST['id_order']) || empty($_POST['type'])) {
	header("location:index.php");
	exit();
}

$id = $_POST['id_order'];
$type = $_POST['type'];

if($type == "accept") {
	$sql = "update orders set status = 1 where id = '$id'";
	mysqli_query($connect, $sql);
} else {
	$sql = "update orders set status = -1 where id = '$id'";
	mysqli_query($connect, $sql);
}

echo $id;