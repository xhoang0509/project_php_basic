<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" ></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" ></script>
        <title>Chi tiết sản phẩm</title>
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/detail.css" />
        <link rel="stylesheet" href="./css/base.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="wrapper">
           <?php include 'header.php' ?>
           <div class="container" style="padding: 0 5% 3%">
              <h1 style="text-align: left; font-weight: bold">Thông tin giỏ hàng</h1>
              <table class="w3-table w3-striped w3-bordered">
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                  </tr>
                  <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>
                    <td>94</td>
                    <td>67</td>
                  </tr>
                  <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>50</td>
                    <td>94</td>
                    <td>67</td>
                  </tr>
                  <tr>
                    <td>Adam</td>
                    <td>Johnson</td>
                    <td>50</td>
                    <td>94</td>
                    <td>67</td>
                  </tr>
                </table>
           </div>
           <?php include 'footer.php' ?>
        </div>
    </body>
</html>
