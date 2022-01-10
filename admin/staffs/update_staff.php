<?php
require '../check_admin_login.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = "Yêu cầu chọn nhà sản xuất để sửa !";
    header('location:index.php');
    exit();
}
$id = $_GET['id'];

require '../connect.php';
$sql = "select * from admin where id = '$id'";
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
                <h1>Cập nhật nhân viên: </h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-staff" href="index.php">Quay lại</a>
                <form method="post"
                    action="process_update_staff.php"
                    enctype="multipart/form-data"
                    class="form-input"
                >
                    <label for="">Tên nhân viên</label>
                    <br />

                    <input class="input" type="text" name="name" value="<?php echo $each['name'] ?>"/>
                    <br />
                    <label for="">Ảnh</label>
                    <input class="input" type="file" name="photo" value="<?php echo $each['photo'] ?>"/>
                    <br />
                    <label for="">Địa chỉ</label>
                    <br />
                    <input class="input" type="text" name="address" value="<?php echo $each['address'] ?>"/>
                    <br />
                    <label for="">Giới tính: </label>
                    <input type="radio" name="gender" id="male" value="1" />
                    <label for="male">nam</label>
                    <input type="radio" name="gender" id="female" value="2"/>
                    <label for="female">nữ</label>
                    <input type="radio" name="gender" id="orther" value="3"/>
                    <label for="orther">khác</label>
                    <br />
                    <br />
                    <label for="">Email</label>
                    <br />
                    <input class="input" type="text" name="email" value="<?php echo $each['email'] ?>"/>
                    <br />
                    <label for="">Mật khẩu</label>
                    <br />
                    <input class="input" type="password" name="password" value="<?php echo $each['password'] ?>"/>
                    <br />
                    <button class="btn">Thêm</button>
                </form>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
