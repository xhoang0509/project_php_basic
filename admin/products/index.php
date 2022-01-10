<?php
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php 
require '../header_admin.php';
?>   
        <div id="container" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show">
                <h1>Tất cả sản phẩm</h1>
                <h2 class="text-success">
                    <?php if(!empty($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
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
                <h2 class="text-success">
                    <?php if(!empty($_SESSION['product_name'])) {
                        echo $_SESSION['product_name'];
                        unset($_SESSION['product_name']);
                    }
                    ?>    
                </h2>
                <a class="add-manufacturer" href="add_product.php"
                    >Thêm nhà sản phẩm mới</a
                >
                <div class="products">
                    <?php foreach ($result as $each): ?>
                        <div class="product">
                            <h3 class="product-title"><?php echo $each['name'] ?></h3>
                            <img src="../../image/<?php echo $each['photo'] ?>" alt="" class="product-image" />
                            <p class="mt-5">Giá: <?php echo $each['price'] ?> vnd</p>
                            <p class="mt-5">Số lượng: <?php echo $each['quantity'] ?></p>
                            </br>
                            <p>
                                <a class="btn btn-warning" href="update_product.php?id=<?php echo $each['id'] ?>">Sửa</a>
                                <a class="btn btn-danger" href="delete_product.php?id=<?php echo $each['id'] ?>">Xóa</a>
                            </p>
                        </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
