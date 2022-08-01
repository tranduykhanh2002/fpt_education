<?php

function cate_post_index()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "SELECT * from cate_post where name like '%$keyword%'";
    $cate_post = executeQuery($sql, true);
    // hiển thị view
    admin_render('cate_post/index.php', compact('cate_post', 'keyword'), 'admin-assets/custom/admin-global.js');
}

function cate_post_remove()
{
    $id = $_GET['id'];
    $sql1 = "DELETE from posts where cate_post = $id";
    pdo_execute($sql1);
    $sql = "DELETE from cate_post where id = $id";
    pdo_execute($sql);
    header("location: " . ADMIN_URL . 'danh-muc-bai-viet');
}

function cate_post_add_form()
{
    admin_render('cate_post/add-form.php', [], 'admin-assets/custom/admin-global.js');
}

function cate_post_save_add()
{
    $name = $_POST['name'];
    $created_at = date('y/m/d H:i:s');
    $show_menu = isset($_POST['show_menu']) ? 1 : 0;
    $sql = "INSERT into cate_post (name, show_menu,created_at) values ('$name', $show_menu,'$created_at')";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'danh-muc-bai-viet');
}
function cate_post_update()
{
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $update_at = date('y/m/d H:i:s');
        $cate_show_new = $_POST['show_menu'];
        $cate_name_new = $_POST['name'];
        $sql = "UPDATE cate_post SET name = '$cate_name_new', show_menu = '$cate_show_new', updated_at = '$update_at' WHERE id = '$id'";
        pdo_execute($sql);
        header("location: " . BASE_URL . "cp-admin/danh-muc-bai-viet");
    }
    admin_render('cate_post/cate_update.php');
}
//end 