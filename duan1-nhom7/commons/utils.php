<?php

const BASE_URL = "http://localhost/duan1-nhom7/";
const IMG_URL = BASE_URL . 'public/uploads/';
const ADMIN_URL = BASE_URL . 'cp-admin/';
const ADMIN_ASSET = BASE_URL . 'public/admin-assets/';
const CLIENT_ASSET = BASE_URL . 'public/client-assets/';

const ADMIN_ROLE = 5;
const STAFF_ROLE = 2;
date_default_timezone_set("Asia/Ho_Chi_Minh");

function dd()
{
    $data = func_get_args();
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

function client_render($view, $data = [])
{
    extract($data);
    $view = './client/views/' . $view;
    include_once "./client/views/layouts/main.php";
}

function admin_render($view, $data = [], $jsFile = null)
{
    extract($data);
    $view = './admin/views/' . $view;
    include_once "./admin/views/layouts/main.php";
}
function getFavoriteProducts()
{
    if (!isset($_SESSION['auth']) || $_SESSION['auth'] == null) {
        return false;
    }
    $userId = $_SESSION['auth']['id'];
    $getFavoriteProductQuery = "select * from favorite_products where user_id = $userId";
    $favoriteProducts = executeQuery($getFavoriteProductQuery, true);
    return $favoriteProducts;
}
function checkAuth($role = [])
{

    if (!isset($_SESSION['auth']) || $_SESSION['auth'] == null || $_SESSION['auth']['role'] == 1) {

        header('location: ' . BASE_URL);
        die;
    }
}
function checkAuth2()
{

    if ($_SESSION['auth']['role'] == 2) {

        header('location: ' . BASE_URL . 'cp-admin');
        die;
    }
}
