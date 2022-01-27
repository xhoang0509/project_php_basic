<?php
session_start();

require 'help.php';
require 'admin/connect.php';

$id = $_GET['id'];
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if(empty($number_rows)) {
  header("location:index.php");
}
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
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
        <link rel="stylesheet" href="./css/rate_star_detail.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
       <?php include 'header.php' ?>
        <div class="wrapper">
           <div class="container" style="padding: 0 5% 3%">
              <div class="d-flex">
                   <div>
                        <img class="detail-image" src="image/<?php echo $each['photo'] ?>" alt="">                   
                   </div>
                   <div class="detail-info">
                       <h3 class="detail-price">Giá bán: <?php echo format_number_to_currency($each['price']) ?> vnđ</h3>
                       <h3 class="mt-10">Mô tả chi tiết: </h3>
                       <ul class="mt-10 detail-list-info">
                           <li><?php echo $each['description'] ?></li>
                       </ul>
                       <h3 class="mt-10">Đánh giá</h3>                                                                    
                        <?php if(!empty($_SESSION['id_customer'])) { ?>
                            <button class="mt-10 btn-add-to-cart btn btn-primary " data-id="<?php echo $id ?>">Thêm vào giỏ hàng</button>
                        <?php } else { ?>
                            <a class="mt-10 btn btn-primary" href="index.php">Đăng nhập để mua hàng</a>
                        <?php } ?>
                        <form action="">
                            <h1 style="margin: 0;margin-top: 100px">Đánh giá sản phẩm</h1>
                            <h3 class="mt-10">Bình luận</h3>    
                            <textarea style="width: 648px;height: 100px;" name="comment"></textarea>                                            
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
                            <button class="btn btn-primary">Gửi đánh giá</button>
                        </form>
                   </div>                   
              </div>
           </div>
        </div>
        <?php include 'footer.php' ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        alert(response);
                    })                    
                });
            });
        </script>
    </body>
</html>
