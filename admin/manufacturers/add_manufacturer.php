<?php
require '../check_super_admin_login.php';
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
                <h1>Thêm nhà sản xuất mới</h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form action="process_add_manufacturer.php" method="POST" enctype="multipart/form-data" class="form-input" >
                    <label for="">Tên nhà sản xuất</label>
                    <br />
                    <input class="input" type="text" name="name" />
                    <br />
                    <label for="">Địa chỉ</label>
                    <br />
                    <input class="input" type="text" name="address" />
                    <br />
                    <label for="">Điện thoại liên hệ</label>
                    <br />
                    <input class="input" type="text" name="phone"/>
                    <br />
                    <label for="">Ảnh</label>
                    <br />
                    <input class="input" type="file" name="photo"/>
                    <br />
                    <button class="btn">Thêm</button>
                </form>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
