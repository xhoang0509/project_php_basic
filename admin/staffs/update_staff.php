<?php
session_start();
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
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Thêm nhà sản xuất mới</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap"
            rel="stylesheet"
        />
        <!-- Fontawesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- Css -->
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/admin.css" />
    </head>
    <body>
        <header id="header">
            <a href="index.html" class="header-logo">
                <img src="../image/logo.png" alt="" class="logo" />
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container" class="container-admin">
            <ul class="container-links">
                <li class="link-item">
                    <a href="../" class="link">Dashboard</a>
                </li>
                <li class="link-item">
                    <a href="#" class="link active">Quản lý nhà sản xuất</a>
                </li>
                <li class="link-item">
                    <a href="../products/" class="link">Quản lý sản phẩm</a>
                </li>
                <li class="link-item">
                    <a href="../staffs/" class="link">Quản lý nhân viên</a>
                </li>
                <li class="link-item">
                    <a href="../orders/" class="link">Quản lý đơn hàng</a>
                </li>
                <li class="link-item">
                    <a href="" class="link">Đăng xuất</a>
                </li>
            </ul>
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
        <footer id="footer">
            <div>
                <a href=""
                    ><i class="footer-icon fab fa-facebook-square"></i
                ></a>
                <a href=""
                    ><i class="footer-icon fab fa-instagram-square"></i
                ></a>
                <a href=""><i class="footer-icon fab fa-youtube-square"></i></a>
            </div>
            <p>Bản quyền thuộc về ABC Company</p>
        </footer>
    </body>
</html>
