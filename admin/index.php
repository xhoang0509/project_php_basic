<?php
require 'check_admin_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <form action="process_login.php" method="post">
        <h1>Đăng nhập</h1>
        <input type="email" name="email">
        <br>
        Mật khẩu
        <br>
        <input type="password" name="password">
        <br>
        <button>Đăng Nhập</button>
    </form>
</body>
</html>