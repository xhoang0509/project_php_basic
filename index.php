<?php 
session_start();

require 'help.php';
require 'admin/connect.php';
require 'check_admin_client.php';

if(isset($_GET['page'])) {
    $current_page = $_GET['page'];    
} else {
    $current_page = 1;
}

// process pagination
$so_san_pham_tren_1_trang = 8;

$sql_san_pham = "select count(*) from products";
$mang_san_pham = mysqli_query($connect, $sql_san_pham);
$kq_san_pham =mysqli_fetch_array($mang_san_pham);
$so_san_pham = $kq_san_pham['count(*)'];

$so_trang = ceil($so_san_pham / $so_san_pham_tren_1_trang);
$bo_qua = $so_san_pham_tren_1_trang * ($current_page - 1);

// get product
$sql = "select * from products limit $so_san_pham_tren_1_trang offset $bo_qua";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) == 0) {
    header("location:index.php");
    exit();
}

// get list best-selling product
$sql = "SELECT product_id, SUM(quantity) AS 'tong_so_sp_da_ban' FROM order_product GROUP BY product_id ORDER BY SUM(quantity) DESC";
$result_list_selling = mysqli_query($connect, $sql);
$array_list_selling = mysqli_fetch_array($result_list_selling);

$product_id_best_selling = $array_list_selling['product_id'];
$tong_so_sp_da_ban = $array_list_selling['tong_so_sp_da_ban'];

$sql = "select * from products where id = $product_id_best_selling";
$result_product_best_selling = mysqli_query($connect, $sql);
$each_product_best_selling = mysqli_fetch_array($result_product_best_selling);

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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/base.css" />
    </head>
    <body>        
        <?php include 'header.php' ?>            
        <div class="banner">            
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="./image/banner-3.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="./image/banner-2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="./image/banner-4.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        <div class="wrapper">
            <!-- <a class="all-product" href="index.php" class="mt-10">Tất cả sản phẩm</a> -->
            <h3>Tất cả sản phẩm</h3>
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
            <div class="pagination">
                <?php for($i = 1; $i <= $so_trang; $i++){ ?>
                    <a 
                        class="pagination-link <?php if($current_page == $i) {echo 'active';} ?>"
                        href="?page=<?php echo $i ?>">
                        <?php echo $i ?>                        
                    </a>
                <?php } ?>
            </div>
            <div>
                <h3>Sản phẩm bán chạy nhất</h3>
                <div class="list">
                    <div class="list-item">
                        <h3>Số lượng bán: <?php echo $tong_so_sp_da_ban ?></h3>
                        <a class="product-name" href="detail.php?id=<?php echo $each_product_best_selling['id'] ?>"><?php echo $each_product_best_selling['name'] ?></a>
                        <a class="image-link" href="detail.php?id=<?php echo $each_product_best_selling['id'] ?>">
                            <img class="list-item-image" src="image/<?php echo $each_product_best_selling['photo'] ?>" alt="" />
                        </a>
                        <span class="old-price">Giá cũ: <del><?php echo format_number_to_currency($each_product_best_selling['price'] * 1.8) ?>vnd</del></span>
                        <span class="new-price">Giá bán: <?php echo format_number_to_currency($each_product_best_selling['price']) ?> vnd</span>
                        <span class="manufacturer">Nhà sản xuất: 
                            <?php 
                            $manufacturer_id = $each_product_best_selling['manufacturer_id'];
                            $sql = "select * from manufacturers where id = '$manufacturer_id'";
                            $result = mysqli_query($connect, $sql);
                            $manufacturer = mysqli_fetch_array($result);
                            echo $manufacturer['name'];
                            ?>                                
                        </span>
                        <?php if(!empty($_SESSION['id_customer'])) {?>
                        <button 
                            class="btn-add-to-cart btn btn-primary prettyprint runnable prettyprinted" 
                            data-id="<?php echo $each_product_best_selling['id'] ?>"
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
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    <script src="./PureSnow.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>  
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
    <script>
        $(document).ready(function() {
            const projectElement = $("#project");          
            if(projectElement) {
                console.log('1')
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
            }
            

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
