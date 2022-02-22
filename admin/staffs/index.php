<?php
session_start();
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from admin";
$result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">
  <title>Tổng quan nhân viên</title>
    <link rel="icon" type="image/x-icon" href="../../favicon/favicon.ico">
  <?php include '../head_admin.php';?>   
    <body>
        <?php include '../header_admin.php';?> 
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
                <h1>Tất cả nhân viên</h1>
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
                            <th>Chức vụ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                          </tr>
                        </thead>
                        <?php foreach ($result as $index => $each): ?>
                            <tr>
                              <td><?php echo $index + 1 ?></td>
                              <td><?php echo $each['name'] ?></td>
                              <td><img height="200px" src="../../image/<?php echo $each['photo'] ?>" alt=""/></td>
                              <td><?php echo $each['address'] ?></td>
                              <td><?php 
                              switch ($each['level']) {
                                  case '0':
                                      echo 'Nhân Viên';
                                      break;                                  
                                  case '1':
                                      echo 'Quản Lý';
                                      break;
                              }
                               ?></td>
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
