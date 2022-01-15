<?php
require '../check_admin_login.php';
require '../connect.php';

$sql = "select * from products";
$result = mysqli_query($connect,$sql);
$total_products = mysqli_num_rows($result);

$sql = "select * from manufacturers";
$result = mysqli_query($connect,$sql);
$total_manufacturers = mysqli_num_rows($result);

$sql = "select * from admin where level = 0";
$result = mysqli_query($connect,$sql);
$total_staffs = mysqli_num_rows($result);

$sql = "select * from orders";
$result = mysqli_query($connect,$sql);
$total_orders = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<?php 
require '../header_admin.php';
?>   
        <div id="container" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
                <h1>Tổng quan</h1>
                <div class="dashboard-list">
                    <h3 class="dashboard-item">
                        <a href="../manufacturers/">Tổng nhà sản xuất: <?php echo $total_manufacturers ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../products/">Tổng nhà sản phẩm: <?php echo $total_products ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../staffs/">Tổng nhân viên: <?php echo $total_staffs ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../others/">Tổng đơn hàng: <?php echo $total_orders ?></a>
                    </h3>
                </div>
                <h1 class="mt-10">Sản phẩm bán chạy nhất tháng 11</h1>
                <hr />
                <div class="best-seller">
                    <a class="best-seller-title" href="">
                        <h3>Iphone 13 promax</h3>
                        <img
                            class="best-seller-img"
                            src="../../image/iphone-13-promax.png"
                            alt=""
                        />
                    </a>

                    <p>Số lượng 100 chiếc</p>
                </div>
                <h1 class="mt-10">Nhân viên suất sắc nhất tháng 11</h1>
                <hr />
                <div class="best-seller">
                    <a class="best-seller-title" href="">
                        <h3>Nguyễn Văn A</h3>
                        <img
                            class="best-seller-img"
                            src="../../image/profile-1.jpg"
                            alt=""
                        />
                    </a>

                    <p>Số lượng đã bán 100 chiếc</p>
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>