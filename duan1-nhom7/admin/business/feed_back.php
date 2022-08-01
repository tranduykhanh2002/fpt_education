<?php
function feed_back_index()
{
    $sql = "SELECT * from feedback";
    $feed_back = executeQuery($sql, true);
    admin_render('feed_back/index.php', compact('feed_back', ), 'admin-assets/custom/admin-global.js');
}

function feed_back_update()
{
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $active_new = $_POST['active'];
        $feed_back_at = date('Y/m/d');
        $sql = "UPDATE feedback SET active = '$active_new', feedback_at = '$feed_back_at' WHERE id = '$id'";
        pdo_execute($sql);
        header("location: " . BASE_URL . "cp-admin/phan-hoi");
    }
    admin_render('feed_back/feed_back_update.php');
}

function feed_back_delete()
{
    $id = $_GET['id'];
    $sql = "DELETE FROM feedback WHERE id = $id";
    pdo_execute($sql);
    header("location: " . ADMIN_URL . 'phan-hoi');
}