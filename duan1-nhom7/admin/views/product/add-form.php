<?php
$getBDQuery = "SELECT * from categories";
$cates = executeQuery($getBDQuery, true);

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới sản phẩm</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'san-pham/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <?php if (isset($_GET['name-err'])) : ?>
                                <p style="color: red;margin-bottom:2px"><?= $_GET['name-err']; ?></p>
                            <?php endif ?>
                            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            <br>
                            <input style="width:600px" type="file" name="thumbnail" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <?php if (isset($_GET['price-err'])) : ?>
                                <p style="color: red;margin-bottom:2px"><?= $_GET['price-err']; ?></p>
                            <?php endif ?>
                            <input type="number" name="price" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Tên danh mục của sản phẩm</label> <br>
                            <select class="form-control" name="cate_id">
                                <?php foreach ($cates as $u => $c) : ?>
                                    <option class="form-control" value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="status" name="status" value="1" type="checkbox">
                                <label class="form-check-label" for="show_menu">Hiển thị sản phẩm ra menu</label>
                            </div>
                        </div>

                        <br>
                        <div class="">
                            <a href="<?= ADMIN_URL . 'san-pham' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>