<?php
function format_number_to_currency($number) {
	$numbar = (int)$number;
  return number_format($number, 0, ',');
}

$url =  "//{$_SERVER['REQUEST_URI']}";
if($url === "//abcshop/help.php") {
	header('location:error.php');
	exit();	
}