<?php
require '../check_admin_login.php';

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
        <title>Thêm nhà sản phẩm mới</title>
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
        <link rel="stylesheet" href="../../css/admin.css" />
    </head>
    <body>
        <header id="header">
            <a href="index.html" class="header-logo">
                <img src="../image/logo.png" alt="" class="logo" />
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
        <?php 
            
            $sql="select * from manufacturers";
            $manufacturer = mysqli_query($connect,$sql);
        ?> 
            <div class="show">
                <h1>Thêm nhà sản phẩm mới</h1>
                <h3 style="color: red;">
                    <?php 
                        if(!empty($_SESSION['error'])) { 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        } 
                    ?>
                </h3>
                <a class="add-manufacturer" href="index.php">Quay lại</a>
                <form action="process_add_product.php" method="POST" enctype="multipart/form-data" class="form-input">
                    <label for="name">Tên sản phẩm</label>
                    <br />
                    <input id="name" class="input" type="text" name="name"/>
                    <br />
                    <label for="photo">Ảnh</label>
                    <input class="input" id="photo" type="file" name="photo" />
                    <br />
                    <label for="price">Giá (vnd)</label>
                    <br>
                    <input class="input" type="text" id="price" name="price" />
                    <br />
                    <label for="quantity">Số lượng</label>
                    <br>
                    <input class="input" type="text" id="quantity" name="quantity" />
                    <br />
                    <label for="description">Mô tả sản phẩm</label>
                    <br>
                    <textarea 
                        name="description"
                        id="description" cols="30" rows="10" style="margin: 0px; width: 400px; height: 150px;">                            
                    </textarea>
                    <br>
                    <br>
                    <label for="product_id">Nhà sản xuất</label>
                    <br>
                    <select class="input" name="manufacturer_id" id="product_id">
                        <?php foreach ($manufacturer as $each): ?>
                            <option value="<?php echo $each['id'] ?>"><?php echo $each['name'] ?></option>                        
                        <?php endforeach ?>
                    </select>
                    <br>
                    <label for="type">Loại</label>
                    <br>
                    <input class="input" type="text" id="type" name="type" />
                    <br />
                    <br />
                    <button class="btn">Thêm</button>
                </form>
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
