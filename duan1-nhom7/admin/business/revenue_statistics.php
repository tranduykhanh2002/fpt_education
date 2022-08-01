<?php

use Carbon\Carbon;

function statistics()
{

    header('Content-Type: application/json');

    if (isset($_POST['day']) && $_POST['day'] != null) {
        if ($_POST['day'] === '7days') {
            $time = 7;
        } elseif ($_POST['day'] === '28days') {
            // dd($_POST['day']);
            $time = 28;
        } elseif ($_POST['day'] === '90days') {
            $time = 90;
        } elseif ($_POST['day'] === '365days') {
            $time = 365;
        }
    } else {
        $time = 365;
    }
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays($time)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();


    $sql = "SELECT * from statistical where order_date between '$subdays' and '$now' order by order_date";
    $revenueStatistics = executeQuery($sql, true);

    $data = array();
    foreach ($revenueStatistics as $item) {
        $data[] = $item;
    }
    echo json_encode($data);
}

//cập nhật ngày thành công
function updateDoneAt($id)
{
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sqlQuery = "UPDATE oder set done_at = '$now' where id = $id";
    executeQuery($sqlQuery, false);
    $listStatistical = getStatistiscById($now);

    $recordById =  getRecordById($id);

    $revenue = 0;
    $order = 0;
    if ($listStatistical && isset($listStatistical)) {
        $revenue = $recordById['total'] + $listStatistical['revenue'];
        $order = $listStatistical['order'] + 1;

        $sql = "UPDATE statistical set `revenue` = '$revenue', `order` = '$order' where order_date = '$now'";
        // dd($sql);
        executeQuery($sql);
    } else {
        $revenue = $recordById['total'];
        $order = $order + 1;
        $sql = "INSERT into statistical (`order_date`, `revenue`, `order`) values ('$now', '$revenue', '$order')";
        executeQuery($sql);
    }
}
function getRecordById($id)
{
    $sql = "SELECT * from oder where id = $id";

    return executeQuery($sql);
}
function getStatistiscById($now)
{
    $sql = "SELECT * from statistical where order_date = '$now'";
    return executeQuery($sql);
}
