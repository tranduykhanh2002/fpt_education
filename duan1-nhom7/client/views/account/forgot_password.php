<section class="featured spad" style="background:#efefef;">
    <div class="container shadow p-3 mb-5 bg-body rounded " style="background:#fff">
        <h3 style="font-weight:bold;text-align: center;font-size: 24px;color:#0d713d;margin-bottom: 50px;padding-top: 70px;">Quên mật khẩu</h3>
        <div class="align-middle" style="text-align:center;">
            <form class="w-75" style="display: inline-block;text-align: left;padding: 45px 250px;" action="<?= BASE_URL ?>tai-khoan/quen-mat-khau" method="post">
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Email</label> </div>

                    <?php if (isset($_SESSION['false'])) { ?>
                        <span class='text-danger'><?= $_SESSION['false'] ?></span>

                    <?php } ?>
                    <input class="form-control " type="email" name="email" id="" value placeholder="Nhập email của bạn">
                </div>


                <input style="margin-left:75px;margin-top:30px;background:#0d713d;" class="btn btn-success " type="submit" name="submit" value="Gửi yêu cầu">
                <button style="margin-top:30px;background:#0d713d;" class="btn btn-success " type="reset">Nhập Lại</button>
            </form>
        </div>
    </div>
</section>