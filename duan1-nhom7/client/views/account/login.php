<section class="featured spad" style="background:#efefef;">
    <div class="container shadow p-3 mb-5 bg-body rounded " style="background:#fff">
        <h3 style="font-weight:bold;text-align: center;font-size: 24px;color:#0d713d;margin-bottom: 50px;padding-top: 70px;">ĐĂNG NHẬP ĐỂ TRỞ THÀNH THÀNH VIÊN CỦA XIAO HAHA</h3>
        <div class="align-middle" style="text-align:center;">
            <form class="w-80" style="display: inline-block;text-align: left;padding: 45px 250px;" action="<?= BASE_URL . 'tai-khoan/luu-dang-nhap' ?>" method="post">
                <?php

                if (isset($_GET['null_account'])) {
                    $log_success = 'none';
                    $log_error = 'none';
                    $log_note = 'block';
                    $mesNote = "Hãy đăng nhập để đặt hàng nhé ";
                } else {
                    $log_success = 'none';
                    $log_error = 'none';
                    $log_note = 'none';
                }

                ?>
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Email <span1 style="color:red">(*)</span1> </label> </div>
                    <?php if (isset($_GET['email-err'])) : ?>
                        <p style="color: red;margin-bottom:2px"><?= $_GET['email-err']; ?></p>
                    <?php endif ?>
                    <input class="form-control " type="email" name="email" id="" value placeholder="Email">
                </div>
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Mật Khẩu <span1 style="color:red">(*)</span1> </label> </div>
                    <?php if (isset($_GET['password-err'])) : ?>
                        <p style="color: red;margin-bottom:2px"><?= $_GET['password-err']; ?></p>
                    <?php endif ?>
                    <input class="form-control  " type="password" name="password" value placeholder="Mật Khẩu">
                </div>
                <div style="display:flex;margin-top:10px">
                    <div style="margin-right:30px">
                        Quên mật khẩu? <a href="<?= BASE_URL ?>tai-khoan/quen-mat-khau" style="color: #0d713d; font-style: italic;"><strong>vào đây</strong></a></a>
                    </div>
                    <div>
                        Chưa có tài khoản? <a href="<?= BASE_URL ?>tai-khoan/dang-ky" style="color: #0d713d; font-style: italic;"><strong>đăng ký</strong></a></a>
                    </div>
                </div>
                <button style="background: #0d713d; font-style: ital;margin-left: 160px;margin-top: 20px;" type="submit" class="btn btn-success">Đăng Nhập</button>
            </form>
        </div>
    </div>
</section>
<!-- log mes -->
<?php include_once './client/views/layouts/log.php' ?>
<style>
</style>