<ul class="container-links">
    <li class="link-item">
    <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/") {?>
            <a style="color: blue;" href="./index.html" class="link">Dashboard</a>
        <?php } else {?>
            <a href="./index.html" class="link">Dashboard</a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/manufacturers/") {?>
            <a style="color: blue" href="manufacturers" class="link">Quản lý nhà sản xuất</a>
        <?php } else {?>
            <a href="manufacturers" class="link">Quản lý nhà sản xuất</a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/products/") {?>
            <a style="color: blue;" href="products" class="link">Quản lý sản phẩm</a>
        <?php } else {?>
            <a href="products" class="link">Quản lý sản phẩm</a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/staffs/") {?>
            <a style="color: blue;" href="staffs" class="link">Quản lý nhân viên</a>
        <?php } else {?>
            <a href="staffs" class="link">Quản lý nhân viên</a>
        <?php } ?>
    </li>
    <li class="link-item">
        <?php if($_SERVER['REQUEST_URI'] === "/abcshop/admin/orders/") {?>
            <a style="color: blue;" href="orders" class="link">Quản lý đơn hàng</a>
        <?php } else {?>
            <a href="orders" class="link">Quản lý đơn hàng</a>
        <?php } ?>
    </li>
    <li class="link-item">
        <a href="" class="link">Đăng xuất</a>
    </li>
</ul>