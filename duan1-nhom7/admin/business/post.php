<?php
function post_index()
{

    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "SELECT * from posts where name like '%$keyword%'";
    $post = executeQuery($sql, true);
    $keyword = '';
    // hiển thị view
    admin_render('post/index.php', compact('post', 'keyword'), 'admin-assets/custom/admin-global.js');
}

function post_remove()
{

    $id = $_GET['id'];
    $sql = "DELETE from posts where id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'bai-viet');
}
function post_add_form()
{

    admin_render('post/add-form.php', [], 'admin-assets/custom/admin-global.js');
}
function post_save_add()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $create_at = date(" Y-m-d H:i:s ");

    $name = $_POST['name'];
    $thumbnail = $_FILES['thumbnail'];
    $summary = $_POST['summary'];
    $cate_post_id = $_POST['cate_post_id'];
    $content = $_POST['content'];
    $create_by = $_POST['create_by'];
    $filename = "";

    $errors = "";
    $getProducts = "SELECT * FROM posts WHERE name = '$name'";
    $post = executeQuery($getProducts, false);
    if (empty($name)) {
        $errors .= "name-err=Hãy nhập tên bài viết&";
    } else if ($name == $post['name']) {
        $errors .= "name-err=Tên bài viết đã có vui lòng chọn tên khác&";
    }
    if (empty($summary)) {
        $errors .= "summary-err=Hãy nhập tóm tắt về bài viết&";
    }
    if (empty($content)) {
        $errors .= "content-err=Hãy nhập giá tóm tắt về bài viết&";
    }
    if (empty($create_by)) {
        $errors .= "create_by-err=Hãy nhập tên người viết&";
    }
    $errors = rtrim($errors, '&');
    if (strlen($errors) > 0) {
        header('location:' . ADMIN_URL . 'bai-viet/tao-moi' . '?' . $errors);
        die;
    }

    if ($thumbnail['size'] > 0) {
        $filename = uniqid() . '-' . $thumbnail['name'];
        move_uploaded_file($thumbnail['tmp_name'], './public/uploads/' . $filename);
    }

    $sql = "INSERT into posts (name, thumbnail ,summary, cate_post_id, content, create_by, create_at) values ('$name','$filename', '$summary', '$cate_post_id', '$content', '$create_by', '$create_at')";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'bai-viet');
}
function post_fix()
{

    admin_render('post/update-form.php', [], 'admin-assets/custom/admin-global.js');
}

function post_save_fix()
{

    $id = $_POST['id'];
    $getUserQuery = "select * from posts where id = $id";
    $post = executeQuery($getUserQuery, false);
    if (!$post) {
        header('location' . ADMIN_URL . 'bai-viet' . '?msg' . 'sản phẩm không tồn tại');
        die;
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $update_at = date(" Y-m-d H:i:s ");
    $name = $_POST['name'];
    $summary = $_POST['summary'];
    $cate_post_id = $_POST['cate_post_id'];
    $content = $_POST['content'];
    $create_by = $_POST['create_by'];
    $imageValue = $post['thumbnail'];
    $thumbnail = $_FILES['thumbnail'];

    if ($thumbnail['size'] > 0) {
        $imageValue = uniqid() . '-' . $thumbnail['name'];
        move_uploaded_file($thumbnail['tmp_name'], './public/uploads/' . $imageValue);
    }

    $updateUserQuery = "update posts
                    set     name = '$name',
                            thumbnail = '$imageValue',
                            summary = '$summary',
                            cate_post_id = '$cate_post_id',
                            content = '$content',
                            create_by = '$create_by',
                            update_at = '$update_at'
                    where id = $id";
    executeQuery($updateUserQuery);
    header('location:' . ADMIN_URL . 'bai-viet');
}
