<?php
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from admin";
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
                <h1>Tất cả nhân viên</h1>
                <h2 class="text-success">
                    <?php if(!empty($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                    ?>    
                </h2>

                <h2 class="text-success">
                    <?php if(!empty($_SESSION['staff_name'])) {
                        echo $_SESSION['staff_name'];
                        unset($_SESSION['staff_name']);
                    }
                    ?>    
                </h2>
                <a class="add-staff" href="./add_staff.php"
                    >Thêm nhân viên mới</a>
                <div class="staffs">
                    <?php foreach ($result as $each): ?>
                        <div class="staff">
                            <h3 class="staff-title"><?php echo $each['name'] ?></h3>
                            <img src="../../image/<?php echo $each['photo'] ?>" alt="" class="staff-image" />
                            <p class="mt-5">Địa chỉ: <?php echo $each['address'] ?></p>
                            <p class="mt-5">email: <?php echo $each['email'] ?></p>
                            <p>
                                <a class="text-warning" href="delete_staff.php?id=<?php echo $each['id'] ?>">Xóa</a>
                            </p>
                    </br>
                            <p>
                                <a class="text-danger" href="update_staff.php?id=<?php echo $each['id'] ?>">Sửa</a>
                            </p>
                        </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
