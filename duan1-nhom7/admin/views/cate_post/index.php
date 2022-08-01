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
                        <th>STT</th>
                        <th>Tên danh mục bài viết</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật lần cuối</th>
                        <th>Hiển thị menu</th>
                        <th>
                            <a href="<?= ADMIN_URL . 'danh-muc-bai-viet/tao-moi' ?>" class="btn btn-sm btn-success">Tạo mới</a>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($cate_post as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['created_at'] ?></td>
                                <td><?= $item['updated_at'] ?></td>
                                <td><?= $item['show_menu'] == 1 ? "Có" : "Không" ?></td>
                                <td>
                                    <a href="<?= ADMIN_URL . 'danh-muc-bai-viet/cap-nhat?id=' . $item['id'] ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'danh-muc-bai-viet/xoa?id=' . $item['id'] ?>', '<?= $item['name'] ?>', 'danh mục')" class="btn btn-sm btn-danger">
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