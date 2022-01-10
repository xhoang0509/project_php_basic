<?php
require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php 
require '../header_admin.php';
?>   
        <div id="container" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show">
                <h1>Thêm nhân viên mới</h1>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form method="post"
                    action="process_add_staff.php"
                    enctype="multipart/form-data"
                    class="form-input"
                >
                    <label for="">Tên nhân viên</label>
                    <br />

                    <input class="input" type="text" name="name"/>
                    <br />
                    <label for="">Ảnh</label>
                    <input class="input" type="file" name="photo"/>
                    <br />
                    <label for="">Địa chỉ</label>
                    <br />
                    <input class="input" type="text" name="address"/>
                    <br />
                    <label for="">Giới tính: </label>
                    <input type="radio" name="gender" id="male" value="1"/>
                    <label for="male">nam</label>
                    <input type="radio" name="gender" id="female" value="2"/>
                    <label for="female">nữ</label>
                    <input type="radio" name="gender" id="orther" value="3"/>
                    <label for="orther">khác</label>
                    <br />
                    <br />
                    <label for="">Email</label>
                    <br />
                    <input class="input" type="text" name="email"/>
                    <br />
                    <label for="">Mật khẩu</label>
                    <br />
                    <input class="input" type="password" name="password"/>
                    <br />
                    <label for="">Chức vụ: </label>
                    <input type="radio" name="level" id="admin" value="0"/>
                    <label for="male">Nhân Viên</label>
                    <input type="radio" name="level" id="sadmin" value="1"/>
                    <label for="female">Quản lý</label>
                    <br/>
                    <button class="btn">Thêm</button>
                </form>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
