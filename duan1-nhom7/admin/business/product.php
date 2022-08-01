<?php
function pro_index()
{

    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    // lấy danh sách danh mục
    $sql = "SELECT * from products where name like '%$keyword%'";
    $products = executeQuery($sql, true);
    $keyword = '';
    // hiển thị view
    admin_render('product/index.php', compact('products', 'keyword'), 'admin-assets/custom/admin-global.js');
}

function pro_remove()
{

    $id = $_GET['id'];
    $sql = "DELETE from products where id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'san-pham');
}
function pro_add_form()
{

    admin_render('product/add-form.php', [], 'admin-assets/custom/admin-global.js');
}
function pro_save_add()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $create_at = date(" Y-m-d H:i:s ");

    $name = $_POST['name'];
    $thumbnail = $_FILES['thumbnail'];
    $price = $_POST['price'];
    $cate_id = $_POST['cate_id'];
    $status = isset($_POST['status']) ? 1 : 0;
    $filename = "";

    $errors = "";
    $getProducts = "SELECT * FROM products WHERE name = '$name'";
    $product = executeQuery($getProducts, false);
    if (empty($name)) {
        $errors .= "name-err=Hãy nhập tên sản phẩm&";
    } else if ($name == $product['name']) {
        $errors .= "name-err=Tên sản phẩm đã có vui lòng chọn tên khác&";
    }
    if (empty($price)) {
        $errors .= "price-err=Hãy nhập giá sản phẩm&";
    }
    $errors = rtrim($errors, '&');
    if (strlen($errors) > 0) {
        header('location:' . ADMIN_URL . 'san-pham/tao-moi' . '?' . $errors);
        die;
    }

    if ($thumbnail['size'] > 0) {
        $filename = uniqid() . '-' . $thumbnail['name'];
        move_uploaded_file($thumbnail['tmp_name'], './public/uploads/' . $filename);
    }

    $sql = "INSERT into products (name, thumbnail ,price, status, cate_id, create_at) values ('$name','$filename', '$price', '$status', '$cate_id', '$create_at')";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'san-pham');
}
function pro_fix()
{

    admin_render('product/update-form.php', [], 'admin-assets/custom/admin-global.js');
}

function pro_save_fix()
{

    $id = $_POST['id'];
    $getUserQuery = "select * from products where id = $id";
    $products = executeQuery($getUserQuery, false);
    if (!$products) {
        header('location' . ADMIN_URL . 'san-pham' . '?msg' . 'sản phẩm không tồn tại');
        die;
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $update_at = date(" Y-m-d H:i:s ");
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $cate_id = $_POST['cate_id'];
    $imageValue = $products['thumbnail'];
    $thumbnail = $_FILES['thumbnail'];

    $errors = "";
    if (empty($update_at)) {
        $errors .= "update_at-err=Hãy nhập&";
    }
    $errors = rtrim($errors, '&');
    if (strlen($errors) > 0) {
        header('location:' . ADMIN_URL . 'san-pham/sua' . '?msg' . $errors);
        die;
    }


    if ($thumbnail['size'] > 0) {
        $imageValue = uniqid() . '-' . $thumbnail['name'];
        move_uploaded_file($thumbnail['tmp_name'], './public/uploads/' . $imageValue);
        $imageValue = BASE_URL . 'public/uploads/' . $imageValue;
    }


    $updateUserQuery = "update products
                    set     name = '$name',
                            thumbnail = '$imageValue',
                            price = '$price',
                            status = '$status',
                            cate_id = '$cate_id',
                            update_at = '$update_at'
                    where id = $id";
    executeQuery($updateUserQuery);
    header('location:' . ADMIN_URL . 'san-pham');
}
