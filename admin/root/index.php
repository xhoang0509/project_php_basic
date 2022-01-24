<?php
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

$sql = "SELECT 
date_format(created_at, '%d-%m') as 'ngay',
sum(total_price) as 'doanh_thu'
from  `orders`
group by day(created_at);";
$result = mysqli_query($connect, $sql);
$arr = [];
foreach ($result as $each) {
    $arr[$each['ngay']] = $each['doanh_thu'];
}
// echo json_encode($arr);
$max_date = 30;
$today = date('d');
$day_last_month = $max_date - $today;
$last_month = date('m', strtotime("-1 month"));
$max_day_last_month = (new DateTime($last_month))->format('t');

echo $max_day_last_month;
exit();
?>

<!DOCTYPE html>
<html lang="en">    
    <?php include '../header_admin.php';?>   
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
        <header id="header">
            <a href="../root" class="header-logo">
                <h1>ABC Shop</h1>
            </a>
        </header>
        <div id="container-admin" class="container-admin">
        <?php include '../menu.php'?>
            <div class="show-admin">
                <h1>Tổng quan</h1>
                <div class="dashboard-list">
                    <h3 class="dashboard-item">
                        <a href="../manufacturers/">Tổng nhà sản xuất: <?php echo $total_manufacturers ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../products/">Tổng nhà sản phẩm: <?php echo $total_products ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../staffs/">Tổng nhân viên: <?php echo $total_staffs ?></a>
                    </h3>
                    <h3 class="dashboard-item">
                        <a href="../others/">Tổng đơn hàng: <?php echo $total_orders ?></a>
                    </h3>
                </div>
                <figure class="highcharts-figure">
                    <div style="padding: 0" id="container"></div>
                        <!-- <p class="highcharts-description">
                        Basic line chart showing trends in a dataset. This chart includes the
                        <code>series-label</code> module, which adds a label to each line for
                        enhanced readability.
                        </p> -->
                </figure>
                <h1 class="mt-10">Sản phẩm bán chạy nhất tháng 11</h1>
                <hr />
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
                <h1 class="mt-10">Nhân viên suất sắc nhất tháng 11</h1>
                <hr />
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
        <?php require'../footer.php'?>
        <!-- Highchart  -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script>
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
               categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
                data: [43934, 52503, 57177, 69658, 97031, 119931,137133, 154175, 137133, 154175,137133,154175]
            }, {
                name: 'Manufacturing',
                data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
            }, {
                name: 'Sales & Distribution',
                data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
            }, {
                name: 'Project Development',
                data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
            }, {
                name: 'Other',
                data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
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
        </script>
    </body>
</html>