<?php
$getBDQuery = "SELECT * from categories";
$cates = executeQuery($getBDQuery, true);

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getUserQuery = "select * from products where id = $id";
$products =  executeQuery($getUserQuery, false);
if (!$products) {
    header('location:' . ADMIN_URL . 'san-pham');
    die;
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sửa sản phẩm</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'san-pham/luu-sua' ?>" method="post" enctype="multipart/form-data">
                    <div class="col-6 offset-3">

                        <input type="hidden" value="<?= $products['id'] ?>" name="id">

                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" value="<?= $products['name'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="">Ảnh</label>
                                <br>
                                <input style="width:600px; margin-bottom:20px" type="file" name="thumbnail" placeholder="" aria-describedby="helpId" >
                            </div>
                            <?php if ($products['thumbnail'] != "") : ?>
                                <div>
                                    <img src="<?= $products['thumbnail'] ?>" width="100px" height="100px">
                                </div>
                            <?php endif ?>

                        </div>

                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="number" name="price" value="<?= $products['price'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select name="cate_id" value="<?= $products['cate_id'] ?>" class="form-control" placeholder="" aria-describedby="helpId" >
                                <?php foreach ($cates as $u => $c) : ?>
                                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="status" name="status" value="1" type="checkbox">
                                <label class="form-check-label" for="status">Hiển thị sản phẩm ra menu</label>
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