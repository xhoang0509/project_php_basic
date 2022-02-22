<?php
session_start();
require '../check_admin_login.php';
require '../connect.php';

$sql = "select * from products";
$result = mysqli_query($connect,$sql);
$total_products = mysqli_num_rows($result);

$sql = "select * from manufacturers";
$result = mysqli_query($connect,$sql);
$total_manufacturers = mysqli_num_rows($result);

$sql = "select * from admin where level = 0";
$result = mysqli_query($connect,$sql);
$total_staffs = mysqli_num_rows($result);
 
$sql = "select * from orders";
$result = mysqli_query($connect,$sql);
$total_orders = mysqli_num_rows($result);


$sql = "select count(*) from orders where status = 0";
$result = mysqli_query($connect,$sql);
$order_wait_accpect = mysqli_fetch_array($result)['count(*)'];

?>

<!DOCTYPE html>
<html lang="en">
    <title>Tổng quan</title>
    <link rel="icon" type="image/x-icon" href="../../favicon/favicon.ico">
    <?php include '../head_admin.php';?>   
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
          min-width: 360px;
          max-width: 800px;
          margin: 1em auto;
        }

        .highcharts-data-table table {
          font-family: Verdana, sans-serif;
          border-collapse: collapse;
          border: 1px solid #ebebeb;
          margin: 10px auto;
          text-align: center;
          width: 100%;
          max-width: 500px;
        }

        .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
        }

        .highcharts-data-table th {
          font-weight: 600;
          padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
          padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
          background: #f1f7ff;
        }
    </style>
    
    <body>
        <?php include '../header_admin.php' ?>
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
                <h1>Tổng quan</h1>
                <div class="dashboard-list">
                    <h3 class="dashboard-item">
                        <a href="../orders/not_approved.php" style="color:red;">Số đơn hàng chưa duyệt: <?php echo $order_wait_accpect ?></a>                        
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../manufacturers/">Tổng nhà sản xuất: <?php echo $total_manufacturers ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../products/">Tổng nhà sản phẩm: <?php echo $total_products ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../staffs/">Tổng nhân viên: <?php echo $total_staffs ?></a>
                    </h3>
                </div>
                <hr>
                <h1 class="mt-10">Thống kê doanh thu</h1>
                <figure class="highcharts-figure">
                    <div style="padding: 0" id="container"></div>                        
                </figure>
                <hr />
                <h1 class="mt-10">Sản phẩm bán chạy nhất tháng 11</h1>
                <div class="best-seller">
                    <a class="best-seller-title" href="">
                        <h3>Iphone 13 promax</h3>
                        <img
                            class="best-seller-img"
                            src="../../image/iphone-13-promax.png"
                            alt=""
                        />
                    </a>

                    <p>Số lượng 100 chiếc</p>
                </div>
                <hr />
                <h1 class="mt-10">Nhân viên suất sắc nhất tháng 11</h1>
                <div class="best-seller">
                    <a class="best-seller-title" href="">
                        <h3>Nguyễn Văn A</h3>
                        <img
                            class="best-seller-img"
                            src="../../image/profile-1.jpg"
                            alt=""
                        />
                    </a>

                    <p>Số lượng đã bán 100 chiếc</p>
                </div>
            </div>
        </div>
        <?php include '../footer.php'?>
        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>        
        <!-- Highchart  -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>        
        <script>                       
            $(document).ready(function() {
                $.ajax({
                    url: 'get_doanh_thu.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {days: 30},
                })
                .done(function(response) {
                    const arrX = Object.keys(response);
                    const arrY = Object.values(response);                
                    Highcharts.chart('container', {
                        title: {
                            text: 'Thông kê doanh thu 30 ngày gần nhất'
                        },
                        yAxis: {
                            title: {
                              text: 'Doanh thu'
                            }
                        },
                        xAxis: {
                            title: {
                                text: 'Tháng'
                            },
                           categories: arrX
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },
                        plotOptions: {
                            series: {
                              label: {
                                connectorAllowed: false
                              }                  
                            }
                        },
                        series: [{
                            name: 'Doanh thu',
                            data: arrY
                        }],
                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]
                        }
                    });  
                })              
            });            
        </script>
    </body>
</html>