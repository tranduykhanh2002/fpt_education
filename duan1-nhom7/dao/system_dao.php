<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=2021-duan1-nhom7;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function executeQuery($sql, $getAll = false)
{

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($getAll) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}

// Thực thi câu lệnh sql
// args mảng giá trị cung cấp cho các tham số $sql
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Thực hiện câu lệnh SQL truy vấn dự liệu (SELECT)
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy van 1 ban ghi
function pdo_query_one($sql)
{
    $sql_args = array_slice((func_get_args()), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy van 1 gia tri
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_select($sql)
{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function returnId($sqL)
{

    // Tạo kết nối
    $conn = new PDO("mysql:host=localhost;dbname=2021-duan1-nhom7", 'root', '');

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Câu SQL Insert
    $sql = $sqL;

    // Thực hiện thêm record
    $conn->exec($sql);

    $last_id = $conn->lastInsertId();
    return $last_id;
}
