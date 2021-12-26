<?php 
session_start();
require "../connect.php";
$sql = "select * from manufacturers";
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
                <h1>Tất cả nhà sản xuất</h1>
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
                <a class="add-manufacturer" href="add_manufacturer.php"
                    >Thêm nhà sản xuất mới</a
                >
                <div class="row">
                    <div class="show-item">
                            <h3>STT</h3>
                            <h3>Ảnh</h3>
                            <h3 class="show-heading">Tên</h3>
                            <p class="address">Địa chỉ</p>
                            <p class="phone">
                                Số điện thoại:
                            </p>
                            <p>Hành động</p>
                        </div>
                    <?php foreach ($result as $index => $each): ?>
                        <div class="show-item">
                            <h3><?php echo $index + 1 ?></h3>
                            <img
                                class="show-image"
                                src="../../image/<?php echo $each['photo'] ?>"
                                alt=""
                            />
                            <h3 class="show-heading"><?php echo $each['name'] ?></h3>
                            <p class="address"><?php echo $each['address'] ?></p>
                            <p class="phone">
                                <a href="tel:++86xxxx"><?php echo $each['phone'] ?></a>
                            </p>
                            <a class="text-warning" href="update_manufacturer.php?id=<?php echo $each['id'] ?>">Sửa</a>
                            <a class="text-danger" href="delete_manufacturer.php?id=<?php echo $each['id'] ?>">Xóa</a>
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
