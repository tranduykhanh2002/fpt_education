<?php
$getBDQuery = "SELECT * from categories";
$cates = executeQuery($getBDQuery, true);
unset($_SESSION['role']);
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
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Số lượt thích</th>
                        <th>Hiển thị </th>
                        <th>Danh mục</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian sửa</th>
                        <th>
                            <a href="<?= ADMIN_URL . 'san-pham/tao-moi' ?>" class="btn btn-sm btn-success">Tạo mới</a>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $item['name'] ?></td>
                                <td>
                                    <img style="display: block;max-width:70px;max-height:70px;width: auto;height: auto;" src="<?= IMG_URL . $item['thumbnail'] ?>">
                                </td>
                                <td><?= number_format($item['price'], 0, '', ',') ?></td>
                                <td><?= $item['favorites'] ?></td>
                                <td><?= $item['status'] == 1 ? "Có" : "Không" ?></td>
                                <td>
                                    <?php foreach ($cates as $u) : ?>
                                        <?php
                                        if ($u['id'] == $item['cate_id']) {
                                            echo $u['name'];
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $item['create_at'] ?></td>
                                <td><?= $item['update_at'] ?></td>

                                <td>
                                    <a href="<?= ADMIN_URL . 'san-pham/sua?id=' . $item['id'] ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'san-pham/xoa?id=' . $item['id'] ?>', '<?= $item['name'] ?>','sản phẩm tên:')" class="btn btn-sm btn-danger">
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