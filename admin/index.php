<?php 
session_start();
if(isset($_COOKIE['remmember'])) {
    $token =  $_COOKIE['remmember'];
    require 'connect.php';
    $sql = "select * from admin where token = '$token' limit 1";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    if($number_rows == 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];      
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đăng nhập tài khoản</title>
        <link rel="stylesheet" href="../css/register.css" />
        <link rel="stylesheet" href="../css/base.css" />
    </head>
    <body>
        <div class="app">
            <div class="container">
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
                    <div class="d-flex align-content-center mt-5">
                        <input style="text-align: left; width: 20px" type="checkbox" name="remmember_login" id="remmember_login">
                        <label for="remmember_login">Ghi nhớ đăng nhập</label>
                        <br>                  
                    </div>
                    <button class="btn btn-primary mt-10">Đăng nhập</button>
                </form>
            </div>
        </div>
    </body>
</html>
