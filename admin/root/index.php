<?php
require '../check_admin_login.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Trang chủ admin</title>
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
        <link rel="stylesheet" href="../../css/base.css" />
        <link rel="stylesheet" href="../../css/admin.css" />
    </head>
    <body>
        <header id="header">
            <a href="index.php" class="header-logo">
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container" class="container-admin">
            <?php include '../menu.php'?>
            <div class="show">
                <h1>Tổng quan</h1>
                <div class="dashboard-list">
                    <h3 class="dashboard-item">
                        <a href="../manufacturer/">Tổng nhà sản xuất: 10</a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../products/">Tổng nhà sản phẩm: 10</a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../staffs/">Tổng nhân viên: 10</a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../others/">Tổng đơn hàng: 10</a>
                    </h3>
                </div>
                <h1 class="mt-10">Sản phẩm bán chạy nhất tháng 11</h1>
                <hr />
                <div class="best-seller">
                    <a class="best-seller-title" href="">
                        <h3>Iphone 13 promax</h3>
                        <img
                            class="best-seller-img"
                            src="../image/iphone-13-promax.png"
                            alt=""
                        />
                    </a>

                    <p>Số lượng 100 chiếc</p>
                </div>
                <h1 class="mt-10">Nhân viên suất sắc nhất tháng 11</h1>
                <hr />
                <div class="best-seller">
                    <a class="best-seller-title" href="">
                        <h3>Nguyễn Văn A</h3>
                        <img
                            class="best-seller-img"
                            src="../image/profile-1.jpg"
                            alt=""
                        />
                    </a>

                    <p>Số lượng đã bán 100 chiếc</p>
                </div>
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