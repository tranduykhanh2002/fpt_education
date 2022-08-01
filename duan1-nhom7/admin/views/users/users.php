<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table th {
        text-align: left;
    }
</style>

<body>
    <h1 style="width: 100%; text-align: center;">Quản lý khách hàng</h1>
    <div class=" ml-5">
        <div class="row ml-5">
            <form action="" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" name="keyword" value="<?php if (isset($keyword)) $keyword  ?>" class="form-control mr-2" placeholder="Tìm kiếm...">
                </div>
                <input class="btn btn-sm btn-outline-dark" type="submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
    <div class="row ml-5 pb-5">
        <?php
        if (isset($_GET['success'])) {
            $log_success = 'flex';
            $log_error = 'none';
            $log_note = 'none';
            $mesSuccess = "Bạn đã xóa tài khoản thành công ";
        } else {
            $log_note = 'none';
            $log_error = 'none';
            $log_success = 'none';
        }
        if (isset($_GET['dellid'])) {
            delete_account_one($_GET['dellid']);
            echo header("refresh:0; url =?success");
            exit();
        }
        if (isset($_GET['dels'])) {
            delete_accounts($_GET['dels']);
            echo header("refresh:0; url =?success");
            exit();
        }
        for ($i = 0; $i < count($account); $i++) {
        ?>

            <div class="col-sm-5 card bg-light d-flex flex-fill ml-5 mt-3">
                <form class="mt-1" action="" method="post">
                    <input style="display: none;" type="checkbox" name="checkbox[]">
                </form>
                <div style="display: none;" class="key"><?php
                                                        echo $account[$i]['id']; ?></div>
                <div class="card-header text-muted border-bottom-0">
                    <h2 class="lead"><b>Họ Tên: <?php echo $account[$i]['name'] ?></b></h2>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">

                            <ul class="ml-4 mb-0 fa-ul text-muted mt-3">
                                <li class="small"><span class="fa-li"><i class="fas fa-envelope-open"></i></span> Gmail <?php echo $account[$i]['email'] ?></li>
                                <li class="small"><span class="fa-li"><i class="fas fa-envelope-open"></i></span> Phone <?php echo $account[$i]['phone'] ?></li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img style="width: 90px;" style="width: 90px;" src="<?php echo IMG_URL . $account[$i]['avatar'] ?>" class="img-circle img-fluid">
                        </div>
                    </div>

                </div>
                <div style="text-align: right;" class="card-footer">

                    <a class="btn btn-success" href="chinh-sua&id=<?php echo $account[$i]['id']; ?>"> <i class="fas fa-edit"></i> </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- The Modal -->

    <?php

    include_once "./admin/views/layouts/modal_warning.php";

    ?>

    <!-- logmes star -->
    <?php include_once "./admin/views/layouts/log.php" ?>
    <!-- logmes end -->
</body>

</html>