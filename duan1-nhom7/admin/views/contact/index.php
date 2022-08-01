<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th>STT</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Giờ mở cửa</th>
                        <th>Giờ đóng cửa</th>
                        <th>Bản đồ</th>
                    </thead>
                    <tbody>
                        <?php foreach ($contact as $index => $item): ?>
                            <tr>
                                <td><?=$index + 1?></td>
                                <td><?=$item['address']?></td>
                                <td><?=$item['phone']?></td>
                                <td><?=$item['email']?></td>
                                <td><?=$item['time_open']?></td>
                                <td><?=$item['time_close']?></td>
                                <td><textarea rows="4" cols="50" name="comment" form="usrform"><?=$item['map']?></textarea></td>
                                <td>
                                    <a href="<?=ADMIN_URL . 'lien-he/cap-nhat?id=' . $item['id']?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>