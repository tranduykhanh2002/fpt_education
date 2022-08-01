<?php
$getBDQuery = "SELECT * from cate_post";
$cate_post = executeQuery($getBDQuery, true);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới bài viết</h3>
            </div>
            <div class="card-body">
                <form action="<?= ADMIN_URL . 'bai-viet/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label for="">Tên bài viết</label>
                            <?php if (isset($_GET['name-err'])) : ?>
                                <p style="color: red;margin-bottom:2px"><?= $_GET['name-err']; ?></p>
                            <?php endif ?>
                            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <br>
                            <input style="width:600px" type="file" name="thumbnail" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Tóm tắt</label>
                            <?php if (isset($_GET['summary-err'])) : ?>
                                <p style="color: red;margin-bottom:2px"><?= $_GET['summary-err']; ?></p>
                            <?php endif ?>
                            <textarea name="summary" id="" cols="30" rows="10" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Danh mục</label> <br>
                            <select class="form-control" name="cate_post_id">
                                <?php foreach ($cate_post as $u => $c) : ?>
                                    <option class="form-control" value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <?php if (isset($_GET['content-err'])) : ?>
                                <p style="color: red;margin-bottom:2px"><?= $_GET['content-err']; ?></p>
                            <?php endif ?>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                        </div>

                        <div class="form-group">
                           <label for="">Người viết</label>
                            <?php if (isset($_GET['create_by-err'])) : ?>
                                <p style="color: red;margin-bottom:2px"><?= $_GET['create_by-err']; ?></p>
                            <?php endif ?>
                            <input type="text" name="create_by" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <br>
                        <div class="">
                            <a href="<?= ADMIN_URL . 'bai-viet' ?>" class="btn btn-sm btn-danger">Hủy</a>
                            &nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>