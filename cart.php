<?php
session_start();
$cart = $_SESSION['cart'];
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="wrapper">
           <?php include 'header.php' ?>
           <div class="container" style="padding: 0 5% 3%">
              <h1 style="text-align: left; font-weight: bold">Thông tin giỏ hàng</h1>
              <h2 class="text-success">
                    <?php if(!empty($_SESSION['name_product'])) {
                        echo $_SESSION['name_product'];
                        unset($_SESSION['name_product']);
                    }
                    ?>    
                </h2>
                <h2 class="text-danger">
                    <?php if(!empty($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>    
                </h2>                
              <table class="w3-table w3-striped w3-bordered">
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                  </tr>
                  <?php $index = 1; ?>
                  <?php foreach ($cart as $id => $each): ?>
                      <tr>
                        <td><?php echo $index; $index++; ?></td>
                        <td><?php echo $each['name'] ?></td>
                        <td><img height="100" src="image/<?php echo $each['photo'] ?>" alt=""></td>
                        <td><?php echo $each['price']?> vnd</td>
                        <td>
                          <a href="">+</a>
                          <?php echo $each['quantity']?>
                          <a href="">-</a>
                        </td>
                        <td><?php echo $each['price'] * $each['quantity'] ?> vnd</td>
                        <th><a class="color-red" href="delete_item_in_cart.php?id=<?php echo $id ?>">Xóa</a></th>
                      </tr>
                  <?php endforeach ?>               
                </table>
           </div>
           <?php include 'footer.php' ?>
        </div>
    </body>
</html>
