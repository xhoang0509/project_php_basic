<?php
require 'admin/connect.php';
require 'help.php';
$total = 0;
$sum = 0;
session_start();

if(empty($_SESSION['id_customer'])) {
  header('location:login.php');
  exit();
}

$id = $_SESSION['id_customer'];

$sql = "select * from customers where id = '$id'";
$result = mysqli_query($connect, $sql);
$customer = mysqli_fetch_array($result);
if(!empty($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];  
}
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
        <title>Giỏ hàng</title>
        <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
       <?php include 'header.php' ?>
        <div class="wrapper">
           <?php if(!empty($_SESSION['cart'])) { ?>
                <div class="container" style="padding: 0 5% 3%;min-height: 70vh;">
                    <h1 style="text-align: left; font-weight: bold">- Thông tin giỏ hàng</h1>
                    <h2 class="text-success">
                        <?php if(!empty($_SESSION['name_product'])) {
                            echo $_SESSION['name_product'];
                            unset($_SESSION['name_product']);
                        }
                        ?>    </h2>
                    <h2 class="text-danger">
                      <?php if(!empty($_SESSION['error_delete_cart'])) {
                          echo $_SESSION['error_delete_cart'];
                          unset($_SESSION['error_delete_cart']);
                      }
                      ?>    </h2>                
                    <table class="w3-table-all">
                      <thead>
                        <tr class="w3-light-grey">
                          <th>STT</th>
                          <th>Tên</th>
                          <th>Ảnh</th>
                          <th>Giá</th>
                          <th>Số lượng</th>
                          <th>Thành tiền</th>
                          <th>Xóa</th>
                        </tr>
                      </thead>
                      <?php 
                        $index = 1;                    
                      ?>
                      <?php foreach ($cart as $id => $each): ?>                    
                          <tr>
                            <td><?php echo $index; $index++; ?></td>
                            <td><?php echo $each['name'] ?></td>
                            <td><img height="100" src="image/<?php echo $each['photo'] ?>" alt=""></td>
                            <td>
                              <span class="span-price"><?php echo format_number_to_currency($each['price'])?> </span>vnd
                            </td>
                            <td>                          
                              <button class="btn btn-secondary btn-update-quantity" data-id="<?php echo $id ?>" data-type="0">-</button>                          
                              <span class="span-quantity"><?php echo $each['quantity']?></span>
                              <button class="btn btn-secondary btn-update-quantity" data-id="<?php echo $id ?>" data-type="1">+</button>
                            </td>
                            <td>
                              <span class="span-sum">
                                <?php 
                                  $sum =  $each['price'] * $each['quantity'];
                                  echo format_number_to_currency($sum);
                                  $total += $sum;
                                ?> 
                              </span> vnd
                            </td>
                            <td>
                                <button class="btn btn-danger btn-delete" data-id="<?php echo $id ?>">Xóa</button>
                            </td>
                          </tr>
                      <?php endforeach ?>                                 
                    </table>
                    <h3 style="font-weight: bold;">Tổng tiền hóa đơn <span class="span-total"><?php echo format_number_to_currency($total) ?></span> vnd</h3>              
                    <form action="process_checkout.php" method="POST">
                    <h1 style="text-align: left; font-weight: bold; margin-top: 50px">- Thông tin thanh toán</h1>                
                    <h4><span style="font-weight: bold;">Tên người nhận: </span><?php echo $customer['name'] ?></h4>
                    <h4><span style="font-weight: bold;">Địa chỉ: </span>
                        <?php 
                            if(empty($customer['address'])) {
                                echo '<span style="color:red;">Trống</span>';
                            }
                            else {
                                echo $customer['address'];
                            } 
                        ?>                    
                    </h4>
                    <h4><span style="font-weight: bold;">Số điện thoại: </span><?php echo $customer['phone'] ?></h4>
                    <h4><span style="font-weight: bold;">Ghi chú: </span></h4>
                    <textarea style="width: 564px;height: 91px;" name="notes" id="" cols="30" rows="10"></textarea><br><br>
                    <?php if(empty($customer['address'])) { ?>
                        <a class="btn btn-primary" href="profile.php">Yêu cầu chỉnh sửa thông tin để thanh toán</a>
                    <?php }else{ ?>
                        <button class="btn btn-primary">Tiến hàng đặt hàng</button>
                    <?php } ?>
                    <input type="hidden" name="name" value="<?php echo $customer['name'] ?>">
                    <input type="hidden" name="address_receiver" value="<?php echo $customer['address'] ?>">
                    <input type="hidden" name="phone" value="<?php echo $customer['phone'] ?>">
                    <input type="hidden" name="total_price" value="<?php echo $total?>">
                    </form>
                </div>
           <?php }else { ?> 
               <div class="container" style="padding: 0 5% 3%;min-height: 70vh;">
                 <h3>Giỏ hàng trống. Hãy quay lại thêm sản phẩm vào <a class="text-underline" href="index.php">tại đây !</a></h3>
               </div>
           <?php } ?>
        </div>
       <?php include 'footer.php' ?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        // Create our number formatter.
        Number.prototype.format = function(n, x) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
        };

        $(document).ready(function() {
            function getTotal() {
                let total = 0;
                $(".span-sum").each(function(index, el) {
                    total += parseInt($(this).text().replace(/,/g, ''));                 
                });
                $(".span-total").text(total.format())
            }
            $(".btn-update-quantity").click(function() {
                const btn = $(this);
                let id = $(this).data('id');
                let type = $(this).data('type');
                $.ajax({
                    url: 'update_quantity.php',
                    type: 'GET',
                    data: {id, type},
                })
                .done(function() {
                    let parent_tr = btn.parents('tr');
                    let price = parseInt(parent_tr.find(".span-price").text().replace(/,/g, ''));
                    let quantity = parent_tr.find(".span-quantity").text();

                    if(type === 1) {
                        quantity++;
                    } else {
                        quantity--;
                    }
                    if(quantity === 0) {
                        parent_tr.remove()
                    } else {
                        parent_tr.find(".span-quantity").text(quantity);
                        let sum = price * quantity;
                        parent_tr.find('.span-sum').text(sum.format());
                    }
                    getTotal()
                })
            });
            $(".btn-delete").click(function() {
                const btn = $(this);
                let id = $(this).data('id');
                $.ajax({
                    url: 'delete_item_in_cart.php',
                    type: 'GET',
                    data: {id},
                })
                .done(async function() {
                    btn.parents("tr").remove();
                    getTotal()
                })
            });
        });

        </script>
    </body>
</html>
