<?php 
require 'admin/connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);

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
        <title>ABC Shop</title>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>
        <div class="wrapper">
            <?php include 'header.php' ?>
            <div class="banner">
                <a href=""><img src="./image/banner.png" alt="" /></a>
            </div>
            <h1>Tất cả sản phẩm</h1>
            <section>
                <div class="list">
                    <?php foreach ($result as $each): ?>
                        <div class="list-item">
                            <a class="product-name" href="detail.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
                            <a class="image-link" href="detail.php?id=<?php echo $each['id'] ?>">
                                <img class="list-item-image" src="image/<?php echo $each['photo'] ?>" alt="" />
                            </a>
                            <span class="price">Giá bán: <?php echo $each['price'] ?>vnd</span> <br>
                            <span class="manufacturer">Nhà sản xuất: 
                                <?php 
                                $manufacturer_id = $each['manufacturer_id'];
                                $sql = "select * from manufacturers where id = '$manufacturer_id'";
                                $result = mysqli_query($connect, $sql);
                                $manufacturer = mysqli_fetch_array($result);
                                echo $manufacturer['name'];
                                ?>                                
                            </span>
                            <a class="btn-add-to-cart btn btn-primary" 
                                href="add_to_cart.php?id=<?php echo $each['id'] ?>">
                                Thêm vào giỏ hàng
                            </a>                   
                        </div>  
                    <?php endforeach ?>               
            </section>           
        </div>
        <?php include 'footer.php' ?>
    </body>
    <script src="js/index.js"></script>
</html>
