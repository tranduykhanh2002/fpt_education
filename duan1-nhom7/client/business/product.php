<?php
// require './dao/system_dao.php';
function list_product()
{
    client_render('product/index.php');
}
// function search_product()
// {
//     $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
//     // var_dump($keyword);
//     $sql = "SELECT * FROM products where name like '%$keyword%' limit 9";
//     $products = executeQuery($sql, true);
//     client_render('product/index.php', compact('keyword', 'products'));
// }
function product_index()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

    $sql = "SELECT * FROM products where name like '%$keyword%'";
    $records = executeQuery($sql, true);
    $total_records = count($records);
    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $limit = 9;
    $total_page = ceil($total_records / $limit);  //tinh tong so trang
    $start = ($current_page - 1) * $limit;

    $sqls = "SELECT * FROM products where name like '%$keyword%'  limit $start, $limit";

    $products = executeQuery($sqls, true);
    client_render('product/index.php', compact('products', 'total_records', 'current_page', 'total_page'));

    // dd($total_page);
}
function loadall_product_by_categories($cate_id = 0)
{
    // $sql = "SELECT * FROM products where 1 ";
    // if ($cate_id > 0) {
    //     $sql .= " and cate_id LIKE '" . $cate_id . "'";
    // }
    // $sql .= " order by id desc";
    $sql = "SELECT * FROM products where cate_id = '$cate_id'";
    $records = executeQuery($sql, true);
    $total_records = count($records);
    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $limit = 9;
    $total_page = ceil($total_records / $limit);  //tinh tong so trang
    $start = ($current_page - 1) * $limit;

    $sqls = "SELECT * FROM products where cate_id = '$cate_id'  limit $start, $limit";
    $products = executeQuery($sqls, true);
    client_render('product/index.php', compact('products', 'total_records', 'current_page', 'total_page'));
}


function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM products where 1 order by favorites desc limit 0,7 ";
    $top10 = pdo_query($sql);
    return $top10;
}
function load_ten_dm($cate_id)
{
    $sql = "SELECT *  FROM categories where id=" . $cate_id;
    $dm = pdo_query_one($sql);
    extract($dm);
    return $name;
}
function favorite_product()
{
    $id = $_GET['id'];
    // ktra xem đã được yêu thích sản phẩm này hay chưa 
    $userId = $_SESSION['auth']['id'];
    $checkFavoriteProduct = "select * from favorite_products where user_id = $userId and product_id = $id";
    $favorite = executeQuery($checkFavoriteProduct, false);
    // nếu chưa có thì lưu vào db
    if (!$favorite) {
        $currentTime = date("Y-m-d H:i:s");
        $addFavoriteQuery = "insert into favorite_products 
                                (user_id, product_id, created_at)
                            values 
                                ('$userId', '$id', '$currentTime')";
        executeQuery($addFavoriteQuery);
        $sqlQuery = "UPDATE  products set  favorites = favorites + 1 where id = $id";
        executeQuery($sqlQuery);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
function list_size()
{
    $sqlQuery = "SELECT * from size";
    $sizes = executeQuery($sqlQuery, true);
    return $sizes;
}

function list_topping()
{
    $sqlQuery = "SELECT * from toppings";
    $topping = executeQuery($sqlQuery, true);
    return $topping;
}

function loadall_product_like()
{
    $id = $_SESSION['auth']['id'];
    $sql = "SELECT * FROM favorite_products where user_id = $id";
    $product_like = executeQuery($sql, true);
    return $product_like;
}
function getProByid($id)
{
    $sql = "SELECT * FROM products where id = $id";
    $product_like = executeQuery($sql, true);
    return $product_like;
}
function product_like()
{
    client_render('product_like/index.php');
}
function loadall_product_favorite_by_product_favorite()
{
    $sql = "SELECT * FROM products";
    $favorite_product = executeQuery($sql, true);
    return $favorite_product;
}
function delete_product_favorite()
{
    $product_id = $_GET['product_id'];
    $sql = "DELETE from favorite_products where product_id = $product_id";

    executeQuery($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
function del_product_favorite()
{
    $product_id = $_GET['productId'];
    $userId = $_SESSION['auth']['id'];
    $sql = "DELETE from favorite_products where user_id = $userId and  product_id = $product_id";
    executeQuery($sql);
}
function check_favorite_product($id)
{
    $userId = $_SESSION['auth']['id'];
    $sql = "select * from favorite_products where user_id = $userId and product_id = $id";
    $result = executeQuery($sql, true);
    if (count($result) > 0) {
        return 'none';
    }
}
function check_favorite_pro($id)
{
    $userId = $_SESSION['auth']['id'];
    $sql = "select * from favorite_products where user_id = $userId and product_id = $id";
    $result = executeQuery($sql, true);
    if (count($result) == null) {
        return 'none';
    }
}

function creat_car($userId, $quantity, $size, $productID, $sugar, $ice)
{
    $sql = " INSERT into cart ( user_id, quantity, product_size, product_id, sugar, ice ) values ('$userId', '$quantity', '$size', '$productID', '$sugar', '$ice') ";
    $cart_id = returnId($sql);
    return $cart_id;
}
function product_optino($cart_id, $optionIds)
{
    $numid = (int)$cart_id;
    for ($i = 0; $i < count($optionIds); $i++) {
        $optionId = (int)$optionIds[$i];
        $price = getPriceOptoion($optionId);
        $sql = "INSERT into products_options (cart_id, option_id, price_topping) values ($numid, $optionId, '$price')";
        executeQuery($sql, false);
    }
}
