<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ngày gửi</th>
                        <th>Ngày phản hồi</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </thead>
                    <tbody>
                        <?php foreach ($feed_back as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['create_at'] ?></td>
                                <td><?= $item['feedback_at'] ?></td>
                                <td><textarea disabled rows="2" cols="30" name="comment" form="usrform"><?= $item['message'] ?></textarea></td>
                                <?php if ($item['active'] == 1) { ?>
                                    <td>
                                        <?php echo "<p style = 'color: red;'>Chưa phản hồi</p>" ?>
                                    </td>
                                <?php } elseif ($item['active'] == 2) { ?>
                                    <td>
                                        <?php echo "<p style = 'color: #00F320;'>Đã phản hồi</p>" ?>
                                    </td>
                                <?php } ?>
                                <td>
                                    <a href="<?= ADMIN_URL . 'phan-hoi-user?id=' . $item['id'] ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:;" onclick="confirm_remove('<?= ADMIN_URL . 'phan-hoi-xoa?id=' . $item['id'] ?>', '<?= $item['name'] ?>','phản hồi của:')" class="btn btn-sm btn-danger">
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