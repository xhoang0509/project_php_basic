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
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../admin_style.css" />
    </head>
    <body>
        <header id="header">
            <a href="index.php" class="header-logo">
                <img src="../image/logo.png" alt="" class="logo" />
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container" class="container-admin">
        <ul class="container-links">
                <li class="link-item">
                    <a href="../index.php" class="link">Dashboard</a>
                </li>
                <li class="link-item">
                    <a href="./manufacturers.php" class="link"
                        >Quản lý nhà sản xuất</a
                    >
                </li>
                <li class="link-item">
                    <a href="product/products.php" class="link">Quản lý sản phẩm</a>
                </li>
                <li class="link-item">
                    <a href="staffs.php" class="link">Quản lý nhân viên</a>
                </li>
                <li class="link-item">
                    <a href="orders.php" class="link">Quản lý đơn hàng</a>
                </li>
                <li class="link-item">
                    <a href="" class="link">Đăng xuất</a>
                </li>
            </ul>
            <div class="show">
                <h1>Tất cả nhà sản xuất</h1>
                <a class="add-manufacturer" href="add_manufacturer.php"
                    >Thêm nhà sản xuất mới</a
                >
                <div class="row">
                    <div class="show-item">
                        <h3>1</h3>
                        <img
                            class="show-image"
                            src="../image/apple.png"
                            alt=""
                        />
                        <h3 class="show-heading">Apple</h3>
                        <p class="address">Địa chỉ: mỹ new</p>
                        <p class="phone">
                            Số điện thoại: <a href="tel:++86xxxx">86xxxx</a>
                        </p>
                        <a href="">Sửa</a>
                        <a href="">Xóa</a>
                    </div>
                    <div class="show-item">
                        <h3>2</h3>
                        <img
                            class="show-image"
                            src="../image/sam sung.png"
                            alt=""
                        />
                        <h3 class="show-heading">Sam sung</h3>
                        <p class="address">Địa chỉ: mỹ new</p>
                        <p class="phone">
                            Số điện thoại: <a href="tel:++86xxxx">86xxxx</a>
                        </p>
                        <a href="">Sửa</a>
                        <a href="">Xóa</a>
                    </div>
                    <div class="show-item">
                        <h3>3</h3>
                        <img
                            class="show-image"
                            src="../image/apple.png"
                            alt=""
                        />
                        <h3 class="show-heading">Apple</h3>
                        <p class="address">Địa chỉ: mỹ new</p>
                        <p class="phone">
                            Số điện thoại: <a href="tel:++86xxxx">86xxxx</a>
                        </p>
                        <a href="">Sửa</a>
                        <a href="">Xóa</a>
                    </div>
                    <div class="show-item">
                        <h3>4</h3>
                        <img
                            class="show-image"
                            src="../image/xiaomi.png"
                            alt=""
                        />
                        <h3 class="show-heading">Xiao Mi</h3>
                        <p class="address">Địa chỉ: mỹ new</p>
                        <p class="phone">
                            Số điện thoại: <a href="tel:++86xxxx">86xxxx</a>
                        </p>
                        <a href="">Sửa</a>
                        <a href="">Xóa</a>
                    </div>
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
