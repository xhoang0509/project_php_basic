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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="app">
            <div class="container">
                <div class="brand-name">ABC SHOP <br> HI-END COMPUTER</div>                
                <h1 class="mt-5">Đăng kí tài khoản mới</h1>
                <h3 style="color: red">
                    <?php 
                        if(!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <form id="form-register" class="form" action="process_register.php" method="POST">
                    <label class="d-block mt-5" for="name">Tên</label>
                    <input class="d-block mt-5" type="text" name="name" id="name" />
                    <label class="d-block mt-5" for="phone">Số điện thoại</label>
                    <input class="d-block mt-5" type="text" name="phone" id="phone" />
                    <label class="d-block mt-5" for="email">Email</label>
                    <input class="d-block mt-5" type="text" name="email" id="email" />
                    <label class="d-block mt-5" for="password">Mật khẩu</label>
                    <input class="d-block mt-5" type="password" name="password" id="password" />
                    <label class="d-block mt-5" for="password">Nhập lại mật khẩu</label>
                    <input class="d-block mt-5" type="password" name="password" id="password-again" />
                    <h4 class="color-red" id="log-error"></h3>
                    <button class="btn btn-primary mt-10">Đăng kí</button>
                    <a style="text-decoration: none" href="index.php" class="btn btn-secondary mt-10">
                        <i class="fa-solid fa-arrow-left"></i>
                        Quay lại trang chủ
                    </a>
                </form>
                <p class="mt-5">
                    Nếu đã có tài khoản. Hãy đăng nhập
                    <a href="login.php">tại đây</a>
                </p>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#form-register").submit(function(e) {
                const password = $.trim($("#password").val());
                const password_again = $.trim($("#password-again").val());
                if(!password || !password_again) {
                    alert("Yêu cầu nhập mật khẩu !");
                    e.preventDefault();
                    return;
                }
                if(password != password_again) {                    
                    $("#log-error").text("Mật khẩu không khớp !")
                    e.preventDefault();
                    return;
                }
            });
        });
    </script>
</html>
