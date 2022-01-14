<?php
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    <table class="w3-table w3-striped">                     
                        <tr>
                          <th>Tên sản phẩm</th>
                          <th>Ảnh</th>
                          <th>Giá</th>
                          <th>Số lượng</th>
                          <th>Sửa</th>
                          <th>Xóa</th>
                        </tr>
                        <?php foreach ($result as $each): ?>
                            <tr>
                              <td><?php echo $each['name'] ?></td>
                              <td><img height="100px" src="../../image/<?php echo $each['photo'] ?>" alt=""></td>
                              <td><?php echo $each['price'] ?></td>
                              <th><?php echo $each['quantity'] ?></th>
                              <th><a class="btn btn-warning" href="update_product.php?id=<?php echo $each['id'] ?>">Sửa</a></th>
                              <th><a class="btn btn-danger" href="delete_product.php?id=<?php echo $each['id'] ?>">Xóa</a></th>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
