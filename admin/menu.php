<ul class="container-links">
    <li class="link-item">    
        <p>
            <a class="btn btn-primary" href="../root">
                <i class="fa-solid fa-gauge"></i>
                Tổng quan
            </a>
        </p>
    </li>
    <li class="link-item">       
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#manufacturers" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa-solid fa-industry"></i>
                Quản lý nhà sản xuất
            </button>
        </p>
        <div class="collapse" id="manufacturers">
            <div class="card card-body">
                <a class="dropdown-item" href="../manufacturers">Tổng quan nhà sản xuất</a>
                <a class="dropdown-item" href="../manufacturers/add_manufacturer.php">Thêm nhà sản xuất mới</a>            
            </div>
        </div>
    </li>
    <li class="link-item">
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#products" aria-expanded="false" aria-controls="collapseExample">                
                <i class="fa-solid fa-box-archive"></i>
                Quản lý sản phẩm
            </button>
        </p>
        <div class="collapse" id="products">
            <div class="card card-body">
                <a class="dropdown-item" href="../products">Tổng quan sản phẩm</a>
                <a class="dropdown-item" href="../products/add_product.php">Thêm sản phẩm mới</a>            
            </div>
        </div>
    </li>
    <li class="link-item">
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#staffs" aria-expanded="false" aria-controls="collapseExample">                
                <i class="fa-solid fa-person"></i>
                Quản lý nhân viên
            </button>
        </p>
        <div class="collapse" id="staffs">
            <div class="card card-body">
                <a class="dropdown-item" href="../staffs">Tổng quan nhân viên</a>
                <a class="dropdown-item" href="../staffs/add_staff.php">Thêm nhân viên mới</a>            
            </div>
        </div>
    </li>
    <li class="link-item">
       <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#orders" aria-expanded="false" aria-controls="collapseExample">                
                <i class="fa-solid fa-file-invoice-dollar"></i>
                Quản lý đơn hàng
            </button>
        </p>
        <div class="collapse" id="orders">
            <div class="card card-body">
                <a class="dropdown-item" href="../orders">Tổng quan đơn hàng</a>
                <a class="dropdown-item" href="../orders/not_approved.php">Đơn hàng chưa duyệt</a>
                <a class="dropdown-item" href="../orders/approved.php">Đơn hàng đã duyệt</a>
                <a class="dropdown-item" href="../orders/cancelled.php">Đơn hàng đã hủy</a>                
            </div>
        </div>
    </li>
    <li class="link-item">
        <p>
            <a class="btn btn-secondary" href="../logout_admin.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                Đăng xuất
            </a>
        </p>
    </li>    
</ul>