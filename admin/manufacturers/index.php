<?php
session_start();
require '../check_admin_login.php';
require "../connect.php";

$sql = "select * from manufacturers";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../head_admin.php';?>   
    <body>
        <?php include '../header_admin.php';?>
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
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
                <a class="add-manufacturer" href="add_manufacturer.php">
                    <i class="fa-solid fa-plus"></i>
                    Thêm nhà sản xuất mới
                </a
                >
                <div class="row">                    
                    <table class="w3-table-all">
                        <thead>
                          <tr class="w3-light-grey">
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                          </tr>
                        </thead>
                        <?php foreach ($result as $index => $each): ?>
                            <tr>
                              <td><?php echo $index + 1 ?></td>
                              <td><?php echo $each['name'] ?></td>
                              <td><img height="100%" class="show-image" src="../../image/<?php echo $each['photo'] ?>" alt=""/></td>
                              <td><?php echo $each['address'] ?></td>
                              <td><?php echo $each['phone'] ?></td>
                              <td><a class="btn btn-warning" href="update_manufacturer.php?id=<?php echo $each['id'] ?>">Sửa</a></td>
                              <td> <a class="btn btn-danger" href="delete_manufacturer.php?id=<?php echo $each['id'] ?>">Xóa</a></td>
                          </tr>
                        <?php endforeach ?>
                    </table>                    
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
