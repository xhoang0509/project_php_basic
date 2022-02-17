<?php
session_start();

require 'help.php';
require 'admin/connect.php';

if(empty($_GET['id'])) {
    header("location:index.php");
    exit();
}

$id = $_GET['id'];
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);


if($number_rows == 0) {
    header("location:index.php");
    exit();
}

$each = mysqli_fetch_array($result);

$sql = "select *, name
from product_rating join customers
on product_rating.customer_id = customers.id
where product_id = '$id'";
$result_rating = mysqli_query($connect, $sql);
$num_result_rating = mysqli_num_rows($result_rating);

if($num_result_rating != 0) {
    $sql = "SELECT product_id, COUNT(product_id) as 'count_product_id', SUM(rating) AS 'sum_rating'  
    FROM product_rating 
    WHERE product_id = $id 
    GROUP BY product_id ";
    $result_avg_rating = mysqli_fetch_array(mysqli_query($connect, $sql));
    $avg_rating = $result_avg_rating['sum_rating'] / $result_avg_rating['count_product_id'];
    $avg_rating = number_format($avg_rating,1,",",".");
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
        <title>Chi tiết sản phẩm</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
        <link rel="stylesheet" href="./css/rate_star_detail.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="./css/base.css" />        
        <style>
            .checked {
              color: orange;
            }
        </style>
    </head>
    <body>
       <?php include 'header.php' ?>
        <div class="wrapper">
           <div class="container" style="padding: 0 5% 3%">
              <div class="d-flex">
                   <div style="width: 30%; display: flex; flex-direction: column;">
                        <div><img class="detail-image" src="image/<?php echo $each['photo'] ?>" alt=""></div>
                        <?php if(!empty($_SESSION['id_customer'])) { ?>
                            <button class="mt-10 btn-add-to-cart btn btn-primary " data-id="<?php echo $id ?>">Thêm vào giỏ hàng</button>
                        <?php } else { ?>
                            <a class="mt-10 btn btn-primary" href="login.php">Đăng nhập để mua hàng</a>
                        <?php } ?>             
                   </div>
                   <div class="detail-info">
                        <?php if(isset($_SESSION['error_rating'])) {?>
                            <h1 style="color: red;margin: 0 0 20px;"><?php echo $_SESSION['error_rating'] ?></h1>
                            <script>
                                $(document).ready(function() {
                                    $(".btn-rating").click(function() {
                                        $.notify("Yêu cầu nhập thông tin để gửi đánh giá !", "warn");                                        
                                    });
                                });
                            </script>
                            <?php unset($_SESSION['error_rating']) ?>
                        <?php } ?>
                       <h3 class="detail-price">- Giá bán: <?php echo format_number_to_currency($each['price']) ?> vnđ</h3>
                       <h3 class="mt-10">- Mô tả chi tiết: </h3>
                       <ul class="mt-10 detail-list-info">
                           <li><?php echo $each['description'] ?></li>
                       </ul>                       
                        <?php if($num_result_rating !== 0) { ?>
                            <div class="rated">
                                <h1 style="margin: 0;margin-top: 100px">- Đánh giá sản phẩm</h1>
                                <h4 class="mt-10">Trung bình đánh giá: <?php echo $avg_rating ?> <span class="fa fa-star checked"></span></h4>
                                <?php foreach ($result_rating as $each): ?>
                                    <div class="rated-item mt-10">
                                        <h4 class="mt-5">Khách hàng: <span style="color: blue"><?php echo $each['name'] ?></span></h4>
                                        <h4 class="mt-5">Bình luận: <span style="font-weight: normal"><?php echo $each['comment'] ?></span></h4>
                                        <h4 class="mt-5">
                                            Số sao: <span><?php echo $each['rating']?> <span class="fa fa-star checked"></span></span>
                                        </h4>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php } else{ ?>
                            <h1 style="margin: 0;margin-top: 100px">Chưa có đánh giá  !</h1>
                        <?php } ?>
                        
                        <?php if(isset($_SESSION['id_customer'])) {?>
                              <form action="process_rating.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $id ?>">
                                <h1 style="margin: 0;margin-top: 100px">- Gửi đánh giá sản phẩm</h1>                            
                                <h3 class="mt-10">Bình luận</h3>    
                                <textarea style="width: 648px;height: 100px;font-size: inherit;" name="comment"></textarea>                                            
                                <h3 class="mt-10">Số sao</h3>
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </fieldset>
                                <br>
                                <br>
                                <button class="btn btn-primary btn-rating">Gửi đánh giá</button>
                            </form>
                        <?php }else{ ?>
                            <h1>Yêu cầu đăng nhập để đánh giá sản phẩm !</h1>
                        <?php } ?>
                   </div>                   
              </div>
           </div>
        </div>
        <?php include 'footer.php' ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
        <script>
            $(document).ready(function() {
                $(".btn-add-to-cart").click(function() {
                    const btn = $(this);
                    let id = btn.data("id");
                    $.ajax({
                        url: 'add_to_cart.php',
                        type: 'GET',
                        data: {id},
                    })
                    .done(function(response) {
                        $.notify(response + " vào giỏ hàng", "success");                                            
                    })                    
                });
            });
        </script>
    </body>
</html>
