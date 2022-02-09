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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/purchase.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php if(isset($_SESSION['checkouted'])) {?>
            <script>alert("Đơn hàng đã được khởi tạo !")</script>
            <?php unset($_SESSION['checkouted']) ?>
        <?php } ?>
	<?php include './header.php' ?>
	<div class="container" style="padding: 0 0 3%">
		<h1 style="font-weight: bold">Đơn hàng đã đặt: </h1>
		<table class="w3-table-all">
		    <thead>
		      <tr class="w3-light-grey">
		        <th>Tên người nhận</th>
		        <th>Số điện thoại</th>
		        <th>Địa chỉ</th>
		        <th>Sản phẩm</th>
		        <th>Trang thái</th>
		        <th>Tổng tiền</th>
		        <th>Ngày đặt</th>
		        <th>Hủy</th>
		      </tr>
		    </thead>
		    <?php foreach ($result as $each): ?>
				<tr>
					<td><?php echo $each['name_receiver'] ?></td>
					<td><?php echo $each['phone_receiver'] ?></td>
					<td><?php echo $each['address_receiver'] ?></td>
					<td>
						
					</td>
					<td class="status-<?php echo $each['id'] ?>">
						<?php 
							switch ($each['status']) {
								case '-1':
								echo '<div class="td-status bg-danger text-white">Đã hủy</div>';
									break;
								case '0':
									echo '<div class="td-status bg-warning text-white">Đợi duyệt</div>';
									break;
								case '1':
									echo '<div class="td-status bg-success text-white">Đã duyệt</div>';
									break;						
							}
						?>
							
					</td>
					<td><?php echo format_number_to_currency($each['total_price'])." vnd" ?></td>
					<td><?php echo $each['created_at'] ?></td>				
					<td>
						<?php if($each['status'] == 0) {?>
							<button class="btn btn-danger btn-delete-order" data-id=<?php echo $each['id'] ?>>Hủy đơn</button>
						<?php } ?>
					</td>	
				</tr>	
    	   <?php endforeach ?>	   
		  </table>
	</div>
	<?php include './footer.php' ?>		
	<script>
		$(document).ready(function() {
			$(".btn-delete-order").click(function() {
				let btn = $(this);
				let id = $(this).data('id');
				$.ajax({
					url: 'delete_order.php',
					type: 'POST',					
					data: {id},
				})
				.done(function(data) {
					if(data == 1) {
						btn.remove()
						let btnStatus = $(`.status-${id}`).children('div');
						btnStatus.removeClass("bg-warning")
						btnStatus.addClass('bg-danger')
						btnStatus.text("Đã hủy")
					}
				})	
			});
		});
	</script>
</body>
</html>