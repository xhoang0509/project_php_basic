<?php
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
      .modal-open {
         padding-right: 0 !important;
      }
    </style>
    <?php include '../header_admin.php';?>   
    <body>
        <header id="header">
            <a href="../root" class="header-logo">
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
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
                    <table class="w3-table-all">                     
                        <thead>
                            <tr class="w3-light-grey">
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                          </tr>
                        </thead>
                        <?php foreach ($result as $each): ?>
                            <tr>
                              <td><?php echo $each['name'] ?></td>
                              <td><img height="100px" src="../../image/<?php echo $each['photo'] ?>" alt=""></td>
                              <td><?php echo $each['price'] ?></td>
                              <td><?php echo $each['quantity'] ?></td>
                              <td>
                                <a class="btn btn-warning"  href="update_product.php?id=<?php echo $each['id'] ?>">Sửa</a>
                            </td>
                              <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $each['id'] ?>">
                                  Xóa
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-<?php echo $each['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Hành động này không thể không phục, bạn có chắc chắn xóa ?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <a class="btn btn-danger" href="delete_product.php?id=<?php echo $each['id'] ?>">Xóa</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>

    </body>
</html>
