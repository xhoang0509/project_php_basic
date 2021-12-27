<?php
session_start();
require '../connect.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
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
        <?php include '../header_admin.php' ?>
        <div id="container" class="container-admin">
            <ul class="container-links">
                <li class="link-item">
                    <a href="../" class="link">Dashboard</a>
                </li>
                <li class="link-item">
                    <a href="../manufacturers" class="link">Quản lý nhà sản xuất</a>
                </li>
                <li class="link-item">
                    <a href="#" class="link active">Quản lý sản phẩm</a>
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
                <h1>Tất cả sản phẩm</h1>
                <h2 class="text-success">
                    <?php if(!empty($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                    ?>    
                </h2>
                <h2 class="text-danger">
                    <?php if(!empty($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>    
                </h2>
                <h2 class="text-success">
                    <?php if(!empty($_SESSION['manufacturer_name'])) {
                        echo $_SESSION['manufacturer_name'];
                        unset($_SESSION['manufacturer_name']);
                    }
                    ?>    
                </h2>
                <a class="add-manufacturer" href="add_product.php"
                    >Thêm nhà sản phẩm mới</a
                >
                <div class="products">
                    <?php foreach ($result as $each): ?>
                        <div class="product">
                            <h3 class="product-title"><?php echo $each['name'] ?></h3>
                            <img src="../../image/<?php echo $each['photo'] ?>" alt="" class="product-image" />
                            <p class="mt-5">Giá: <?php echo $each['price'] ?> vnd</p>
                            <p class="mt-5">Số lượng: <?php echo $each['quantity'] ?></p>
                            <p>
                                <a class="text-warning" href="delete_product.php?id=<?php echo $each['id'] ?>">Xóa</a>
                            </p>
                    </br>
                            <p>
                                <a class="text-danger" href="update_product.php?id=<?php echo $each['id'] ?>">Sửa</a>
                            </p>
                        </div>
                    <?php endforeach ?>
                    
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
