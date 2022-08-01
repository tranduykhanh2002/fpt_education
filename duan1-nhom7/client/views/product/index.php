<?php

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
                    <h2>Sản phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="trang-chủ">Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh Mục</h4>
                        <ul>
                            <?php
                            $listdanhmuc = loadall_danhmuc();
                            ?>
                            <?php foreach ($listdanhmuc as $danhmuc) : ?>
                                <?php if ($danhmuc['show_menu'] == 1) : ?>
                                    <li><a href="<?= BASE_URL . 'san-pham?id-danhmuc=' . $danhmuc['id'] ?>"><?= $danhmuc['name'] ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Lọc theo giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar__item">

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <!-- <div>
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                </div> -->
                <div class="">
                    <div class="section-title product__discount__title">
                        <h2>Sản Phẩm</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Kiểu lọc</span>
                                <select>
                                    <option value="0">Mặc định</option>
                                    <option value="0">mặc định</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $k => $product) : ?>

                            <?php if ($product['status'] == 1) : ?>
                                <p style="display: none;" class="product_id"><?php echo $product['id'] ?></p>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div id="value_image" class="product__item__pic set-bg" data-setbg="<?= IMG_URL . $product['thumbnail'] ?>" data="<?= IMG_URL . $product['thumbnail'] ?>">
                                            <ul class="product__item__pic__hover">
                                                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] != null) : ?>
                                                    <?php $check = check_favorite_product($product['id']) ?>
                                                    <?php $check2 = check_favorite_pro($product['id']) ?>
                                                    <li style="display:<?= $check ?>;"><a href="<?= BASE_URL . 'yeu-thich?id=' . $product['id'] ?>"><i class="fa fa-heart"></i></a></li>
                                                    <li style="display:<?= $check2 ?>;>"><a href="<?= BASE_URL . 'san-pham-yeu-thich/xoa?product_id=' . $product['id'] ?>" style="color:red"><i class="fa fa-heart"></i></a></li>
                                                <?php endif ?>
                                                <li><a class="<?php echo $log ?>" id="btn_cart" data-toggle="modal" <?php echo $check_login ?> data="<?php echo $k ?>"><i class="fa fa-shopping-cart "></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product__item__text">
                                            <h6><a id="value_name"><?= $product['name'] ?></a></h6>
                                            <h5 id="value_price" data="<?php echo $product['price'] ?>">
                                                <?= number_format($product['price'], 0, '', ',') ?>đ</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <span class="text-danger">Không có sản phẩm nào</span>
                        </div>
                    <?php endif ?>

                </div>
                <!-- <div id="content"></div> -->
                <div class="product__pagination">
                    <!-- nut prev -->
                    <?php if ($current_page > 1 && $total_page > 1) : ?>
                        <?php if (isset($_GET['keyword'])) : ?>
                            <a href="<?= BASE_URL . 'san-pham?keyword=' . $_GET['keyword'] . '&trang=' . $current_page - 1 ?>"><i class=" fa fa-long-arrow-left"></i></a>
                        <?php elseif (isset($_GET['id-danhmuc'])) : ?>
                            <a href="<?= BASE_URL . 'san-pham?id-danhmuc=' . $_GET['id-danhmuc'] . '&trang=' . $current_page - 1 ?>"><i class=" fa fa-long-arrow-left"></i></a>

                        <?php else : ?>
                            <a href="<?= BASE_URL . 'san-pham?trang=' . $current_page - 1 ?>"><i class=" fa fa-long-arrow-left"></i></a>
                        <?php endif ?>
                    <?php endif ?>

                    <!-- phan trang -->
                    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                        <?php if ($i == $current_page) : ?>
                            <a disabled style="background-color: #7fad39; color: white"><?= $i ?></a>
                        <?php else : ?>
                            <?php if (isset($_GET['keyword'])) : ?>
                                <a href="<?= BASE_URL . 'san-pham?keyword=' . $_GET['keyword'] . '&trang=' . $i ?>"><?= $i ?></a>
                            <?php elseif (isset($_GET['id-danhmuc'])) : ?>
                                <a href="<?= BASE_URL . 'san-pham?id-danhmuc=' . $_GET['id-danhmuc'] . '&trang=' . $i ?>"><?= $i ?></a>

                            <?php else : ?>
                                <a href="<?= BASE_URL . 'san-pham?trang=' . $i ?>"><?= $i ?></a>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endfor ?>

                    <!-- nut next -->
                    <?php if ($current_page < $total_page && $total_page > 1) : ?>
                        <?php if (isset($_GET['keyword'])) : ?>
                            <a href="<?= BASE_URL . 'san-pham?keyword=' . $_GET['keyword'] . '&trang=' . $current_page + 1 ?>"><i class=" fa fa-long-arrow-right"></i></a>
                        <?php elseif (isset($_GET['id-danhmuc'])) : ?>
                            <a href="<?= BASE_URL . 'san-pham?id-danhmuc=' . $_GET['id-danhmuc'] . '&trang=' . $current_page + 1 ?>"><i class=" fa fa-long-arrow-right"></i></a>

                        <?php else : ?>
                            <a href="<?= BASE_URL . 'san-pham?trang=' . $current_page + 1 ?>"><i class=" fa fa-long-arrow-right"></i></a>

                        <?php endif ?> <?php endif ?>
                </div>
                <!-- <div id="content"></div> -->
            </div>
        </div>
    </div>
</section>
<!-- Form_option start -->
<?php include_once "./client/views/layouts/form_option.php" ?>
<!-- Form_option end -->

<?php include_once "./client/views/layouts/oder-jQuery.php" ?>