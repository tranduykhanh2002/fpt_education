<?php

if (isset($_SESSION['auth']['id'])) {
    $check_login = "data-target='#modal-lg'";
    $log = "";
} else {
    $log = "swalDefaultWarning";
    $check_login = "";
    $check_login = "";
}


?>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm mới nhất</h2>
                </div>
                <div class="featured__controls">
                </div>
            </div>
        </div>
        <div class="row ">
            <?php foreach (pdo_select("SELECT * FROM products WHERE status = '1' ORDER BY id DESC LIMIT 8") as $k => $items) { ?>
                <p style="display: none;" class="product_id"><?php echo $items['id'] ?></p>
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="featured__item">
                        <div id="value_image" class="featured__item__pic set-bg" data-setbg="<?= IMG_URL . $items['thumbnail'] ?>" data="<?= IMG_URL . $items['thumbnail'] ?>">
                            <ul class="featured__item__pic__hover">
                                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] != null) : ?>
                                    <?php $check = check_favorite_product($items['id']) ?>
                                    <?php $check2 = check_favorite_pro($items['id']) ?>
                                    <li style="display:<?= $check ?>;"><a href="<?= BASE_URL . 'yeu-thich?id=' . $items['id'] ?>"><i class="fa fa-heart"></i></a></li>
                                    <li style="display:<?= $check2 ?>;>"><a href="<?= BASE_URL . 'san-pham-yeu-thich/xoa?product_id=' . $items['id'] ?>" style="color:red"><i class="fa fa-heart"></i></a></li>
                                <?php endif ?>
                                <li><a class="<?php echo $log ?>" id="btn_cart" data-toggle="modal" <?php echo $check_login ?> data="<?php echo $k ?>"><i class="fa fa-shopping-cart "></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a id="value_name" href="<?= BASE_URL . 'danh-muc/san-pham?id=' . $items['id'] ?>"><?php echo $items['name'] ?></a></h6>
                            <h5 id="value_price" data="<?php echo $items['price'] ?>"><?= number_format($items['price'], 0, '', ',') ?>đ</h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Form_option start -->
<?php include_once "./client/views/layouts/form_option.php" ?>
<!-- Form_option end -->
<?php include_once "./client/views/layouts/oder-jQuery.php" ?>