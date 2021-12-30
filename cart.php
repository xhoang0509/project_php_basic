<?php
session_start();
$id = $_SESSION['id'];

require 'admin/connect.php';
$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect, $sql);
$customer = mysqli_fetch_array($result);
if(!empty($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];  
}
require 'help.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>
        <title>Chi tiết sản phẩm</title>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
        <div class="wrapper">
           <?php include 'header.php' ?>
           <?php if(!empty($_SESSION['cart'])) { ?>
           <div class="container" style="padding: 0 5% 3%">
              <h1 style="text-align: left; font-weight: bold">Thông tin giỏ hàng</h1>
              <h2 class="text-success">
                    <?php if(!empty($_SESSION['name_product'])) {
                        echo $_SESSION['name_product'];
                        unset($_SESSION['name_product']);
                    }
                    ?>    </h2>
              <h2 class="text-danger">
                  <?php if(!empty($_SESSION['error'])) {
                      echo $_SESSION['error'];
                      unset($_SESSION['error']);
                  }
                  ?>    </h2>                
              <table class="w3-table w3-striped w3-bordered">
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                  </tr>
                  <?php 
                    $index = 1;
                    $total_money = 0;
                  ?>
                  <?php foreach ($cart as $id => $each): ?>                    
                      <tr>
                        <td><?php echo $index; $index++; ?></td>
                        <td><?php echo $each['name'] ?></td>
                        <td><img height="100" src="image/<?php echo $each['photo'] ?>" alt=""></td>
                        <td><?php echo format_number_to_currency($each['price'])?> vnd</td>
                        <td>
                          <a class="btn btn-secondary" href="update_quantity.php?id=<?php echo $id ?>&type=incre">+</a>
                          <?php echo $each['quantity']?>
                          <a class="btn btn-secondary" href="update_quantity.php?id=<?php echo $id ?>&type=decre">-</a>
                        </td>
                        <td><?php echo format_number_to_currency($each['price'] * $each['quantity'] ) ?> vnd</td>
                        <th><a class="color-red" href="delete_item_in_cart.php?id=<?php echo $id ?>">Xóa</a></th>
                      </tr>
                      <?php $total_money += $each['price'] * $each['quantity']?>
                  <?php endforeach ?>               
              </table>
              
              <h1 style="text-align: left; font-weight: bold">Thông tin thanh toán</h1>
              <h2>Tên người nhận: <?php echo $customer['name'] ?></h2>
              <h2>Địa chỉ: <?php echo $customer['address'] ?></h2>
              <h2>Số điện thoại: <?php echo $customer['phone'] ?></h2>
              <h2>Tổng tiền: <?php echo format_number_to_currency($total_money)?> vnd </h2>
              <a class="btn btn-primary" href="checkout.php">Đặt hàng</a>
           </div>
           <?php }else { ?> 
           <div class="container" style="padding: 0 5% 3%">
             <h3>Giỏ hàng trống. Hãy quay lại thêm sản phẩm vào <a class="text-underline" href="index.php">tại đây !</a></h3>
           </div>
           <?php } ?>

        </div>
       <?php include 'footer.php' ?>
    </body>
</html>
