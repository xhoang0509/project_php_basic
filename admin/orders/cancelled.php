<?php 
session_start();
require '../check_admin_login.php';
?>

<!DOCTYPE html>
<html lang="en">
    <title>Đơn hàng đã hủy</title>
    <link rel="icon" type="image/x-icon" href="../../favicon/favicon.ico">
    <?php include '../head_admin.php';?>   
    <body>
        <?php include '../header_admin.php';?>
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
        <?php
            require '../connect.php';
            $sql = " select 
            orders.*,
            customers.name,
            customers.phone,
            customers.address
            from orders
            join customers 
            on customers.id = orders.customer_id where status = -1";
            $result_cancelled = mysqli_query($connect,$sql);   
        ?>           
            <div class="show-admin">                
                <h1>Đơn hàng đã hủy</h1>
                <div>
                    <table border="1" width="100%" class="mt-10 table-others"   >
                        <tr>
                            <th>Mã</th>
                            <th>Thời gian đặt</th>
                            <th>Thông tin người nhận</th>
                            <th>Thông tin người đặt</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                            <th>Duyệt đơn</th>
                            <th>Hủy đơn</th>
                        </tr>
                        <?php foreach ($result_cancelled as $each): ?>
                                <tr>
                                    <td><?php echo $each['id'] ?></td>
                                    <td><?php echo $each['created_at'] ?></td>
                                    <td>
                                        <?php echo $each['name_receiver'] ?><br>
                                        <?php echo $each['phone_receiver'] ?><br>
                                        <?php echo $each['address_receiver'] ?><br>
                                    </td>
                                    <td>
                                        <?php echo $each['name'] ?><br>
                                        <?php echo $each['phone'] ?><br>
                                        <?php echo $each['address'] ?><br>
                                    </td>
                                    <td class="status-<?php echo $each['id'] ?>">
                                        <?php 
                                            switch ($each['status']) {
                                                case '-1':
                                                echo '<div class="td-status bg-danger text-white">Đã hủy</div>';
                                                    break;
                                                case '0':
                                                    echo '<div class="td-status bg-warning text-white">Đợi duyệt</div>';
                                                    break;
                                                case '1':
                                                    echo '<div class="td-status bg-success text-white">Đã duyệt</div>';
                                                    break;                      
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $each['total_price'] ?>
                                    </td>
                                    <td>
                                        <?php if($each['status'] == 1) {?>
                                            <button class="btn btn-secondary" disabled data-id="<?php echo $each['id'] ?>">Đã duyệt</button>
                                        <?php } else if($each['status'] == 0) { ?>
                                            <button class="btn btn-primary btn-accept-order" data-id="<?php echo $each['id'] ?>" data-type="accept">Duyệt</button>
                                        <?php } else {?>
                                            <button class="btn btn-secondary" disabled data-id="<?php echo $each['id'] ?>">Đã hủy</button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                         <?php if($each['status'] == 1) {?>
                                            <button class="btn btn-danger btn-cancel-order" data-id="<?php echo $each['id'] ?>" data-type="cancel">Hủy</button>
                                        <?php } else if($each['status'] == 0) { ?>
                                            <button class="btn btn-danger btn-cancel-order" data-id="<?php echo $each['id'] ?>" data-type="cancel">Hủy</button>
                                        <?php } else {?>
                                            <button class="btn btn-secondary" disabled data-id="<?php echo $each['id'] ?>">Đã hủy</button>
                                        <?php } ?>                                        
                                    </td>
                                </tr>                           
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".btn-accept-order").click(function() {
                    let btn = $(this);
                    let id_order = btn.data("id");
                    let type = btn.data("type");
                    $.ajax({
                        url: 'update_order.php',
                        type: 'POST',
                        data: {id_order, type},
                    })
                    .done(function(data) {
                        btn.removeClass("btn-primary")
                        btn.addClass('btn-secondary')
                        btn.attr('disabled');
                        btn.text("Đã duyệt")
                        let btnStatus = $(`.status-${id_order}`).children('div');
                        btnStatus.removeClass("bg-warning")
                        btnStatus.addClass('bg-success')
                        btnStatus.text("Đã duyệt")
                    })                    
                });
                 $(".btn-cancel-order").click(function() {
                    let btn = $(this);
                    let id_order = btn.data("id");
                    let type = btn.data("type");
                    $.ajax({
                        url: 'update_order.php',
                        type: 'POST',
                        data: {id_order, type},
                    })
                    .done(function(data) {
                        btn.removeClass('btn btn-danger')
                        btn.addClass('btn btn-secondary')
                        btn.attr("disabled")
                        btn.text("Đã hủy")
                        let btnStatus = $(`.status-${id_order}`).children('div');
                        btnStatus.removeClass("bg-success")
                        btnStatus.addClass('bg-danger')
                        btnStatus.text("Đã hủy")
                    })                    
                });
            });
        </script>
    </body>
</html>
