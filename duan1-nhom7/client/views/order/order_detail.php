<?php
if (isset($_GET['dellSuccess'])) {
    $log_success = 'flex';
    $log_error = 'none';
    $log_note = 'none';
    $mesSuccess = "Đã hủy đơn hàng thành công ";
} elseif (isset($_GET['dellError'])) {
    $log_success = 'none';
    $log_error = 'flex';
    $log_note = 'none';
    $mesError = "Không thể hủy đơn hàng này. Chúng tôi đã xác nhận và đang xử lý";
} elseif (isset($_GET['buysuccess'])) {
    $log_success = 'flex';
    $log_error = 'none';
    $log_note = 'none';
    $mesSuccess = "Tạo đơn hàng thành công";
} else {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'none';
}
$check = checkisset($_GET['id']);
$returnSubmit = 'comment';
if (count($check) > 0) {
    $displayForm = 'none';
    $returnSubmit = 'false';
}
if (isset($_POST[$returnSubmit])) {
    feedback($_GET['id'], $_POST['starValue'], $_POST['comment'],  $_SESSION['auth']['id']);
    header("refresh:0;");
    exit();
}
if (isset($_POST['commentNostar'])) {
    feedback($_GET['id'], $_POST['starValue'], $_POST['commentNostar'],  $_SESSION['auth']['id']);
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
                        <a href="trang-chủ">Trang chủ</a>
                        <span>Chi tiết đơn hàng</span>
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

    if (isset($_GET['dellid'])) {
        $id =  $order_detail[$i]['id'];
        $checkStatus = "select * from oder where id = $id";
        $resultCheck = executeQuery($checkStatus);
        if ($resultCheck['status'] == 0) {
            delOrder($_GET['dellid']);
        }
        header("refresh:0; url =gio-hang?dellsuccess");
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

                                <h5 style="color: green;">Trạng thái đơn hàng: <span style="color: red;"><?php
                                                                                                            $displayForm = 'none';
                                                                                                            if ($order_detail[$i]['status'] == 0) {
                                                                                                                echo 'Chờ xác nhận';
                                                                                                            } elseif ($order_detail[$i]['status'] == 1) {
                                                                                                                echo "Đã xác nhận";
                                                                                                            } elseif ($order_detail[$i]['status'] == 2) {
                                                                                                                echo "Đang giao";
                                                                                                            } elseif ($order_detail[$i]['status'] == 3) {
                                                                                                                echo "Đã nhận hàng";
                                                                                                                if (count($check) > 0) {
                                                                                                                    $displayForm = 'none';
                                                                                                                } else {
                                                                                                                    $displayForm = 'block';
                                                                                                                    $returnSubmit = 'starValue';
                                                                                                                }
                                                                                                            } else {
                                                                                                                echo "Giao hàng thất bại ";
                                                                                                            } ?></span> </h5>
                                <a href="don-hang" class="btn btn-success"> Cập nhật trạng thái</a>

                                <ul>
                                    <h5 class="mt-5" style="color: green;">Thông tin giao hàng </h5>
                                    <li><strong>Tên người nhận:</strong> <?= $order_detail[$i]['name']  ?> </li>
                                    <li><strong>Số điện thoại:</strong> <?= $order_detail[$i]['phone']  ?> </li>
                                    <li><strong>Địa chỉ nhận:</strong> <?= $order_detail[$i]['address']  ?> </li>
                                    <li><strong>Tạo đơn lúc:</strong> <?= $order_detail[$i]['created_at']  ?> </li>
                                    <li><strong>Ghi chú:</strong> <?= $order_detail[$i]['note']  ?> </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5 style="color: green;">Tổng tiền thanh toán</h5>
                        <ul>
                            <li>Tiền tạm tính <span><?= number_format($order_detail[$i]['sub_total'], 0, '', ',') . 'đ'  ?></span></li>
                            <li>Phí vận chuyển <span><?= number_format(priceShip(), 0, '', ',') . 'đ' ?></span></li>
                            <li>Dùng điểm <span><?= number_format($order_detail[$i]['points'], 0, '', ',') . 'đ'  ?></span></li>
                            <li>Tổng tiền <span><?= number_format($order_detail[$i]['total'], 0, '', ',') . 'đ'   ?></span></span></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4" style="width: 100%;text-align: right;">
                    <?php
                    $id =  $order_detail[$i]['id'];
                    $checkStatus = "select * from oder where id = $id";
                    $resultCheck = executeQuery($checkStatus);
                    $none = "";

                    if ($resultCheck['status'] == 0) {
                        $clickCheckStatus = "#dell";
                        $bg = "danger";
                        $toad = "";
                        $clickHuy = "";
                    } elseif ($resultCheck['status'] == 1 || $resultCheck['status'] == 2) {
                        $clickCheckStatus = "#";
                        $bg = "secondary";
                        $clickHuy = "Nohuy()";
                    } else {
                        $clickHuy = "dell";
                    }
                    if ($resultCheck['status'] == 4) {
                        $none = "display:none;";
                    }
                    ?>
                    <span style="<?= $none ?>" id="huyOder" onmouseover="<?= $clickHuy ?>" class="btn btn-<?= $bg ?>" data-toggle="modal" data-target="<?= $clickCheckStatus ?>" onclick="check_delete('hủy hóa đơn đã chọn (nó sẽ quay lại giỏ hàng của bạn)', <?php echo ($order_detail[$i]['id']) ?> )"> Hủy đơn hàng này</span>

                </div>

                <form check=<?= $displayForm ?> id="feedback" class="mt-3" style="display:<?= $displayForm ?> ;" method="post">
                    <caption>
                        <h3 style="color: green;">Gửi đánh giá</h3>
                    </caption>
                    <div class="mt-3">
                        <?php for ($i = 0; $i < 5; $i++) {
                        ?>
                            <i index='<?= $i + 1 ?>' id="star" style="font-size: 20px; cursor: pointer;color: 
#EEEEEE; " class="fa fa-star" aria-hidden="true"></i>
                        <?php
                        }
                        $feedback = queryFeedback($_GET['id']);
                        if (count($feedback) > 0) {
                            $displayFeedback = 'block';
                        } else {
                            $displayFeedback = 'none';
                        }
                        ?>
                    </div>
                    <input style="display: none;" type="text" id="starValue" name="starValue">
                    <div class="form-group">
                        <label for="comment">Viết đánh giá của bạn</label>
                        <textarea name="comment" class="form-control" cols="70" id="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>

                <h3 style="color: green;display:<?= $displayFeedback ?> ">Phản hồi của bạn</h3>
                <ul class="mt-5">
                    <?php

                    for ($i = 0; $i < count($feedback); $i++) {
                    ?>
                        <li> <?php if ($feedback[$i]['feedback_by'] == $_SESSION['auth']['id']) {
                                ?>
                                <strong style="color: blue;"><?php echo getnameUser(queryOder($_GET['id'])); ?></strong>
                            <?php
                                } else {
                            ?>
                                <strong style="color: blue;"><?php echo 'XIAO HAHA' ?></strong>
                                <?php

                                }
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
    <script src="<?= CLIENT_ASSET ?>js/order.js"></script>
<?php
}
?>

<script>
    const huyOder = document.getElementById('huyOder');

    function Nohuy() {
        huyOder.innerHTML = "Đơn hàng này đang xử lý và sẽ nhanh chóng giao đến cho bạn";
    }

    var checkDell = huyOder.getAttribute('onmouseover');
    if (checkDell == 'dell') {
        huyOder.remove();
    }
</script>