<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="header">
    <div class="logo">
        <a href="index.php">
            <img
                class="logo-header"
                src="./image/logo.jpg"
                alt=""
            />
        </a>
    </div>
    <div class="menu">
        <ul class="menu-slide">
            <li class="slide-item"><a class="slide-item-link" href="index.php">Trang Chủ</a></li>
            <li class="slide-item"><a class="slide-item-link" href="#">Laptop</a></li>
            <li class="slide-item"><a class="slide-item-link" href="#">PC Gaming</a></li>
            <li class="slide-item"><a class="slide-item-link" href="#">Phụ Kiện Laptop, PC</a></li>
        </ul>
    </div>
    <div class="icon">
        <!-- <a href=""
            ><img src="./image/notifications_none.png" alt=""
        /></a>
        <a href=""
            ><img src="./image/person.png" alt="Đăng nhập"
        /></a>
        <a href=""
            ><img src="./image/add_shopping_cart.png" alt=""
        /></a> -->
        <?php if(isset($_SESSION['id'])) {?>
            <a style="color: #548CFF" class="icon-link" href="profile.php">Chào, <?php echo $_SESSION['name'] ?></a>
            <a class="icon-link" href="cart.php">Quản lý giỏ hàng</a>
            <a class="icon-link" href="logout.php">Đăng xuất</a>    
        <?php } else { ?>
            <a class="icon-link" href="login.php">Đăng nhập</a>
            <a class="icon-link" href="register.php">Đăng kí</a>
        <?php } ?>
    </div>
</header>