<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Quản lý nhân viên</title>
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
            <a href="index.html" class="header-logo">
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container" class="container-admin">
            <ul class="container-links">
                <li class="link-item">
                    <a href="../" class="link">Dashboard</a>
                </li>
                <li class="link-item">
                    <a href="../manufacturers" class="link">Quản lý nhà sản xuất</a>
                </li>
                <li class="link-item">
                    <a href="../products/" class="link">Quản lý sản phẩm</a>
                </li>
                <li class="link-item">
                    <a href="../staffs/" class="link active">Quản lý nhân viên</a>
                </li>
                <li class="link-item">
                    <a href="../orders/" class="link">Quản lý đơn hàng</a>
                </li>
                <li class="link-item">
                    <a href="" class="link">Đăng xuất</a>
                </li>
            </ul>
            <div class="show">
                <h1>Tất cả nhân viên</h1>
                <a class="add-manufacturer" href="./add_staff.php"
                    >Thêm nhân viên mới</a
                >
                <div class="products">
                    <div class="product">
                        <h3 class="product-title">Nguyễn Văn A</h3>
                        <img
                            src="../../image/profile-1.jpg"
                            alt=""
                            class="product-image"
                        />
                        <p class="mt-5">SĐT: 0912.345.678</p>
                        <p class="mt-5">Địa chỉ: New York State</p>
                    </div>
                    <div class="product">
                        <h3 class="product-title">Nguyễn Văn B</h3>
                        <img
                            src="../../image/profile-2.jpg"
                            alt=""
                            class="product-image"
                        />
                        <p class="mt-5">SĐT: 0912.345.678</p>
                        <p class="mt-5">Địa chỉ: New York State</p>
                    </div>
                    <div class="product">
                        <h3 class="product-title">Nguyễn Văn C</h3>
                        <img
                            src="../../image/profile-3.jpg"
                            alt=""
                            class="product-image"
                        />
                        <p class="mt-5">SĐT: 0912.345.678</p>
                        <p class="mt-5">Địa chỉ: New York State</p>
                    </div>
                    <div class="product">
                        <h3 class="product-title">Nguyễn Văn D</h3>
                        <img
                            src="../../image/profile-4.jpg"
                            alt=""
                            class="product-image"
                        />
                        <p class="mt-5">SĐT: 0912.345.678</p>
                        <p class="mt-5">Địa chỉ: New York State</p>
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
