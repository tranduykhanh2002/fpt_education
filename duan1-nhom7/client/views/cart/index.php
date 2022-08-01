<head>

</head>
<?php
if (isset($_GET['update'])) {
    $log_success = 'flex';
    $log_error = 'none';
    $log_note = 'none';
    $mesSuccess = "Cập nhật giỏ hàng thành công, điền thông tin giao hàng và mua hàng ngay nào";
} elseif (isset($_GET['dell'])) {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'flex';
    $mesSuccess = "Đã xóa một sản phẩm khỏi giỏ hàng ";
} elseif (isset($_GET['dellsuccess'])) {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'flex';
    $mesSuccess = "Hủy đơn hàng thành công ";
} elseif (isset($_GET['Buycusscess'])) {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'flex';
    $mesSuccess = "Mua trà sữa thành công. Bạn có thể vào hóa đơn để xem thông tin hóa đơn của bạn";
} else {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'none';
}
if (isset($_GET['dellid'])) {
    del($_GET['dellid']);
    echo header("refresh:0; url =?dell");
    exit();
}

if (isset($_GET['updateAll'])) {
    $arr = explode(',', $_GET['updateAll']);
    updateAll($arr);
    echo header("refresh:0; url =?update");
    exit();
}
if (isset($_GET['Buy'])) {
    $idOder = addOder($_SESSION['auth']['id'], $_GET['n'], $_GET['a'], $_GET['p'], $_GET['note'], $_GET['subTotal'], $_GET['point'], $_GET['shipping'], $_GET['total']);
    addOderDetail($_SESSION['auth']['id'], $idOder);
    if (isset($_GET['saveAddress'])) {
        addAddress($_SESSION['auth']['id'], $_GET['n'], $_GET['p'], $_GET['a'], $_GET['note']);
    }
    updateStatusAll();
    if ($_GET['point'] != 'Áp dụng') {
        updatepoints($_SESSION['auth']['id'], $_GET['point']);
    }
    echo header("refresh:0; url =don-hang?buysuccess");
    exit();
}

?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= CLIENT_ASSET ?>img/banner/banner-top2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chủ">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<?php 

    if(count($carts) > 0) {
        ?>
        <section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product col-4">Trà sữa</th>
                                <th class="col-2">Thêm topping</th>
                                <th class="col-2">Lựa chọn khác</th>
                                <th class="col-1">Giá</th>
                                <th class="col-1" style="text-align: center;">Số lượng</th>
                                <th col="col-2">Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($carts); $i++) {

                            ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="width: 10%;" src=" <?= IMG_URL . getImagePro($carts[$i]['product_id']) ?> ">
                                        <h5><?php echo getNamePro($carts[$i]['product_id']) ?> (<?php echo $carts[$i]['product_size'] . ')';
                                                                                                echo '(' . number_format(getPriceProSize($carts[$i]['product_id'], $carts[$i]['product_size']), 0, '', ',') . 'đ'  ?>)
                                        </h5>
                                    </td>
                                    <td> <?php echo getoptionName(getCartoption($carts[$i]['id']));
                                            echo '(' . number_format(priOption($carts[$i]['id']), 0, '', ',') . 'đ' ?>)</td>
                                    <td>
                                        <?= $carts[$i]['ice'] . 'đá' ?>
                                        <?= $carts[$i]['sugar'] . 'đường'  ?>
                                    </td>
                                    <td id="price" class="shoping__cart__price">
                                        <?php echo number_format(getprice($carts[$i]['product_id']) + getoption(getCartoption($carts[$i]['id'])), 0, '', ',') . 'đ'; ?>
                                    </td>
                                    <td style="display: flex; justify-content: center;align-items: center;height: 124px;" class="">
                                        <button index="<?php echo $i ?>" id="reduce" style="width: 20px; height: 25px;display: flex; justify-content: center; align-items: center;" type="button" class="btn btn-info rounded-circle ">-</button>
                                        <input onkeyup="toTal(<?= $i ?>)" id="quantity" style="width: 50px; text-align: center; border: none; background-color: #FAFAFA;" value="<?= $carts[$i]['quantity'] ?>" type="text" name="quantity">

                                        <button index="<?= $i ?>" id="augment" style="width: 20px;text-align: center; height: 25px;display: flex; justify-content: center; align-items: center;" type="button" class="btn btn-info rounded-circle">+</button>
                                    </td>
                                    <td onchange="totalCart()" id="total" class="shoping__cart__total">
                                        <?php $id =  $carts[$i]['product_id'] ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span data-toggle="modal" data-target="#dell" onclick="check_delete('trà sữa có tên /<?= getNamePro($carts[$i]['product_id']) . '(' . $carts[$i]['product_size'] . ')' . '/ Khỏi giỏ hàng' ?>', <?= $carts[$i]['id'] ?> )" class="icon_close"></span>
                                    </td>
                                </tr>
                            <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a style="background-color: #32CD32;" href="san-pham" class="primary-btn cart-btn">Tiếp tục mua trà sữa</a>
                    <a id="btn_update" class=" primary-btn cart-btn
                        cart-btn-right"><span class="icon_loading"></span>
                        Cập nhật giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Thông tin giao hàng</h5>

                        <div class="container mt-3">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">

                                <li class="nav-item">
                                    <a style="cursor: default;" style="background-color: red; " class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Nhập thông tin</a>
                                </li>

                            </ul>
                            <div class="mt-2" style="text-align: right;width: 100%;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                                    Lấy thông tin cũ
                                </button>
                            </div>


                            <!-- The Modal -->


                            <div class="tab-content mt-3" id="custom-tabs-three-tabContent">

                                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <form id="form_address" action="" method="get">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i style="width: 14px;" class="fa fa-user" aria-hidden="true"></i></span>
                                            </div>
                                            <input onkeyup="saveBlock()" id="nameIp" style="text-align: left;" type="text" class="form-control" placeholder="Tên người nhận">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i style="width: 14px;" class="fa fa-phone" aria-hidden="true"></i></span>
                                            </div>
                                            <input onkeyup="saveBlock()" id="phoneIp" style="text-align: left;" type="text" class="form-control" placeholder="Số điện thoại người nhận">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i style="width: 14px;" class="fa fa-map-marker" aria-hidden="true"></i></span>
                                            </div>
                                            <input onkeyup="saveBlock()" id="addressIp" style="text-align: left;" type="text" class="form-control" placeholder="Địa chỉ người nhận">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-sticky-note" aria-hidden="true"></i></span>

                                            </div>
                                            <input onkeyup="saveBlock()" id="noteIp" style="text-align: left;" type="text" class="form-control" placeholder="Ghi chú địa chỉ">
                                        </div>
                                        <div style="color: red;" id="mesAddress"></div>
                                        <div id="none_save" style="display: none; align-items: center;">

                                            <input id="saveAddress" style="width: 25px;" type="checkbox">
                                            </input>
                                            Lưu lại thông tin cho lần mua hàng sau
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng tiền giỏ hàng</h5>
                    <ul>
                        <li>Tiền tạm tính <span id="priceTem"></span></li>
                        <li>Phí vận chuyển <span id="priceShip"><?= number_format(priceShip(), 0, '', ',') . 'đ' ?></span></li>
                        <li>Bạn có <strong id="points"><?php echo number_format(point($_SESSION['auth']['id'], 0, '', ',')) ?></strong>
                            điểm thưởng<span id="render_points" dataWait=<?php echo point($_SESSION['auth']['id']) ?> data="0"><button onclick="clickpoints()" id="btn_points" type="button" class="btn btn-success">Áp dụng</button></span></li>
                        <li>Tổng tiền <span id="totalCart"></span></li>
                    </ul>
                    <a onclick="Buy()" id="btn_buy" class="primary-btn">Mua hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
        <?php
    }

?>
<!-- Shoping Cart Section End -->



<!-- logmes star -->
<?php include_once "./client/views/layouts/log.php" ?>
<!-- logmes end -->
<?php include_once "./client/views/layouts/modal_delete.php" ?>
<div style="height:700px ;" class="modal fade mt-5" id="modal-lg" style="display: none;" aria-hidden="true">
    <div style="width: 40%;" class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Bạn muốn nhập thông tin nào ?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div style="overflow-y: auto;height: 250px; " class="modal-body mt-5">
                <ul>

                    <?php $address = aRess($_SESSION['auth']['id']);

                    for ($i = 0; $i < count($address); $i++) {
                    ?>
                        <button onclick="getAddRess(<?= $i ?>)" data-dismiss="modal" class="btn btn-success"> Nhập thông
                            tin này</button>
                        <li id="modalName" style="margin-left: 30px;margin-top: 5px;" data="<?= $address[$i]['recciever'] ?>"><strong>Tên người nhận</strong>:
                            <?= $address[$i]['recciever'] ?></li>
                        <li id="modalPhone" style="margin-left: 30px;" data="<?= $address[$i]['phone'] ?>"><strong>Số
                                điện
                                thoại</strong>: <?= $address[$i]['phone'] ?></li>
                        <li id="modalAddress" style="margin-left: 30px;" data="<?= $address[$i]['address'] ?>">
                            <strong>Địa
                                chỉ</strong>: <?= $address[$i]['address'] ?>
                        </li>
                        <li id="modalNote" style="margin-left: 30px;" data="<?= $address[$i]['note'] ?>"><strong>Ghi chú
                                địa
                                chỉ</strong>: <?= $address[$i]['note'] ?></li>
                        <div style="width: 100%; height: 1px; background-color: black;margin-bottom: 20px;"></div>
                    <?php
                    }

                    ?>
                </ul>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script src="<?= CLIENT_ASSET ?>js/cart.js"></script>