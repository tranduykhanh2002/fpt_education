<?php
require_once './admin/business/revenue_statistics.php';
function myOrder($ma_kh)
{
    $sqlQuery = "select * from oder where user_id = $ma_kh ";
    $order = executeQuery($sqlQuery, true);
    client_render('order/index.php', compact('order'), 'admin-assets/custom/admin-global.js');
}

function OrderAll()
{
    $sqlQuery = "select * from oder order by id DESC";
    $order = executeQuery($sqlQuery, true);
    admin_render('order/index.php', compact('order'), 'admin-assets/custom/admin-global.js');
}

function OrderOneDetail($id)
{
    $sqlQuery = "SELECT * from oder where id = $id ";
    $order_detail = executeQuery($sqlQuery, true);
    admin_render('order/order_detail.php', compact('order_detail'), 'admin-assets/custom/admin-global.js');
}
function queryOrderDetail($idOrder)
{
    $sqlQuery = "select * from oder_item where order_id = $idOrder";
    $orderDetail = executeQuery($sqlQuery, true);
    return $orderDetail;
}

function queryCartId($idOrderDetail)
{
    $arr = array();
    for ($i = 0; $i < count($idOrderDetail); $i++) {
        $num = $idOrderDetail[$i]['cart_id'];
        $id = (int)$num;
        $sqlQuery = "select * from cart where id = $id";
        $cart = executeQuery($sqlQuery, true);
        $arr[] = $cart[0]['id'];
    }
    return $arr;
}

function quertycart($id)
{
    $sqlQuery = "select * from cart where id = $id";
    $cart = executeQuery($sqlQuery, true);
    return $cart;
}

function namePro($id)
{
    $sqlQuery = "select * from products where id = $id";
    $productName = executeQuery($sqlQuery, true);
    return $productName[0]['name'];
}


function ImagePro($id)
{
    $sqlQuery = "select * from products where id = $id";
    $productImage = executeQuery($sqlQuery, true);
    return $productImage[0]['thumbnail'];
}


function Cartoption($id)
{
    $sqlQuery = "select * from products_options where cart_id = $id";
    $result = executeQuery($sqlQuery, true);
    return $result;
}

function optionName($listop)
{
    $count = "";
    for ($i = 0; $i < count($listop); $i++) {
        $id = $listop[$i]['option_id'];
        $id = (int)$id;
        $sqlQuery = "select * from toppings where id = $id";
        $result = executeQuery($sqlQuery, true);
        $name = $result[0]['name'];
        $count .=  $name . '. ';
    }
    return $count;
}

function price($id)
{
    $sqlQuery = "select * from products where id = $id";
    $result = executeQuery($sqlQuery, true);
    return $result[0]['price'];
}

function option($listop)
{
    $count = 0;
    for ($i = 0; $i < count($listop); $i++) {
        $id = $listop[$i]['option_id'];
        $id = (int)$id;
        $sqlQuery = "select * from toppings where id = $id";
        $result = executeQuery($sqlQuery, true);
        $price = $result[0]['price'];
        $count += $price;
    }
    return $count;
}

function priceOption($id)
{
    $sqlQuery = "select * from products_options where cart_id = $id";
    $result = executeQuery($sqlQuery, true);
    if (count($result) > 0) {
        $total = 0;
        for ($i = 0; $i < count($result); $i++) {
            $total += $result[$i]['price_topping'];
        }
        return $total;
    }
}

function delOrder($oderId)
{
    $sqlQuery = "select * from oder_item where order_id = $oderId";
    $result = executeQuery($sqlQuery, true);
    for ($i = 0; $i < count($result); $i++) {
        $num = $result[$i]['cart_id'];
        $id = (int)$num;
        $del = "delete from products_options where cart_id = $id";
        executeQuery($del);
        $backCart = "Update cart set status = 1 where id = $id";
        executeQuery($backCart);
        $deloderItem = "delete from oder_item where cart_id = $id";
        executeQuery($deloderItem);
    }
    $delOder = "delete from oder where id = $oderId";
    executeQuery($delOder);
}

function updatestatusOrder($id, $status)
{
    $sqlQuery = "Update oder set status = $status where id = $id";
    executeQuery($sqlQuery, false);
}

function priceShip()
{
    $sqlQuery = "select * from price_ship";
    $priceShip = executeQuery($sqlQuery, true);
    return $priceShip[0]['price_ship'];
}

function updatepoints($id, $total)
{
    $sqll = "select * from points where user_id = $id";
    $result = executeQuery($sqll, false);
    $points = $result['points'];
    $points_up  = (10 / 100) * $total;
    $pointsNew = $points + $points_up;
    $sql = "UPDATE points set points = $pointsNew where user_id = $id";
    executeQuery($sql, false);
}

function getNameUseraOrder($id)
{
    $sqlQuery = "select * from accounts where id = $id";
    $user = executeQuery($sqlQuery, true);
    return $user;
}

function selectUserOrder($user)
{
    $role = $user[0]['role'];
    if ($role == 1) {
        return 'tai-khoan/khach-hang';
    } elseif ($role == 2) {
        return 'tai-khoan/nhan-vien';
    } else {
        return 'don-hang-chi-tiet?id=' . $_GET['id'];
    }
}

function queryFeedback($id)
{
    $sqlQuery = "select * from feedback_order where oder_id = $id order by id ASC ";
    $result = executeQuery($sqlQuery, true);
    return $result;
}
function getnameUser($id)
{
    $sqlQuery = "select * from accounts where id = $id ";
    $result = executeQuery($sqlQuery, true);
    return $result[0]['name'];
}
function queryOder($id)
{
    $sqlQuery = "select * from oder where id = $id";
    $result = executeQuery($sqlQuery, true);
    return $result[0]['user_id'];
}

function feedback($orDorId, $star, $comment, $feedback_by)
{
    $sql = "INSERT INTO feedback_order (oder_id,star,comment, feedback_by) values('$orDorId','$star','$comment', '$feedback_by')";
    executeQuery($sql);
}

function getNamefeedbBy($id)
{
    $sqlQuery = "select * from accounts where id = $id";
    $result = executeQuery($sqlQuery, true);
    return $result[0];
}
