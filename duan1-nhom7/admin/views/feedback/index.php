<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <table class="table tabl-stripped">
                    <thead>
                        <th class="col-2">Người phản hồi </th>
                        <th class="col-2">Sao</th>
                        <th class="col-6">Nội dung</th>
                        <th style="text-align:right;" class="col-3"></th>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($feedback); $i++) {
                            $check = checkFeedB($feedback[$i]['feedback_by']);
                            // dd($check['role']);
                            if ($check['role'] != '1') {
                                continue;
                            }
                        ?>
                            <tr>

                                <td>
                                    <?= $check['name'] ?>
                                </td>
                                <td id="price">
                                    <?php for ($j = 0; $j < $feedback[$i]['star']; $j++) {
                                    ?>
                                        <i style="color: #ffa400;" class="fas fa-star"></i>
                                    <?php
                                    } ?>
                                </td>
                                <td id="price">
                                    <?= $feedback[$i]['comment'] ?>
                                </td>
                                <td class="">
                                    <a class="btn btn-sm btn-success" href="don-hang-chi-tiet?id=<?= $feedback[$i]['oder_id'] ?>">Hồi đáp </a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>