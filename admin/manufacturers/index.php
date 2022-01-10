<?php
require '../check_super_admin_login.php';

require "../connect.php";
$sql = "select * from manufacturers";
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
                <h1>Tất cả nhà sản xuất</h1>
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
                    <?php if(!empty($_SESSION['manufacturer_name'])) {
                        echo $_SESSION['manufacturer_name'];
                        unset($_SESSION['manufacturer_name']);
                    }
                    ?>    
                </h2>
                <a class="add-manufacturer" href="add_manufacturer.php"
                    >Thêm nhà sản xuất mới</a
                >
                <div class="row">
                    <div class="show-item">
                            <h3>STT</h3>
                            <h3>Ảnh</h3>
                            <h3 class="show-heading">Tên</h3>
                            <p class="address">Địa chỉ</p>
                            <p class="phone">
                                Số điện thoại:
                            </p>
                            <p>Hành động</p>
                        </div>
                    <?php foreach ($result as $index => $each): ?>
                        <div class="show-item">
                            <h3><?php echo $index + 1 ?></h3>
                            <img
                                class="show-image"
                                src="../../image/<?php echo $each['photo'] ?>"
                                alt=""
                            />
                            <h3 class="show-heading"><?php echo $each['name'] ?></h3>
                            <p class="address"><?php echo $each['address'] ?></p>
                            <p class="phone">
                                <a href="tel:++86xxxx"><?php echo $each['phone'] ?></a>
                            </p>
                            <a class="text-warning" href="update_manufacturer.php?id=<?php echo $each['id'] ?>">Sửa</a>
                            <a class="text-danger" href="delete_manufacturer.php?id=<?php echo $each['id'] ?>">Xóa</a>
                        </div>
                    <?php endforeach ?>
                    
                   
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
