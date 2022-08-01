<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trạng thái phản hồi</h3>
            </div>
            <div class="card-body">
                <form action="<?=ADMIN_URL . 'phan-hoi-user?id=' . $id?>" method="post">
                    <?php foreach (pdo_select("SELECT active FROM feedback WHERE id = '$id'") as $key) {?>
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Trạng thái</label> <br>
                            <select name="active" class=" col-3 browser-default custom-select">
                                <option value="1">Chưa phản hồi</option>
                                <option value="2">Đã phản hồi</option>
                            </select>
                        </div>
                        <br>
                        <div class="mt-4">
                            <button type="submit" name="update" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
</div>