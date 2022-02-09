<ul class="container-links">
    <li class="link-item">
    <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/root/" || $_SERVER['REQUEST_URI'] === "/abcshop/admin/root/index.php") {?>
            <a style="color: blue;" href="root" class="link">
                <i class="fa-solid fa-gauge"></i>
                Tổng quan
            </a>
        <?php } else {?>
            <a href="../root" class="link">
                  <i class="fa-solid fa-gauge"></i>
                Tổng quan
            </a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/manufacturers/") {?>
            <a style="color: blue" href="manufacturers" class="link">
                <i class="fa-solid fa-industry"></i>
                Quản lý nhà sản xuất
            </a>
        <?php } else {?>
            <a href="../manufacturers" class="link">
                <i class="fa-solid fa-industry"></i>
                Quản lý nhà sản xuất
            </a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/products/") {?>
            <a style="color: blue;" href="products" class="link">
                <i class="fa-solid fa-box-archive"></i>
                Quản lý sản phẩm
            </a>
        <?php } else {?>
            <a href="../products" class="link">
                <i class="fa-solid fa-box-archive"></i>
                Quản lý sản phẩm
            </a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/staffs/") {?>
            <a style="color: blue;" href="staffs" class="link">
                <i class="fa-solid fa-person"></i>
                Quản lý nhân viên
            </a>
        <?php } else {?>
            <a href="../staffs" class="link">
                <i class="fa-solid fa-person"></i>
                Quản lý nhân viên
            </a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/orders/") {?>
            <a style="color: blue;" href="orders" class="link">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                Quản lý đơn hàng
            </a>
        <?php } else {?>
            <a href="../orders" class="link">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                Quản lý đơn hàng
            </a>
        <?php } ?>
    </li>
    <li class="link-item">
        <a href="../logout_admin.php" class="link">
            <i class="fa-solid fa-right-from-bracket"></i>
            Đăng xuất
        </a>
    </li>
</ul>