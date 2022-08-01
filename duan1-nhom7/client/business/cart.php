<?php
function myCart($ma_kh)
{
    $sqlQuery = "SELECT * from cart where user_id = $ma_kh and status = 1";
    $carts = executeQuery($sqlQuery, true);
    client_render('cart/index.php', compact('carts'), 'admin-assets/custom/admin-global.js');
}

function getNamePro($id)
{
    $sqlQuery = "select * from products where id = $id";
    $productName = executeQuery($sqlQuery, true);
    return $productName[0]['name'];
}


function getImagePro($id)
{
    $sqlQuery = "select * from products where id = $id";
    $productImage = executeQuery($sqlQuery, true);
    return $productImage[0]['thumbnail'];
}

function del($id)
{
    $sql = "DELETE from products_options where cart_id = $id";
    executeQuery($sql);


    $sqlQuery = "DELETE from cart where id = $id";
    executeQuery($sqlQuery);
}


function creat_cart($userId, $quantity, $size, $productID, $sugar, $ice)
{
    $sql = " INSERT into cart ( user_id, quantity, product_size, product_id, sugar, ice ) values ('$userId', '$quantity', '$size', '$productID', '$sugar', '$ice') ";
    $cart_id = returnId($sql);
    return $cart_id;
}

function getPriceOptoion($id)
{
    $sqlQuery = "select * from toppings where id = $id";
    $topping = executeQuery($sqlQuery, true);
    return $topping[0]['price'];
}

function product_optinon($cart_id, $optionIds)
{
    $numid = (int)$cart_id;
    for ($i = 0; $i < count($optionIds); $i++) {
        $optionId = (int)$optionIds[$i];
        $price = getPriceOptoion($optionId);
        $sql = "INSERT into products_options (cart_id, option_id, price_topping) values ($numid, $optionId, '$price')";
        executeQuery($sql, false);
    }
}


function priceShip()
{
    $sqlQuery = "select * from price_ship";
    $priceShip = executeQuery($sqlQuery, true);
    return $priceShip[0]['price_ship'];
}

function point($ma_kh)
{
    $sqlQuery = "select * from points where user_id = $ma_kh";
    $points = executeQuery($sqlQuery, true);
    return $points[0]['points'];
}

function updateAll($valueUpdate)
{
    $query = "SELECT * from cart where status = 1";
    $listUpdate = executeQuery($query, true);
    for ($i = 0; $i < count($listUpdate); $i++) {
        $num = $listUpdate[$i]['id'];
        $result = (int)$num;
        $sql = "UPDATE cart set quantity = '$valueUpdate[$i]' where id = '$result'";
        executeQuery($sql, false);
    }
}

function updateStatusAll()
{
    $query = "SELECT * from cart";
    $listUpdate = executeQuery($query, true);
    for ($i = 0; $i < count($listUpdate); $i++) {
        $num = $listUpdate[$i]['id'];
        $result = (int)$num;
        $sql = "UPDATE cart set status = 0 where id = '$result'";
        executeQuery($sql, false);
    }
}

function addAddress($userId, $name, $phone, $address, $note)
{
    $sqlQuery = "INSERT into address  (user_id, recciever, phone, address, note) values ('$userId', '$name', '$phone', '$address', '$note')";
    executeQuery($sqlQuery, false);
}

function countCart()
{
    $count = 0;
    $query = "SELECT * from cart";
    $listCount = executeQuery($query, true);
    for ($i = 0; $i < count($listCount); $i++) {
        if ($listCount[$i]['status'] == 1) {
            $count++;
        }
    }
    return $count;
}

function addOder($userId, $name, $address, $phone, $note, $subTotal, $points, $shipPing, $total)
{
    $sqlQuery = "INSERT into oder  (user_id, name, address, phone, note, sub_total, points, shipping, total) values ('$userId', '$name', '$address', '$phone', '$note', '$subTotal', '$points', '$shipPing', '$total')";
    $oderId = returnId($sqlQuery, false);
    return $oderId;
}

function addOderDetail($userId, $oderId)
{
    $query = "SELECT * from cart where user_id = $userId and status = 1";
    $listpro = executeQuery($query, true);

    for ($i = 0; $i < count($listpro); $i++) {
        $num = $listpro[$i]['id'];
        $result = (int)$num;
        $pro = $listpro[$i]['product_id'];
        $idPro = (int)$pro;
        $sql = "SELECT * from products where id = $idPro";
        $Topping = executeQuery($sql, true);
        $price = $Topping[0]['price'];
        $sql = " INSERT into oder_item ( cart_id, order_id, price_product) values ('$result', '$oderId', '$price') ";
        executeQuery($sql);
    }
}

function getCartoption($id)
{
    $sqlQuery = "select * from products_options where cart_id = $id";
    $result = executeQuery($sqlQuery, true);
    return $result;
}

function getoption($listop)
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

function getoptionName($listop)
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

function getprice($id)
{
    $sqlQuery = "select * from products where id = $id";
    $result = executeQuery($sqlQuery, true);
    return $result[0]['price'];
}

function aRess($ma_kh)
{
    $sqlQuery = "select * from address where user_id = $ma_kh";
    $address = executeQuery($sqlQuery, true);
    return $address;
}

function getPriceProSize($id, $size)
{
    $sqlQuery = "select * from products where id = $id";
    $pro = executeQuery($sqlQuery, true);
    $sql = "select * from size where pro_size = '$size' ";
    $size = executeQuery($sql, true);
    $result = $pro[0]['price'] + $size[0]['price_increase'];
    return $result;
}

function priOption($id)
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

function updatepoints($id, $points)
{
    $sql = "UPDATE points set points = points $points where user_id = $id";
    executeQuery($sql, false);
}
