<?php
session_start();
require '../check_admin_login.php';

require '../connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include '../head_admin.php';?>   
    <body>
        <?php include '../header_admin.php';?>   
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
        <?php 
            
            $sql="select * from manufacturers";
            $manufacturer = mysqli_query($connect,$sql);
        ?> 
            <div class="show">
                <h1>Thêm nhà sản phẩm mới</h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form action="process_add_product.php" method="POST" enctype="multipart/form-data" class="form-input">
                    <label for="name">Tên sản phẩm</label>
                    <br />
                    <input id="name" class="input" type="text" name="name"/>
                    <br />
                    <label for="photo">Ảnh</label>
                    <input class="input" id="photo" type="file" name="photo" />
                    <br />
                    <label for="price">Giá (vnd)</label>
                    <br>
                    <input class="input" type="text" id="price" name="price" />
                    <br />
                    <label for="quantity">Số lượng</label>
                    <br>
                    <input class="input" type="number" id="quantity" name="quantity" />
                    <br />
                    <label for="description">Mô tả sản phẩm</label>
                    <br>
                    <textarea 
                        name="description"
                        id="description" cols="30" rows="10" style="margin: 0px; width: 400px; height: 150px;"></textarea>
                    <br>
                    <br>
                    <label for="product_id">Nhà sản xuất</label>
                    <br>
                    <select class="input" name="manufacturer_id" id="product_id">
                        <?php foreach ($manufacturer as $each): ?>
                            <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>                        
                        <?php endforeach ?>
                    </select>
                    <br>
                    <label for="type">Loại</label>
                    <br>
                    <input class="input" type="text" id="type" name="type" />
                    <br />
                    <br />
                    <button class="btn">Thêm</button>
                </form>
            </div>
        </div>
        <?php require'../footer.php'?>        
        </script>
    </body>
</html>
