<?php
require 'admin/connect.php';
require 'mail.php';

$email = $_POST['email'];

$sql = "SELECT id FROM customers
WHERE email '$email'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) == 1) {
	send_mail()
}