<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= CLIENT_ASSET ?>img/banner/banner-top2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Blog</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= BASE_URL ?>trang-chu">Trang chủ</a>
                        <span>Tin Tức</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>Danh Mục </h4>
                        <ul>
                            <?php
                            $cate_posts = loadall_cate_post();
                            ?>
                            <?php foreach ($cate_posts as $cate) : ?>
                                <?php if ($cate['show_menu'] == 1) : ?>
                                    <li><a href="<?= BASE_URL . 'tin-tuc?id=' . $cate['id'] ?>"><?= $cate['name'] ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin Tức Mới</h4>
                        <?php $post_new = loadall_blog_new(); ?>
                        <?php foreach ($post_new as $p) : ?>
                            <div class="blog__sidebar__recent">
                                <a href="<?= BASE_URL . 'bai-viet?id=' . $p['id'] ?>" class="blog__sidebar__recent__item" style="margin-bottom:10px;">
                                    <div class="blog__sidebar__recent__item__pic" style="width:100px">
                                        <img src="<?= IMG_URL . $p['thumbnail'] ?>" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text" style="width:200px;">
                                        <h6><?= $p['name'] ?></h6>
                                        <span><?= $p['create_at'] ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php foreach ($posts as $post) : ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?= IMG_URL . $post['thumbnail'] ?>" alt="" style="width:360px; height:240px;">
                                </div>
                                <div class=" blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?= $post['create_at'] ?></li>
                                    </ul>
                                    <h5><a href="<?= BASE_URL . 'bai-viet?id=' . $post['id'] ?>"><?= $post['name'] ?></a></h5>
                                    <p><?= $post['summary'] ?></p>
                                    <a href="<?= BASE_URL . 'bai-viet?id=' . $post['id'] ?>" class="blog__btn">Xem Thêm<span class="arrow_right"></span></a>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="product__pagination">
                    <!-- nut prev -->
                    <?php if ($current_page > 1 && $total_page > 1) : ?>
                        <?php if (isset($_GET['id'])) : ?>
                            <a href="<?= BASE_URL . 'bai-viet?id=' . $_GET['id'] . '&trang=' . $current_page - 1 ?>"><i class=" fa fa-long-arrow-left"></i></a>
                        <?php else : ?>
                            <a href="<?= BASE_URL . 'bai-viet?trang=' . $current_page - 1 ?>"><i class=" fa fa-long-arrow-left"></i></a>
                        <?php endif ?>
                    <?php endif ?>

                    <!-- phan trang -->
                    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                        <?php if ($i == $current_page) : ?>
                            <a disabled style="background-color: #7fad39; color: white"><?= $i ?></a>
                        <?php else : ?>
                            <?php if (isset($_GET['id'])) : ?>
                                <a href="<?= BASE_URL . 'bai-viet?id=' . $_GET['id'] . '&trang=' . $i ?>"><?= $i ?></a>

                            <?php else : ?>
                                <a href="<?= BASE_URL . 'bai-viet?trang=' . $i ?>"><?= $i ?></a>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endfor ?>

                    <!-- nut next -->
                    <?php if ($current_page < $total_page && $total_page > 1) : ?>
                        <?php if (isset($_GET['id'])) : ?>
                            <a href="<?= BASE_URL . 'bai-viet?id=' . $_GET['id'] . '&trang=' . $current_page + 1 ?>"><i class=" fa fa-long-arrow-right"></i></a>
                        <?php else : ?>
                            <a href="<?= BASE_URL . 'bai-viet?trang=' . $current_page + 1 ?>"><i class=" fa fa-long-arrow-right"></i></a>
                        <?php endif ?> <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->