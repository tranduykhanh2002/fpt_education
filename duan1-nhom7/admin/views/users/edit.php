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
        $mesSuccess = "Bạn đã cập nhật tài khoản thành công ";
    } else {
        $log_error = 'none';
        $log_success = 'none';
        $log_note = 'none';
    }
    if (isset($_POST['name'])) {
        saveEdit($_GET['id'], $_POST['kichhoat']);
        echo header("refresh:0; url =?success");
        exit();
    }
    if ($staff[0]['role'] == 1) {
        $urlExit = "khach-hang";
        $user = "checked = true";
        $staf =  "";
    } else {
        $urlExit = "nhan-vien";
        $staf = "checked = true";
        $user = "";
    }
    ?>
    <div class="container">

        <h1 style="width: 100%; text-align: center; margin-top: 20px;">Chỉnh sửa quyền tài khoản</h1>
        <form style="margin-top: 20px;" action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Tên nhân viên</label>
                        <input readonly type="text" class="form-control" name="name" placeholder="<?php echo $staff[0]['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Email</label>
                        <input readonly type="text" class="form-control" name="email" placeholder="<?php echo $staff[0]['email'] ?>">
                    </div>


                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="staff">Phone</label>
                        <input readonly type="text" class="form-control" name="staff" placeholder="<?php echo $staff[0]['phone'] ?>">
                    </div>
                    <label for="kichhoat">Vai trò</label>
                    <div class="form-control ">
                        <input <?php echo $user ?> type="radio" class="" value=1 required name="kichhoat"> Khách hàng
                        <input <?php echo $staf ?> type="radio" class="" value=2 required name="kichhoat"> Nhân viên
                    </div>

                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-success mt-3 ">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- logmes star -->
    <?php include_once "./client/views/layouts/log.php" ?>
    <!-- logmes end -->

</body>

</html>