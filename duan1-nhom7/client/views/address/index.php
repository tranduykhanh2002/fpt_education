<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table td {
        padding-top: 1em;
    }
</style>

<body>
    <div style="background:#fff" class="container mt-3 p-3 shadow mb-5">

        <h3 style="text-align: center; width: 100%;">Quản lý địa chỉ nhận hàng của bạn</h3>

        <table class="mt-5 ml-5" style="border-collapse: collapse; width:100%;  ">
            <tr>
                <th>Chọn</th>
                <th>Tên người nhận</th>
                <th>SĐT người nhận </th>
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th></th>
            </tr>

            <?php
            if (isset($_GET['dell']) || isset($_GET['delss'])) {
                $log_success = 'flex';
                $log_error = 'none';
                $log_note = 'none';
                $mesSuccess = "Bạn đã xóa địa chỉ thành công ";
            } else {
                $log_note = 'none';
                $log_error = 'none';
                $log_success = 'none';
            }
            if (isset($_GET['dels'])) {
                delete_addresss($_GET['dels']);
                echo header("refresh:0; url =?dell");
                exit();
            }
            if (isset($_GET['dellid'])) {
                delete_address_one($_GET['dellid']);
                echo header("refresh:0; url =?delss");
                exit();
            }

            for ($i = 0; $i < count($address); $i++) {
            ?>
                <tr style="margin-top: 30px;">
                    <td>
                        <form action="" method="post">
                            <input type="checkbox" name="checkbox[]">
                        </form>
                    </td>
                    <td style="display: none;" class="key"><?php echo $address[$i]['id']; ?></td>
                    <td><?php echo $address[$i]['recciever'] ?></td>
                    <td><?php echo $address[$i]['phone'] ?></td>
                    <td><?php echo $address[$i]['address'] ?></td>
                    <td><?php echo $address[$i]['note'] ?></td>
                    <td>
                        <a class="btn btn-success" href="chinh-sua-dia-chi&id=<?php echo $address[$i]['id']; ?>">Sửa</a>
                        <btn class="btn btn-danger " data-toggle="modal" data-target="#dell" onclick="check_delete('xóa địa chỉ có tên /<?php echo $address[$i]['recciever'] . '/ ' ?>',<?= $address[$i]['id'] ?> )">Xóa</btn>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>
        <div class="mt-5 ml-5">
            <btn onclick="chooseAll()" class="btn btn-success">Chọn tất cả</btn>
            <btn onclick="unchooseAll()" class="btn btn-success">Bỏ chọn tất cả</btn>
            <btn onclick="check_isset_box();" data-toggle="modal" data-target="#myModal" class="btn btn-danger">Xóa đã chọn</btn>
        </div>
    </div>
    <!-- logmes star -->
    <?php include_once "./client/views/layouts/log.php" ?>
    <!-- logmes end -->

    <!-- The Modal -->
    <?php include_once "./client/views/layouts/modal_warning.php" ?>
    <?php include_once "./client/views/layouts/modal_delete.php" ?>
</body>

</html>