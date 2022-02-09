<?php
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from admin";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../header_admin.php';?>   
    <body>
        <header id="header">
            <a href="../root" class="header-logo">
                <h1>ABC Shop</h1>
            </a>
        </header>  
        <div id="container-admin" class="container-admin">
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
                <a class="add-staff" href="./add_staff.php">
                    <i class="fa-solid fa-plus"></i>
                    Thêm nhân viên mới
                </a>
                <div class="row">                    
                    <table class="w3-table-all">
                        <thead>
                          <tr class="w3-light-grey">
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                          </tr>
                        </thead>
                        <?php foreach ($result as $index => $each): ?>
                            <tr>
                              <td><?php echo $index + 1 ?></td>
                              <td><?php echo $each['name'] ?></td>
                              <td><img height="100px" class="show-image" src="../../image/<?php echo $each['photo'] ?>" alt=""/></td>
                              <td><?php echo $each['address'] ?></td>
                              <td><a class="btn btn-warning" href="update_staff.php?id=<?php echo $each['id'] ?>">Sửa</a></td>
                              <td> <a class="btn btn-danger" href="delete_staff.php?id=<?php echo $each['id'] ?>">Xóa</a></td>
                          </tr>
                        <?php endforeach ?>
                    </table>                    
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
