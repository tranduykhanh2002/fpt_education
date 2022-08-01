<section class="featured spad" style="background:#efefef;">
    <div class="container shadow p-3 mb-5 bg-body rounded " style="background:#fff">
        <h3 style="font-weight:bold;text-align: center;font-size: 24px;color:#0d713d;margin-bottom: 50px;padding-top: 70px;">Nhập mã xác nhận</h3>
        <div class="align-middle" style="text-align:center;">
            <form class="w-75" style="display: inline-block;text-align: left;padding: 45px 250px;" action="<?= BASE_URL ?>tai-khoan/kiem-tra-ma" method="post">

                <!-- Php -->
                <?php if (isset($_SESSION['false'])) : ?>
                    <div class='alert alert-danger' role="alert">
                        <?= $_SESSION['false'] ?>
                    </div>
                <?php else :  ?>
                    <div class='alert alert-primary' role="alert">Nhập mã xác nhận chúng tôi đã gửi cho bạn về Email</div>
                <?php endif ?>
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Mã xác nhận </label> </div>
                    <input class="form-control " type="text" name="code" value placeholder="Nhập mã xác nhận">
                </div>


                <input style="margin-left:75px;margin-top:30px;background:#0d713d;" class="btn btn-success " type="submit" name="submit" value="Gửi">
                <button style="margin-top:30px;background:#0d713d;" class="btn btn-success " type="reset">Nhập Lại</button>
            </form>
        </div>
    </div>
</section>