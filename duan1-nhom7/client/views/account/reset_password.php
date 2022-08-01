<section class="featured spad" style="background:#efefef;">
    <div class="container shadow p-3 mb-5 bg-body rounded " style="background:#fff">
        <h3 style="font-weight:bold;text-align: center;font-size: 24px;color:#0d713d;margin-bottom: 50px;padding-top: 70px;">Đặt lại mật khẩu</h3>
        <div class="align-middle" style="text-align:center;">
            <form class="w-75" style="display: inline-block;text-align: left;padding: 45px 250px;" action="<?= BASE_URL ?>tai-khoan/doi-mat-khau" method="post">

                <!-- Php -->
                <?php if (isset($_SESSION['false'])) { ?>
                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['false'] ?>
                    </div>
                <?php } elseif (isset($_SESSION['success'])) {  ?>
                    <div class='alert alert-success mb-3' role="alert">
                        <?= $_SESSION['success'] ?>
                    </div>
                <?php  } else { ?>
                    <div class='alert alert-primary mb-3' role="alert">Đổi mật khẩu tại đây</div>
                <?php } ?>
                <div class="form-group">
                    <input class="form-control mb-2" type="text" name="newpass" value placeholder="Nhập mật khẩu">
                    <input class="form-control" type="password" name="repass" value placeholder="Nhập lại mật khẩu">
                </div>


                <input style="margin-left:75px;margin-top:30px;background:#0d713d;" class="btn btn-success " type="submit" name="submit" value="Gửi">
                <button style="margin-top:30px;background:#0d713d;" class="btn btn-success " type="reset">Nhập Lại</button>
            </form>
        </div>
    </div>
</section>