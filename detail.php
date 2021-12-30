<?php
$id = $_GET['id'];
require 'admin/connect.php';
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
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
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
        <div class="wrapper">
           <?php include 'header.php' ?>
           <div class="container" style="padding: 0 5% 3%">
              <div class="d-flex">
                   <div>
                        <img class="detail-image" src="image/<?php echo $each['photo'] ?>" alt="">                   
                   </div>
                   <div class="detail-info">
                       <h3 class="detail-price">Giá bán: <?php echo $each['price'] ?> vnđ</h3>
                       <h3 class="mt-5">Thông số kỹ thuật: </h3>
                       <ul class="detail-list-info mt-5">
                           <li>CPU: Intel Core i7 11800H</li>
                           <li>RAM: 16GB</li>
                           <li>Ổ cứng: 512GB SSD</li>
                           <li>VGA: Nvidia RTX3060 6G</li>
                           <li>Màn hình: 15.6 inch QHD 165Hz</li>
                           <li>Đèn bàn phím: RGB</li>
                           <li>HĐH: Win 10</li>
                           <li>Màu: Đen</li>
                       </ul>
                       <a class="btn btn-primary mt-5" href="cart.php">Thêm vào giỏ hàng</a>
                   </div>
              </div>
           </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>
