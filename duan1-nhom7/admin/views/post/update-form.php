<?php
$getBDQuery = "SELECT * from cate_post";
$cate_post = executeQuery($getBDQuery, true);

$id = isset($_GET['id']) ? $_GET['id'] : -1;
$getUserQuery = "select * from posts where id = $id";
$post =  executeQuery($getUserQuery, false);
if (!$post) {
    header('location:' . ADMIN_URL . 'bai-viet');
    die;
}
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sửa bài viết</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'bai-viet/luu-sua' ?>" method="post" enctype="multipart/form-data">
                    <div class="col-6 offset-3">
                        <input type="hidden" value="<?= $post['id'] ?>" name="id">

                        <div class="form-group">
                            <label for="">Tên bài viết</label>
                            <input type="text" name="name" value="<?= $post['name'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="">Ảnh</label>
                                <br>
                                <input style="width:600px; margin-bottom:20px" type="file" name="thumbnail" placeholder="" aria-describedby="helpId" >
                            </div>
                            <?php if ($post['thumbnail'] != "") : ?>
                                <div>
                                    <img src="<?= BASE_URL.'public/uploads/'. $post['thumbnail'] ?>" width="100px" height="100px">
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <label for="">Tóm tắt</label>
                           <textarea name="summary" id="" cols="30" rows="10" class="form-control" placeholder="" aria-describedby="helpId"><?=$post['summary']?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Danh mục</label>
                            <select name="cate_post_id" value="<?= $post['cate_post_id'] ?>" class="form-control" placeholder="" aria-describedby="helpId" >
                                <?php foreach ($cate_post as $u => $c) : ?>
                                    <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nội dung</label>
                           <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="" aria-describedby="helpId"><?=$post['content']?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Người viết</label>
                            <input type="text" name="create_by" value="<?= $post['create_by'] ?>" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <br>
                        <div class="">
                            <a href="<?= ADMIN_URL . 'bai_viet' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>