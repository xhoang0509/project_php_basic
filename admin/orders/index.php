<?php require '../check_admin_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php 
require '../header_admin.php';
?>   
        <div id="container" class="container-admin">
        <?php include '../menu.php'?>
<?php
require '../connect.php';
$sql=" select 
orders.*,
customers.name,
customers.phone,
customers.address
from orders
join customers 
on customers.id = orders.customer_id";
$result = mysqli_query($connect,$sql);

?>           
            <div class="show-admin">
                <h1>Tất cả đơn hàng</h1>
                <a class="add-manufacturer" href="./add_order.php"
                    >Thêm nhà đơn hàng mới</a
                >
                <div>
                    <table border="1" width="100%" class="mt-10 table-others"   > 
                        <tr>
                            <th>Mã</th>
                            <th>Thời gian đặt</th>
                            <th>Thông tin người nhận</th>
                            <th>Thông tin người đặt</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                        </tr>
                        <?php foreach ($result as $each): ?>
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
                                    <td>
                                        <?php
                                        switch ($each['status']) {
                                            case '0':
                                                echo "Mới đặt";
                                                break;
                                            case '1':
                                                echo "Đã duyệt";
                                                break;
                                            case '2':
                                                echo "Dã hủy";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $each['total_price'] ?>
                                    </td>
                                </tr>                               

                        <?php endforeach ?>
                        
                    </table>
                </div>
            </div>
        </div>
        <?php require'../footer.php'?>
    </body>
</html>
