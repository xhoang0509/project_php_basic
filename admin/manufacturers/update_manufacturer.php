<?php
require '../check_super_admin_login.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để sửa !";
    header('location:index.php');
    exit();
}
$id = $_GET['id'];

require '../connect.php';
$sql = "select * from manufacturers where id = '$id'";
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
                <h1>Sửa nhà sản xuất: </h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form 
                    action="process_update_manufacturer.php?id=<?php echo $id ?>" 
                    method="POST" enctype="multipart/form-data" class="form-input" >
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <label for="">Tên nhà sản xuất</label>
                    <br />
                    <input class="input" type="text" name="name" value="<?php echo $each['name'] ?>" />
                    <br />
                    <label for="">Địa chỉ</label>
                    <br />
                    <input class="input" type="text" name="address" value="<?php echo $each['address'] ?>" />
                    <br />
                    <label for="">Điện thoại liên hệ</label>
                    <br />
                    <input class="input" type="text" name="phone" value="<?php echo $each['phone'] ?>" />
                    <br />
                    <label for="">Giữ nguyên ảnh</label>
                    <br />
                    <img width="200px" src="../../image/<?php echo $each['photo'] ?>" alt=""> 
                    <br>hoặc đổi tại đây
                    <input class="input" type="file" name="photo" value="<?php echo $each['photo'] ?>" />
                    <br />
                    <button class="btn">Sửa</button>
                </form>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
