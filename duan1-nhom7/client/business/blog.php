<?php


function blog()
{
    $sql = "SELECT * FROM posts";
    $records = executeQuery($sql, true);
    $total_records = count($records);
    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $limit = 4;
    $total_page = ceil($total_records / $limit);  //tinh tong so trang
    $start = ($current_page - 1) * $limit;

    $sqls = "SELECT * FROM posts  limit $start, $limit";
    $posts = executeQuery($sqls, true);
    client_render('blog/index.php', compact('posts', 'total_records', 'current_page', 'total_page'));
}
function loadone_blog($id)
{
    $sqls = "SELECT * FROM posts where id = '$id'";
    $post = executeQuery($sqls, true);
    client_render('blog/blog.php', compact('post'));
}
function loadall_blog_new()
{
    $sqls = "SELECT * FROM posts where 1 order by id desc limit 0,03 ";
    $post_new = executeQuery($sqls, true);
    return $post_new;
}
function loadall_cate_post()
{
    $sql = "SELECT * FROM cate_post";
    $cate_posts = executeQuery($sql, true);
    return $cate_posts;
}
function load_post_by_cate($cate_post_id = 0)
{
    $sql = "SELECT * FROM posts where cate_post_id = '$cate_post_id'";
    $records = executeQuery($sql, true);
    $total_records = count($records);
    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $limit = 4;
    $total_page = ceil($total_records / $limit);  //tinh tong so trang
    $start = ($current_page - 1) * $limit;

    $sqls = "SELECT * FROM posts where cate_post_id = '$cate_post_id'  limit $start, $limit";
    $posts = executeQuery($sqls, true);
    client_render('blog/index.php', compact('posts', 'total_records', 'current_page', 'total_page'));
}
