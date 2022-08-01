<?php

function renderAll()
{
    $sqlQuery = "SELECT * from feedback_order order by id DESC";
    $feedback = executeQuery($sqlQuery, true);
    admin_render('feedback/index.php', compact('feedback'), 'admin-assets/custom/admin-global.js');
}


function checkFeedB($id)
{
    $sqlQuery = "SELECT * from accounts where id = $id";
    $result = executeQuery($sqlQuery, false);
    return $result;
}
