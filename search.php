<?php
require 'admin/connect.php';

$key_words = $_GET['term'];
$sql = "select * from products where name like '%$key_words%'";
$result = mysqli_query($connect, $sql);
$arr = [];
foreach ($result as $each) {
	$arr[] = [
		'label' => $each['name'],
		'value' => $each['id'],
		'photo' => $each['photo'],
	];
}

echo json_encode($arr);