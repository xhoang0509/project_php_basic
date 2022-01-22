<?php 
session_start();
require './admin/connect.php';
require './help.php';

if(empty($_SESSION['id_customer'])) {
  header('location:login.php');
  exit();
}

$id = $_SESSION['id_customer'];
$sql = "select * from orders where customer_id = '$id'";

$result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thông tin cá nhân</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/base.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php include './header.php' ?>
	<div class="container">
		<h1 style="font-weight: bold">Đơn hàng đã đặt: </h1>
		<table class="w3-table-all">
		    <thead>
		      <tr class="w3-light-grey">
		        <th>Tên người nhận</th>
		        <th>Số điện thoại</th>
		        <th>Địa chỉ</th>
		        <th>Trang thái</th>
		        <th>Tổng tiền</th>
		        <th>Ngày đặt</th>
		      </tr>
		    </thead>
		    <?php foreach ($result as $each): ?>
				<tr>
					<td><?php echo $each['name_receiver'] ?></td>
					<td><?php echo $each['phone_receiver'] ?></td>
					<td><?php echo $each['address_receiver'] ?></td>
					<td>
						<?php 
							if($each['status'] == 0) {
								echo "Mới đặt đơn";
							} else if($each['status'] == 1) {
								echo "Đã duyệt";
							} else if($each['status'] == 2)  {
								echo "Đang vận chuyển";
							}
						?>
							
					</td>
					<td><?php echo format_number_to_currency($each['total_price'])." vnd" ?></td>
					<td><?php echo $each['created_at'] ?></td>					
				</tr>	
    	   <?php endforeach ?>	   
		  </table>
	</div>
	<?php include './footer.php' ?>		
</body>
</html>