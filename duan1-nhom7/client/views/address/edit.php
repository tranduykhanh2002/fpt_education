<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_GET['success'])) {
        $log_success = 'flex';
        $log_error = 'none';
        $log_note = 'none';
        $mesSuccess = "Địa chỉ đã được cập nhật thành công";
    } elseif (isset($_GET['error_phone'])) {
        $log_success = 'none';
        $log_error = 'flex';
        $log_note = 'none';
        $mesError = " Số điện thoại không hợp lệ";
    } elseif (isset($_GET['error_null'])) {
        $log_success = 'none';
        $log_error = 'flex';
        $log_note = 'none';
        $mesError = " Không được bỏ trống các trường (*)";
    } else {
        $log_error = 'none';
        $log_note = 'none';
        $log_success = 'none';
    }
    if (isset($_POST['name'])) {
        if ($_POST['name'] === "") {
            echo header("refresh:0; url = ?error_null");
            exit();
        }
        if ($_POST['phone'] === "") {
            echo header("refresh:0; url = ?error_null");
            exit();
        }
        if ($_POST['address'] === "") {
            echo header("refresh:0; url = ?error_null");
            exit();
        }
        if (is_int($_POST['phone']) == false && strlen($_POST['phone']) != 10) {
            echo header("refresh:0; url = ?error_phone");
            exit();
        } else {
            edit($_GET['id'], $_POST['name'], $_POST['phone'], $_POST['address'], $_POST['note']);
            echo header("refresh:0; url = ?success");
        }

    }
    ?>
    <div style="background:#fff" class="container mt-3 p-3 shadow mb-5 ">
        <a class="btn btn-success" href="dia-chi"><i class="fas fa-chevron-left"></i></a>

        <h2 style="text-align: center;width: 100%;">Sửa địa chỉ nhận hàng</h2>
        <form style="margin-top: 30px;" action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Tên người nhận (*)</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $address[0]['recciever'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">SDT người nhận (*)</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $address[0]['phone'] ?>">
                    </div>


                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="address">Địa chỉ (*)</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $address[0]['address'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" name="note" value="<?php echo $address[0]['note'] ?>">
                    </div>
                    <div style="text-align: right;">
                        <button style="margin-top: 30px; " type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- logmes star -->
    <?php include_once "./client/views/layouts/log.php" ?>
    <!-- logmes end -->

    <script>

    </script>
</body>

</html>