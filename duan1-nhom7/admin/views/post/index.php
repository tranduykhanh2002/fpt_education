<?php
$getBDQuery = "SELECT * from cate_post";
$cate_post = executeQuery($getBDQuery, true);

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="" method="get" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control mr-2" placeholder="Tìm kiếm...">
                    </div>
                    <input class="btn btn-sm btn-outline-dark" type="submit" value="Tìm kiếm">
                </form>
            </div>
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th>ID</th>
                        <th>Tên Bài viết</th>
                        <th>Ảnh</th>
                        <th>Tóm tắt</th>
                        <th>Danh mục</th>
                        <th>Nội dung </th>
                        <th>Người viết</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian sửa</th>
                        <th>
                            <a href="<?= ADMIN_URL . 'bai-viet/tao-moi' ?>" class="btn btn-sm btn-success">Tạo mới</a>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($post as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td style="white-space: nowrap; max-width: 120px; overflow: hidden;text-overflow: ellipsis; " ><?= $item['name'] ?></td>
                                <td>
                                    <img style="display: block;max-width:70px;max-height:70px;width: auto;height: auto;" src="<?= IMG_URL . $item['thumbnail'] ?>">
                                </td>
                                <td style="white-space: nowrap; max-width: 120px; overflow: hidden;text-overflow: ellipsis; " ><?= $item['summary'] ?></td>
                                <td>
                                    <?php foreach ($cate_post as $u) : ?>
                                        <?php
                                        if ($u['id'] == $item['cate_post_id']) {
                                            echo $u['name'];
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </td>
                                <td style="white-space: nowrap; max-width: 120px; overflow: hidden;text-overflow: ellipsis; " ><?= $item['content'] ?></td>
                                <td style="white-space: nowrap; max-width: 120px; overflow: hidden;text-overflow: ellipsis; " ><?= $item['create_by'] ?></td>
                                <td><?= $item['create_at'] ?></td>
                                <td><?= $item['update_at'] ?></td>

                                <td>
                                    <a href="<?= ADMIN_URL . 'bai-viet/sua?id=' . $item['id'] ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'bai-viet/xoa?id=' . $item['id'] ?>', '<?= $item['name'] ?>','bài viết tên:')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>