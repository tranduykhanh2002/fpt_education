<?php
if (isset($_GET['updateSuccess'])) {
    $log_success = 'flex';
    $log_error = 'none';
    $log_note = 'none';
    $mesSuccess = "Đã cập nhật trạng thái đơn hàng thành công ";
} else {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'none';
}
$returnSubmit = 'comment';
if (isset($_POST[$returnSubmit])) {
    feedback($_GET['id'], $_POST['starValue'], $_POST['comment'], $_SESSION['auth']['id']);
    header("refresh:0;");
    exit();
}
if (isset($_POST['commentNostar'])) {
    feedback($_GET['id'], $_POST['starValue'], $_POST['commentNostar'], $_SESSION['auth']['id']);
    header("refresh:0;");
    exit();
}
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= CLIENT_ASSET ?>img/banner/banner-top2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết đơn hàng</h2>
                    <div class="breadcrumb__option">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<?php for ($i = 0; $i < count($order_detail); $i++) {
    if ($order_detail[$i]['status'] != 5) {
        $oder_detail = (queryOrderDetail($order_detail[$i]['id']));
        $carts = queryCartId($oder_detail);
    }

    if (isset($_POST['status'])) {
        $id = $_POST['id'];
        updatestatusOrder($id, $_POST['status']);
        if ($_POST['status'] == 3) {
            updatepoints($_POST['user_id'], $_POST['total']);
        }
        $id = $_GET['id'];
        echo header("refresh:0; url =?id=$id&updateSuccess");
        exit();
    }
?>

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Trà sữa</th>
                                    <th class="">Thêm topping</th>
                                    <th class="">lựa chọn khác</th>
                                    <th>Giá</th>
                                    <th style="text-align: center;width: 100px;">Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                for ($j = 0; $j < count($carts); $j++) {
                                    $cart = quertycart($carts[$j])
                                ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="width: 10%;" src=" <?= IMG_URL . ImagePro($cart[0]['product_id']) ?> ">
                                            <h5><?= NamePro($cart[0]['product_id']) ?> (<?= $cart[0]['product_size'] ?>)(<?= number_format($oder_detail[$j]['price_product'], 0, '', ',') . "đ" ?>)
                                            </h5>

                                        </td>
                                        <td> <?php echo optionName(Cartoption($cart[0]['id']));
                                                echo '(' . number_format(priceOption($cart[0]['id']), 0, '', ',') . "đ" . ')' ?> </td>
                                        <td>
                                            <?= $cart[0]['ice'] . 'đá' ?>
                                            <?= $cart[0]['sugar'] . 'đường'  ?>
                                        </td>
                                        <td id="price" class="shoping__cart__price">
                                            <?php echo number_format($oder_detail[$j]['price_product'] + priceOption($cart[0]['id']), 0, '', ',') . "đ"  ?>
                                        </td>
                                        <td>
                                            <?= $cart[0]['quantity'];  ?>
                                        </td>
                                        <td id="total" class="shoping__cart__total">
                                            <?php $price = $oder_detail[$j]['price_product'] + priceOption($cart[0]['id']);
                                            $quanti = $cart[0]['quantity'];
                                            echo number_format($price * $quanti, 0, '', ',') . "đ"  ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">

                            <div class="container mt-3">

                                <!-- Nav tabs -->

                                <h5 style="color: green;">Trạng thái đơn hàng: <span style="color: red;"><?php if ($order_detail[$i]['status'] == 0) {
                                                                                                                echo 'Chờ xác nhận';
                                                                                                            } elseif ($order_detail[$i]['status'] == 1) {
                                                                                                                echo "Đã xác nhận";
                                                                                                            } elseif ($order_detail[$i]['status'] == 2) {
                                                                                                                echo "Đang giao";
                                                                                                            } elseif ($order_detail[$i]['status'] == 3) {
                                                                                                                echo "Giao hàng thành công";
                                                                                                            } else {
                                                                                                                echo "Giao hàng thất bại ";
                                                                                                            } ?></span> </h5>
                                <form method="post" action="">
                                    <select name="status" id="">
                                        <option value="0">Chờ xác nhận</option>
                                        <option value="1">Xác nhận đơn </option>
                                        <option value="2">Giao hàng</option>
                                        <option value="3">Giao hàng thành công</option>
                                        <option value="4">Giao hàng thất bại</option>
                                    </select>
                                    <input style="display: none;" type="text" name="id" value="<?= $id =  $order_detail[$i]['id']; ?>">
                                    <input style="display: none;" type="text" name="user_id" value="<?= $id =  $order_detail[$i]['user_id']; ?>">
                                    <input style="display: none;" type="text" name="total" value="<?= $id =  $order_detail[$i]['total']; ?>">
                                    <button value="" style="background-color: green; font-size: 16px; color: wheat;" class="ml-4" type="submit">Cập nhật</button>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; align-items: start; background-color: #EEEEEE; justify-content: space-between;" class="col-lg-6">
                    <div class="mt-5">
                        <h5 style="color: green;">Tổng tiền thanh toán</h5>
                        <ul>
                            <li>Tiền tạm tính <span><?= number_format($order_detail[$i]['sub_total'], 0, '', ',') . 'đ'  ?></span></li>
                            <li>Phí vận chuyển <span><?= number_format(priceShip(), 0, '', ',') . 'đ' ?></span></li>
                            <li>Dùng điểm <span><?= number_format($order_detail[$i]['points'], 0, '', ',') . 'đ'  ?></span></li>
                            <li>Tổng tiền <span style="color: red;"><?= number_format($order_detail[$i]['total'], 0, '', ',') . 'đ'   ?></span></span></li>
                        </ul>
                    </div>
                    <div>
                        <ul class="">
                            <h5 class="mt-5" style="color: green;">Thông tin giao hàng </h5>
                            <?php $user = getNameUseraOrder($order_detail[$i]['user_id']); ?>
                            <li><strong>Người đặt hàng:</strong><a href="<?= selectUserOrder($user) . '&idOder=' . $order_detail[$i]['user_id'] ?>"> <?= $user[0]['name']  ?></a> </li>
                            <li><strong>Tên người nhận:</strong> <?= $order_detail[$i]['name']  ?> </li>
                            <li><strong>Số điện thoại:</strong> <?= $order_detail[$i]['phone']  ?> </li>
                            <li><strong>Địa chỉ nhận:</strong> <?= $order_detail[$i]['address']  ?> </li>
                            <li><strong>Thời điểm đặt hàng:</strong> <?= $order_detail[$i]['created_at']  ?> </li>
                            <li><strong>Ghi chú:</strong> <?= $order_detail[$i]['note']  ?> </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4" style="width: 100%;text-align: right;">


                </div>
                <?php
                $feedback = queryFeedback($_GET['id']);
                if (count($feedback) > 0) {
                    $displayFeedback = 'block';
                } else {
                    $displayFeedback = 'none';
                } ?>
                <h3 style="color: green;display:<?= $displayFeedback ?> ">Phản hồi khách hàng</h3>
                <ul class="mt-5">
                    <?php

                    for ($i = 0; $i < count($feedback); $i++) {
                    ?>
                        <li> <?php
                                $feedbackBy = getNamefeedbBy($feedback[$i]['feedback_by']);
                                ?>
                            <?php $user2 = getNameUseraOrder($feedback[$i]['feedback_by']); ?>
                            <a href="<?= selectUserOrder($user2) . '&idOder=' . $feedback[$i]['feedback_by'] ?>"><strong style="color: blue;"><?= $feedbackBy['name'] ?></strong></a>
                            <?php

                            if ($feedback[$i]['star'] != 0) {
                                for ($j = 1; $j <= $feedback[$i]['star']; $j++) {
                            ?>
                                    <i style="font-size: 20px; cursor: pointer; color: #ffa400;" class="fa fa-star" aria-hidden="true"></i>
                            <?php
                                }
                            } ?> <br> <?php echo $feedback[$i]['comment'] ?>
                        </li>

                    <?php
                    }
                    ?>
                    <form style="display:<?= $displayFeedback ?> ;" class="mt-3" method="post" class="mt-3" action="">
                        <input type="text" name="commentNostar">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </ul>

                <div style="height: 1px;width: 100%; background-color: black; margin-top: 30px;"></div>
            </div>
        </div>
    </section>
    <?php include_once "./client/views/layouts/modal_delete.php" ?>
    <?php include_once "./client/views/layouts/log.php" ?>
<?php
}
?>