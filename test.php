<?php
require 'admin/connect.php';

$sql = "select * from products";
$result = mysqli_query($connect, $sql);
$arr = [];
foreach ($result as $each) {	
	$arr[] = $each;
}
echo json_encode($arr);