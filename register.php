<?php 
session_start();
if(isset($_SESSION['id'])) {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đăng kí tài khoản</title>
        <link rel="stylesheet" href="css/register.css" />
        <link rel="stylesheet" href="css/base.css" />
    </head>
    <body>
        <div class="app">
            <div class="container">
                <h4 style="text-align: left;"><a href="index.php">Quay lại trang chủ</a></h4>
                <h1 class="mt-5">Đăng kí tài khoản mới</h1>
                <h3 style="color: red">
                    <?php 
                        if(!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <form class="form" action="process_register.php" method="POST">
                    <label class="d-block mt-5" for="name">Tên</label>
                    <input class="d-block mt-5" type="text" name="name" id="name" />
                    <label class="d-block mt-5" for="phone">Số điện thoại</label>
                    <input class="d-block mt-5" type="text" name="phone" id="phone" />
                    <label class="d-block mt-5" for="email">Email</label>
                    <input class="d-block mt-5" type="text" name="email" id="email" />
                    <label class="d-block mt-5" for="password">Mật khẩu</label>
                    <input class="d-block mt-5" type="text" name="password" id="password" />
                    <button class="btn btn-primary mt-10">Đăng kí</button>
                </form>
                <p class="mt-5">
                    Nếu đã có tài khoản. Hãy đăng nhập
                    <a href="login.php">tại đây</a>
                </p>
            </div>
        </div>
    </body>
</html>
