<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật trang liên hệ</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'lien-he/cap-nhat?id=' . $id ?>" method="post">
                   <?php foreach (pdo_select("SELECT * FROM contact WHERE id = '$id'") as $key) { ?>
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input required type="text" name="phone" class="form-control" value="<?php echo $key['phone'] ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input required type="text" name="email" class="form-control" value="<?php echo $key['email'] ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input required type="text" name="address" class="form-control" value="<?php echo $key['address'] ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Giờ mở cửa</label>
                            <input required type="text" name="time_open" class="form-control" value="<?php echo $key['time_open'] ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Giờ đóng cửa</label>
                            <input required type="text" name="time_close" class="form-control" value="<?php echo $key['time_close'] ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Bản đồ</label>
                            
                            <textarea required type="text" name="map" class="form-control"><?php echo $key['map'] ?></textarea>
                        </div>
                        <br>
                        <div class="">
                            <button type="submit" name="update" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                  <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>