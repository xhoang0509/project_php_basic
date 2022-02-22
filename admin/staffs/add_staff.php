<?php
session_start();
require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
    <title>Thêm nhân viên mới</title>
    <link rel="icon" type="image/x-icon" href="../../favicon/favicon.ico">
    <?php include '../head_admin.php';?>   
    <body>
        <?php include '../header_admin.php';?> 
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
                <h1>Thêm nhân viên mới</h1>
                <?php if(isset($_SESSION['add_staff_error'])) { ?>
                    <h3 class="color-red">
                        <?php 
                            echo $_SESSION['add_staff_error']; 
                            unset($_SESSION['add_staff_error']);
                        ?>
                    </h3>
                <?php } ?>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form method="POST" action="process_add_staff.php" enctype="multipart/form-data" class="form-input">
                    <label for="name">Tên nhân viên</label>
                    <br />
                    <input class="input" type="text" id="name" name="name"/>
                    <br />
                    <label for="photo">Ảnh</label>
                    <input class="input" type="file" id="photo" name="photo"/>
                    <br />
                    <label for="address">Địa chỉ</label>
                    <br />
                    <input class="input" type="text" id="address" name="address"/>
                    <br />
                    <label >Giới tính: </label>
                    <input type="radio" name="gender" id="male" value="1"/>
                    <label for="male">Nam</label>
                    <input type="radio" name="gender" id="female" value="2"/>
                    <label for="female">Nữ</label>
                    <input type="radio" name="gender" id="other" value="3"/>
                    <label for="other">Khác</label>
                    <br />
                    <br />
                    <label for="email">Email</label>
                    <br />
                    <input id="email" class="input" type="text" name="email"/>
                    <br />
                    <label for="">Mật khẩu</label>
                    <br />
                    <input class="input" type="password" name="password"/>
                    <br />
                    <label >Chức vụ: </label>
                    <input type="radio" name="level" id="admin" value="0"/>
                    <label for="admin">Nhân Viên</label>
                    <input type="radio" name="level" id="super_admin" value="1"/>
                    <label for="super_admin">Quản Lý</label>
                    <br/>
                    <button class="btn">Thêm</button>
                </form>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
