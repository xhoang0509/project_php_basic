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
        <title>Đăng nhập tài khoản</title>
        <link rel="stylesheet" href="css/register.css" />
        <link rel="stylesheet" href="css/base.css" />
    </head>
    <body>
        <div class="app">
            <div class="container">
                <h4 style="text-align: left"><a href="index.php">Quay lại trang chủ</a></h4>
                <h1 class="mt-5">Đăng nhập tài khoản</h1>
                <h3 style="color: green">
                    <?php 
                        if(!empty($_SESSION['success'])) {
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        } 
                    ?>
                </h3>
                 <h3 style="color: red">
                    <?php 
                        if(!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <form class="form" action="process_login.php" method="POST">
                    <label class="d-block mt-5" for="">Email</label>
                    <input class="d-block mt-5" type="text" name="email" 
                        value="<?php if(isset($_SESSION['email'])) {$_SESSION['email'];} ?>"
                        />
                    <label class="d-block mt-5" for="">Mật khẩu</label>
                    <input class="d-block mt-5" type="text" name="password" 
                        value="<?php if(isset($_SESSION['password'])) {$_SESSION['password'];} ?>"
                        />
                    <button class="btn btn-primary mt-10">Đăng nhập</button>
                </form>
                <p class="mt-5">Nếu chưa có tài khoản. Hãy đăng kí <a href="register.php">tại đây</a></p>
            </div>
        </div>
    </body>
</html>
