<?php
function delAll($nameTable, $key, $listDel)
{
    for ($i = 0; $i < count($listDel); $i++) {
        $query = "DELETE from $nameTable where $key = $listDel[$i]";
        executeQuery($query, true);
    }
}
require_once './dao/system_dao.php';
function address($ma_kh)
{
    $sqlQuery = "select * from address where user_id = $ma_kh";
    $address = executeQuery($sqlQuery, true);
    client_render('address/index.php', compact('address'), 'admin-assets/custom/admin-global.js');
}

function edit_address($id)
{
    $sqlQuery = "select * from address where id = $id";
    $address = executeQuery($sqlQuery, true);
    client_render('address/edit.php', compact('address'));
}
function delete_address_one($dellid)
{
    $sqlQuery = "delete from address where id = $dellid";
    executeQuery($sqlQuery, true);
}

function delete_addresss($dellid)
{
    delAll('address', 'id', explode(',', $dellid));
}

function edit($id, $name, $call, $address, $note)
{
    $sqlQuery = "Update address set phone = '$call', recciever = '$name', address = '$address', note = '$note' where id = $id";
    executeQuery($sqlQuery, true);
}
