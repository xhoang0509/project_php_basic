<?php
session_start();
require '../check_admin_login.php';
require '../connect.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = "Yêu cầu chọn sản phẩm để sửa!";
    header('location:index.php');
    exit();
}
$id = $_GET['id'];

$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if($number_rows === 0) {
    $_SESSION['error'] = "Yêu cầu chọn sản phẩm để sửa !";
    header('location:index.php');
    exit();
}

$each = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include '../head_admin.php';?>   
    <body>
        <?php include '../header_admin.php';?>   
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
                <h1>Sửa sản phẩm: </h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
            <?php 
            
                $sql="select * from manufacturers";
                $manufacturers = mysqli_query($connect,$sql);
            ?>    

                <form 
                    action="process_update_product.php" 
                    method="POST" enctype="multipart/form-data" class="form-input" >
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <label for="name">Tên sản phẩm</label><br>
                    <input class="input" type="text" id="name" name="name" value="<?php echo $each['name'] ?>" />
                    <br />
                    <label for="photo">Giữ nguyên ảnh</label>
                    <br />
                    <img width="200px" src="../../image/<?php echo $each['photo'] ?>" alt=""> 
                    <input type="hidden" name="photo" value="<?php echo $each['photo'] ?>">
                    <br>hoặc đổi tại đây
                    <input class="input" type="file" id="photo" name="photo_new"/><br />
                    <label for="price">Giá</label><br />
                    <input class="input" type="text" id="quantity" name="price" value="<?php echo $each['price'] ?>" /><br>
                    <label for="description">Mô tả sản phẩm</label>
                    <br />
                    <textarea 
                        style="width: 396px;height: 168px;" 
                        name="description" 
                        id="description" cols="30" rows="10"><?php echo $each['description'] ?></textarea>
                    <br />
                    <label for="quantity">Số lượng</label>
                    <br />
                    <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $each['quantity'] ?>" /><br />
                    
                    <label for="product_id">Chọn nhà sản xuất</label>
                    <br />
                    <select class="input" id="manufacturer_id" name ="manufacturer_id" >
                    <?php foreach ($manufacturers as $manufacturer): ?>
                        <option value="<?php echo $manufacturer['id']?>">
                            <?php echo $manufacturer ['name'] ?>
                        </option>
                    <?php endforeach ?>
                    </select> <br>
                    <label for="type">Loại sản phẩn</label><br />
                    <input class="input" type="text" id="type" name="type" value="<?php echo $each['type'] ?>" /><br/>
                    <br />
                    <button class="btn">Sửa</button>
                </form>
              
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>