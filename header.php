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
            <li class="slide-item input-search">                
                    <input id="project" placeholder="Tìm kiếm sản phẩm">
                    <input type="hidden" id="project-id">
                    <p id="project-description"></p>
                </li>            
        </ul>
    </div>
    <div class="icon">      
        <?php if(isset($_SESSION['id_customer'])) {?>            
            <a style="color: #548CFF" class="header-icon-link" href="profile.php">
                <i class="fa-solid fa-user"></i>
                <span class="ml-5">Chào, <?php echo $_SESSION['name_customer'] ?></span>
                    
            </a>
            <a class="header-icon-link" href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="ml-5">Giỏ hàng</span>                               
            </a>
            <a class="header-icon-link" href="purchase.php">
                <i class="fa-solid fa-file-invoice"></i>
                <span class="ml-5">Đơn mua</span>                
            </a>
            <a class="header-icon-link" href="logout.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                <span class="ml-5">Đăng xuất</span>
            </a>    
        <?php } else { ?>
            <a class="header-icon-link" href="login.php">Đăng nhập</a>
            <a class="header-icon-link" href="register.php">Đăng kí</a>
        <?php } ?>
    </div>
</header>
