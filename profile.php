<?php 
session_start();
require './admin/connect.php';

if(empty($_SESSION['id'])) {
  header('location:login.php');
  exit();
}

$id = $_SESSION['id'];
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thông tin cá nhân</title>
	<link rel="stylesheet" href="./css/style.css" />
	<link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/base.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php include './header.php' ?>
	<div class="container">
		<form class="profile" action="process_profile.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="photo" value="<?php echo $each['photo'] ?>">			
			<div class="avatar">
				<img class="default-image-user" src="./image/<?php echo $each['photo'] ?>" alt="">
				<label for="photo" class="btn btn-secondary mt-10">Thay đổi ảnh</label>
				<input type="file" name="photo_new" style="visibility:hidden;" id="photo">
			</div>
			<div class="info">
				<h3 class="mt-10">Tên: <?php echo $each['name'] ?></h3>
				<h3 class="mt-10">Email: 
					<?php echo $each['email'] ?>
				</h3>
				<h3 class="mt-10">
					Địa chỉ: 
					<input name="address" type="text" value="<?php echo $each['address'] ?>">
				</h3>
				<h3 class="mt-10">Số điện thoại: <input name="phone" type="text" value="<?php echo $each['phone'] ?>"></h3>
				<button class="mt-10 btn btn-primary btn-submit">Thay đổi</button>
				<br>
				<br>
				<a style="color: blue; text-decoration: underline;" href="cart.php">Đi đến thanh toán</a>
			</div>
		</form>
	</div>
	<?php include './footer.php' ?>		
</body>
</html>