<?php

function dashboard_index()
{
    $sql = "SELECT * from products";
    $listPro = executeQuery($sql, true);
    $totalProduct = count($listPro);

    $sql = "SELECT * from accounts where role = 1";
    $listCustomer = executeQuery($sql, true);
    $totalCustomer = count($listCustomer);

    $sql = "SELECT sum(revenue) as profit from statistical";
    $sum = executeQuery($sql);

    $totalProfit = $sum['profit'];
    admin_render(
        'dashboard/index.php',
        compact('totalProduct', 'totalCustomer', 'totalProfit')
    );
}
