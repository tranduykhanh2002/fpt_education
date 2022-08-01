<?php
if (isset($_GET['buy'])) {
    $log_success = 'flex';
    $log_error = 'none';
    $log_note = 'none';
    $mesSuccess = "Thêm vào giỏ hàng thành công";
} else {
    $log_note = 'none';
    $log_error = 'none';
    $log_success = 'none';
}
if (isset($_GET['productId'])) {
    $toppings = trim($_GET['toppingIP']);
    $toppings = explode(' ', $toppings);
    $cart_id = creat_car($_SESSION['auth']['id'], $_GET['quantity'], $_GET['size'], $_GET['productId'], $_GET['sugar'], $_GET['ice']);
    if (($toppings[0]) > 0) {
        product_optino($cart_id, $toppings);
    }
    del_product_favorite();
    echo header("refresh:0; url =?buy");
    exit();
}
if (isset($_SESSION['auth']['id'])) {
    $check_login = "data-target='#modal-lg'";
    $log = "";
} else {
    $log = "swalDefaultWarning";
    $check_login = "";
}

?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= CLIENT_ASSET ?>img/banner/banner-top2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Sản Phẩm Yêu Thích</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= BASE_URL ?>trang-chu">Trang Chủ</a>
                        <span>Sản Phẩm Yêu Thích</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product"></th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Ngày Tạo</th>
                                <th>Mua Ngay</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $product_like = loadall_product_like();
                            for ($i = 0; $i < count($product_like); $i++) {
                                $proLike = getProByid($product_like[$i]['product_id'])
                            ?>
                                <tr>
                                    <p style="display: none;" class="product_id"><?php echo $proLike[0]['id'] ?></p>
                                    <td class="shoping__cart__item" style="width:200px;">
                                        <img id="value_image" src="<?= IMG_URL . $proLike[0]['thumbnail'] ?>" alt="" style="width:90%" data="<?= IMG_URL . $proLike[0]['thumbnail'] ?>">
                                    </td>
                                    <td>
                                        <h5 id="value_name"><?= $proLike[0]['name'] ?></h5>
                                    </td>
                                    <td id="value_price" class="shoping__cart__price" data="<?php echo $proLike[0]['price'] ?>">
                                        <?= number_format($proLike[0]['price'], 0, '', ',') ?>đ
                                    </td>
                                    <td class="shoping__created_at" style="margin: 0;color: #111111;font-weight: 400;font-family:  Cairo, sans-serif;font-size:18px;">
                                        <?= $product_like[$i]['created_at'] ?>
                                    </td>
                                    <td class="shoping__cart__item__close" style="text-align: center;">
                                        <div><a class="<?php echo $log ?>" id="btn_cart" data-toggle="modal" <?php echo $check_login ?> data="<?php echo $i ?>"><i class="fa fa-shopping-cart "></i></a></div>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="<?= BASE_URL . 'san-pham-yeu-thich/xoa?product_id=' . $proLike[0]['id'] ?>"><span class=" icon_close"></span></a>
                                    </td>

                                </tr>
                            <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
<!-- Form_option start -->
<?php include_once "./client/views/layouts/form_option_proLike.php" ?>
<!-- Form_option end -->

<?php include_once "./client/views/layouts/oder-jQuery.php" ?>
<?php include_once "./client/views/layouts/log.php" ?>