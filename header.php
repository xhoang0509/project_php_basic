<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="header">
    <div class="logo">
        <a class="logo-link" href="index.php">
            ABC Shop
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