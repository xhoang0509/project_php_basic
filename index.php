<?php 
session_start();

require 'help.php';
require 'admin/connect.php';
require 'check_admin_client.php';

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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>        
        <?php include 'header.php' ?>            
        <div class="banner">
            <a href="#"><img src="./image/banner.png" alt="" /></a>
        </div>
        <div class="wrapper">
            <h1 class="mt-10">Tất cả sản phẩm</h1>
            <section>
                <div class="list">
                    <?php foreach ($result as $each): ?>
                        <div class="list-item">
                            <a class="product-name" href="detail.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
                            <a class="image-link" href="detail.php?id=<?php echo $each['id'] ?>">
                                <img class="list-item-image" src="image/<?php echo $each['photo'] ?>" alt="" />
                            </a>
                            <span class="old-price">Giá cũ: <del><?php echo format_number_to_currency($each['price'] * 1.8) ?>vnd</del></span>
                            <span class="new-price">Giá bán: <?php echo format_number_to_currency($each['price']) ?> vnd</span>
                            <span class="manufacturer">Nhà sản xuất: 
                                <?php 
                                $manufacturer_id = $each['manufacturer_id'];
                                $sql = "select * from manufacturers where id = '$manufacturer_id'";
                                $result = mysqli_query($connect, $sql);
                                $manufacturer = mysqli_fetch_array($result);
                                echo $manufacturer['name'];
                                ?>                                
                            </span>
                            <?php if(!empty($_SESSION['id_customer'])) {?>
                            <button 
                                class="btn-add-to-cart btn btn-primary prettyprint runnable prettyprinted" 
                                data-id="<?php echo $each['id'] ?>"
                            >
                                Thêm vào giỏ hàng
                            </button>
                            <?php } else { ?>
                                <a class="btn-add-to-cart btn btn-primary" 
                                href="login.php">
                                Đăng nhập để mua hàng
                                </a>
                            <?php } ?>
                            <span class="view-detail">Xem chi tiết</span>                
                        </div>  
                    <?php endforeach ?>               
            </section>           
        </div>
        <?php include 'footer.php' ?>
    <script src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
    <script>
        $(document).ready(function() {
            $( "#project" ).autocomplete({
                minLength: 0,
                source: 'search.php',
                focus: function( event, ui ) {
                $( "#project" ).val( ui.item.label );
                    return false;
                },
                select: function( event, ui ) {
                    $( "#project" ).val( ui.item.label);
                    $( "#project-icon" ).attr( "src", "image/" + ui.item.photo );
                        return false;
                    }
                })            
                .autocomplete( "instance" )._renderItem = function( ul, item ) {                    
                    return $(`<a href='detail.php?id=${item.value}'>`)
                    .append(`
                        <div>                            
                            <img height="50" src="image/${item.photo}" alt="">
                            ${item.label}
                        </div>
                    `)
                    .appendTo( ul );
                    
                };
            

            $(".btn-add-to-cart").click(function() {
                let id = $(this).data('id');
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
