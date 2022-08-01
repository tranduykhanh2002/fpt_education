<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= CLIENT_ASSET ?>img/banner/banner-top2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Liên Hệ</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= BASE_URL . 'trang-chu' ?>">Trang Chủ</a>
                        <span>Liên Hệ Với Chúng Tôi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <?php foreach (pdo_select("SELECT * FROM contact LIMIT 1") as $items) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Số Điện Thoại</h4>
                        <p><?php echo $items['phone'] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa Chỉ</h4>
                        <p><?php echo $items['address'] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Thời Gian Bán Hàng</h4>
                        <p><?php echo $items['time_open'] ?> to <?php echo $items['time_close'] ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p><?php echo $items['email'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<!-- Map Begin -->
<div class="map">
    <?php foreach (pdo_select("SELECT * FROM contact LIMIT 1") as $items) { ?>
        <?php echo $items['map'] ?>
    <?php } ?>
</div>
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                    <?php if (isset($_SESSION['success'])) { ?>
                        <div class='alert alert-success mb-3' role="alert">
                            <?= $_SESSION['success'] ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <form action="<?= BASE_URL . 'phan-hoi' ?>" method="post">
            <div class="row" style="height: 250px;">
                <div class="col-6" style="height: 100%;">
                    <div class="col-lg-12 col-md-12">
                        <input required name="name" type="text" placeholder="Tên của bạn">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <input required name="email" type="email" placeholder="Email của bạn">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <input name="phone" type="tel" pattern=[0-9]{1,10} placeholder="Số điện thoại của bạn">
                        <?php if (isset($_SESSION['false_number'])) { ?>

                            <div class='mb-3 text-danger ml-3' role="alert">
                                <?= $_SESSION['false_number'] ?>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="col-6" style="height: 100%;">
                    <div class="col-lg-12 text-center">
                        <textarea style="height: 210px;" required name="message" placeholder="Nội dung"></textarea>
                    </div>

                </div>
                <div class="col-lg-12 text-center">
                    <button id="pn-1" type="submit" class="btn btn-success site-btn">GỬI</button>
                </div>
            </div>
        </form>
    </div>
</div>