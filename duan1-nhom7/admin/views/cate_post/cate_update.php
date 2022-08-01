<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (pdo_select("SELECT * FROM cate_post WHERE id = '$id'") as $key) {
        $name = $key['name'];
    }
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật danh mục</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'danh-muc-bai-viet/cap-nhat?id=' . $id ?>" method="post">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên danh mục bài viết</label>
                            <input type="text" name="name" class="form-control" value="<?= $name ?>" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" id="show_menu" name="show_menu" value="1" type="checkbox">
                                <label class="form-check-label" for="show_menu">Hiển thị menu</label>
                            </div>
                        </div>
                        <br>
                        <div class="">
                            <button type="submit" name="update" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>