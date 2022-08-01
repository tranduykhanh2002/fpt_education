<footer class="footer spad" style="padding-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="<?= BASE_URL ?>trang-chu"><img src="<?= CLIENT_ASSET ?>img/logo.png" alt=""></a>
                    </div>
                    <?php foreach (pdo_select("SELECT * FROM contact") as $items) { ?>
                        <ul>
                            <li><?php echo $items['address'] ?></li>
                            <li><?php echo $items['phone'] ?></li>
                            <li><?php echo $items['email'] ?></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 mt-5 pl-5">
                <div class="footer__widget">
                    <h6>Liên kết hữu ích</h6>
                    <ul>
                        <li><a href="#">Về chúng tôi</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mt-5">
                <div class="footer__widget">
                    <h6>Đăng kí nhận thông báo mới nhất</h6>
                    <p>Nhập Email của bạn để nhận những khuyến mãi sớm nhất của chúng tôi.</p>
                    <form action="#">
                        <input type="text" placeholder="Nhập email của bạn">
                        <button type="submit" class="site-btn">Đăng kí</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="https://www.facebook.com/Xiao-HaHa-111735664678169" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/xiaohaha.adm/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://twitter.com/xiao_haha_adm" target="_blank"><i class=" fa
                            fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img src="<?= CLIENT_ASSET ?>img/payment-item.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- <script lang="javascript">var __vnp = {code : 9927,key:'', secret : '6066e45e736f2c9c810db8f3465ad816'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//core.vchat.vn/code/tracking.js';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script> -->