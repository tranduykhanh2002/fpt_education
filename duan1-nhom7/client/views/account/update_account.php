<?php
if (isset($_GET['id']) && ($_GET['id'])) {
    $id = $_GET['id'];
    foreach (pdo_select("SELECT * FROM accounts WHERE id = '$id'") as $rows) {
        $name =  isset($rows['name']) ? $rows['name'] : '';
        $email = isset($rows['email']) ? $rows['email'] : '';
        $avatar = isset($rows['avatar']) ? $rows['avatar'] : '';
        $phone = isset($rows['phone']) ? $rows['phone'] : '';
    }
}
?>
<section class="featured spad" style="background:#efefef;">
    <div class="container shadow p-3 mb-5 bg-body rounded " style="background:#fff">
        <h3
            style="font-weight:bold;text-align: center;font-size: 24px;color:#0d713d;margin-bottom: 50px;padding-top: 70px;">
            Thông Tin Tài Khoản: <?= $name ?></h3>
        <div class="align-middle" style="text-align:center;">
            <form class="w-80" style="display: inline-block;text-align: left;padding: 45px 250px;"
                action="<?= BASE_URL . 'tai-khoan/cap-nhat?id=' . $id ?>" method="post" enctype="multipart/form-data">
                <div style="max-width: 575px; text-align: center; margin:0 auto;" class="p-4">
                </div>
                <img id="avatar" src="<?= IMG_URL . $avatar ?>" class="" alt="ảnh đại diện" width="150" height="150"
                    style="object-fit: cover;margin-left: 100px; margin-top: -120px;border-radius: 50%;">
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Tên tài khoản</label> </div>
                    <input class="form-control  " type="text" name="name" value="<?= $name ?>">
                    <?php if (isset($_SESSION['false_empty_name'])) { ?>
                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['false_empty_name'] ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Email </label> </div>

                    <input class="form-control " type="email" name="email" id="" value="<?= $email ?>">

                    <?php if (isset($_SESSION['empty_email'])) { ?>

                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['empty_email'] ?>
                    </div>

                    <?php } ?>

                    <?php if (isset($_SESSION['false_email'])) { ?>

                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['false_email'] ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Số điện thoại </label> </div>

                    <input class="form-control" type="tel" name="phone" value="<?= $phone ?>" pattern=[0-9]{1,10} title="Chỉ được nhập số" >

                    <?php if (isset($_SESSION['false_phone'])) { ?>

                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['false_phone'] ?>
                    </div>

                    <?php } ?>

                    <?php if (isset($_SESSION['false_number'])) { ?>

                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['false_number'] ?>
                    </div>

                    <?php } ?>

                    <?php if (isset($_SESSION['false_empty_phone'])) { ?>

                    <div class='alert alert-danger mb-3' role="alert">
                        <?= $_SESSION['false_empty_phone'] ?>
                    </div>

                    <?php } ?>
                </div>
                <div class="form-group">
                    <div> <label style="font-weight: bold" for="">Tải ảnh lên </label> </div>
                    <input id="img" class="control  " type="file" name="image" onchange="changeImg(this)">
                </div>
                <input style="background-color: #0d713d;font-style: ital; color: #ffff;" type="submit" value="Cập nhật"
                    name="update" class="form-control" id="exampleFormControlInput1">
            </form>
        </div>
    </div>
</section>
<script src="../../../public/client-assets/js/jquery.wmuSlider.js"></script>
<script>
$('.example1').wmuSlider();

function changeImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
    $('#avatar').click(function() {
        $('#img').click();
    });
});
</script>