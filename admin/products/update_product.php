<?php
require '../check_admin_login.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để sửa NHA !";
    header('location:index.php');
    exit();
}
$id = $_GET['id'];

require '../connect.php';
$sql = "select * from products where id = '$id'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);
if($number_rows === 0) {
    $_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để sửa !";
    header('location:index.php');
    exit();
}
$each = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<?php 
require '../header_admin.php';
?>   
        <div id="container" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show">
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
                $manufacturer = mysqli_query($connect,$sql);
            ?>    

                <form 
                    action="process_update_product.php?id=<?php echo $id ?>" 
                    method="POST" enctype="multipart/form-data" class="form-input" >
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <label for="name">Tên sản phẩm</label>
                    <br />
                    <input class="input" type="text" id="name" name="name" value="<?php echo $each['name'] ?>" />
                    <br />
                    <label for="quantity">số lượng</label>
                    <br />
                    <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $each['quantity'] ?>" />
                    <br />
                    <label for="description">Mô tả sản phẩm</label>
                    <br />
                    <input class="input" type="text" id="description" name="description" value="<?php echo $each['description'] ?>" />
                    <br />
                    <label for="type">Loại sản phẩn</label>
                    <br />
                    <input class="input" type="text" id="type" name="type" value="<?php echo $each['type'] ?>" />
                    <br />
                    <label for="photo">Giữ nguyên ảnh</label>
                    <br />
                    <img width="200px" src="../../image/<?php echo $each['photo'] ?>" alt=""> 
                    <br>hoặc đổi tại đây
                    <input class="input" type="file" id="photo" name="photo"/>
                    <br />
                    <label for="product_id">Chọn nhà sản xuất</label>
                    <br />
                    <select class="input" id="product_id" name ="product_id" >
                    <?php foreach ($manufacturer as $each): ?>
                        <option value="<?php echo $each['id']?>">
                            <?php echo $each ['name'] ?>
                        </option>
                    <?php endforeach ?>
                    </select> 
                    <br />
                    <button class="btn">Sửa</button>
                </form>
              
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>