<?php

//Huỷ session['success'] và $_SESSION['false']
unset($_SESSION['success']);
unset($_SESSION['false']);
unset($_SESSION['false_email']);
unset($_SESSION['false_phone']);
unset($_SESSION['empty_email']);
unset($_SESSION['false_empty_phone']);
unset($_SESSION['false_empty_name']);
unset($_SESSION['false_number']);


function getUesrEmail($email)
{
    $sql = "SELECT * FROM `accounts` WHERE email = '$email'";
    $result = executeQuery($sql);
    return $result;
}
function updatePassword($email, $pass)
{
    $sql = "UPDATE `accounts` SET password = '$pass' WHERE email = '$email'";
    $result = executeQuery($sql);
    return $result;
}
//Quên mật khẩu
function forgot_password()
{

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $result = getUesrEmail($email);
        if ($email == '') {
            $_SESSION['false'] = 'Không được bỏ trống';
        } elseif (!is_array($result)) {
            $_SESSION['false'] = 'Email không tồn tại';
        } else {
            unset($_SESSION['false']);
            $_SESSION['location'] = 'quen-mat-khau';

            $code = random_int(10000, 99999);
            $title = 'Yêu cầu đặt lại mật khẩu';
            $content = "Chào bạn, <br>
            Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu XiaoHaha của bạn.<br>
            Nhập mã xác nhận sau đây: <h3>$code</h3>";
            sendEmail($title, $content, $email);

            $_SESSION['email'] = $email;
            $_SESSION['code'] = $code;
            header("location:" . BASE_URL . "tai-khoan/kiem-tra-ma");
        }
    }
    client_render('account/forgot_password.php');
}
function code_check()
{
    if (isset($_SESSION['location']) && $_SESSION['location'] == 'quen-mat-khau') {
        if (isset($_POST['submit'])) {

            if ($_POST['code'] === '') {
                $_SESSION['false'] = 'Không được bỏ trống';
            } elseif ($_SESSION['code'] != $_POST['code']) {
                $_SESSION['false'] = 'Mã xác nhận không đúng';
            } else {
                unset($_SESSION['false']);
                $_SESSION['location'] = 'kiem-tra-ma';
                header('location:' . BASE_URL . 'tai-khoan/doi-mat-khau');
            }
        }
        client_render('account/verification.php');
    } else {
        header('location:' . BASE_URL . 'trang-chu');
    }
}
function reset_password()
{
    if (isset($_SESSION['location']) && $_SESSION['location'] == 'kiem-tra-ma') {
        if (isset($_POST['submit'])) {
            $newPass = $_POST['newpass'];
            $rePass = $_POST['repass'];

            if (empty($newPass) || empty($rePass)) {
                $_SESSION['false'] = 'Không được bỏ trống';
            } elseif (strlen($newPass) < 6) {
                $_SESSION['false'] = 'Mật khẩu tối thiểu có 6 kí tự';
            } elseif ($newPass !== $rePass) {
                $_SESSION['false'] = 'Mật khẩu nhập lại không khớp';
            } else {
                $_SESSION['success'] = 'Đổi mật khẩu thành công. Tự động chuyển hướng sau 5s!';
                unset($_SESSION['false']);
                unset($_SESSION['location']);

                $rePass = password_hash($rePass, PASSWORD_DEFAULT);
                updatePassword($_SESSION['email'], $rePass);
                header('refresh:5;' . BASE_URL . 'trang-chu');
            }
        }
        client_render('account/reset_password.php');
    } else {
        header('location:' . BASE_URL . 'trang-chu');
    }
}
//Đăng ký
function register()
{
    if (isset($_POST['dang-ky']) && ($_POST['dang-ky'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $getUserByEmail = "SELECT * FROM accounts WHERE email = '$email'";
        $user = executeQuery($getUserByEmail, false);

        $errors = "";
        if (empty($email)) {
            $errors .= "email-err=Hãy nhập email&";
        } else if ($email == $user['email']) {
            $errors .= "email-err=Tài khoản đã tồn tại&";
        }
        if (empty($password)) {
            $errors .= "password-err=Hãy nhập mật khẩu&";
        }
        if (empty($name)) {
            $errors .= "name-err=Hãy nhập họ và tên&";
        }

        $errors = rtrim($errors, '&');

        if (strlen($errors) > 0) {
            header('location:' . BASE_URL . 'tai-khoan/dang-ky' . '?' . $errors);
            die;
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO accounts(email,name,password) values('$email','$name','$password')";
            $point_id = returnId($sql);
            $d = '1000';
            $points = "INSERT INTO points(user_id,points) values('$point_id','$d')";
            pdo_execute($points);
            header('location:' . BASE_URL . 'tai-khoan/dang-nhap');
            die;
        }
    }
    client_render('account/register.php');
}
//cập nhật tài khoản người dùng
function update_account()
{
    if (isset($_POST['update']) && $_POST['update']) {
        $id = $_GET['id'];
        $name_new = $_POST['name'];
        $email_new = $_POST['email'];
        $phone_new = $_POST['phone'];
        $date_upadte = date('Y/m/d H:i:s');
        $validate_email = check_mail(pdo_select("SELECT * FROM accounts"), $email_new);
        $validate_phone = check_phone(pdo_select("SELECT * FROM accounts"), $phone_new);
        if ($name_new == '') {
            $_SESSION['false_empty_name'] = 'Mời nhập lại';
        } elseif ($email_new == '') {
            $_SESSION['empty_email'] = 'Mời nhập lại';
        } elseif ($validate_email == false) {
            $_SESSION['false_email'] = 'Email bạn vừa nhập đã tồn tại';
        } elseif ($phone_new == '') {
            $_SESSION['false_empty_phone'] = 'Mời nhập lại';
        } elseif (strlen($phone_new) > 10) {
            $_SESSION['false_number'] = 'Quá kí tự cho phép';
        } elseif (strlen($phone_new) < 10) {
            $_SESSION['false_number'] = 'Tối thiểu 10 ký tự';
        } elseif ($validate_phone == false) {
            $_SESSION['false_phone'] = 'Số điện thoại bạn vừa nhập đã tồn tại';
        } else {
            if (isset($_FILES['image']) && $_FILES['image']['name']) {
                $img_new = $_FILES['image'];
                $dir = "./public/uploads/";
                $target_file = $dir . basename($img_new['name']);
                $type = pathinfo($target_file, PATHINFO_EXTENSION);
                $avatar_new = uniqid() . "-" . $img_new['name'];
                move_uploaded_file($img_new['tmp_name'], $dir . $avatar_new);
                $sql = "UPDATE accounts SET name = '$name_new', email = '$email_new',updated_at = '$date_upadte', avatar = '$avatar_new', avatar = '$avatar_new', phone = '$phone_new' 
                 WHERE id = '$id'";
                pdo_execute($sql);
                $_SESSION['auth']['name'] = $name_new;
                header('location:' . BASE_URL . 'tai-khoan/cap-nhat?id=' . $id);
            } else {
                $sql = "UPDATE accounts SET name = '$name_new', email = '$email_new', updated_at = '$date_upadte', phone = '$phone_new' WHERE id = '$id'";
                pdo_execute($sql);
                $_SESSION['auth']['name'] = $name_new;
                header('location:' . BASE_URL . 'tai-khoan/cap-nhat?id=' . $id);
            }
        }
    }
    client_render('account/update_account.php');
}
function check_mail($accounts, $get_email)
{

    $set_email = $get_email;
    $id = $_SESSION['auth']['id'];
    $flag = true;

    for ($i = 0; $i < count($accounts); $i++) {
        $id_new = $accounts[$i]['id'];
        if ($id_new != $id) {
            if ($set_email == $accounts[$i]['email']) {
                $flag = false;
            }
        }
    }
    return $flag;
}
function check_phone($accounts, $get_phone)
{

    $set_phone = $get_phone;
    $phone = $_SESSION['auth']['id'];
    $flag = true;

    for ($i = 0; $i < count($accounts); $i++) {
        $id_new = $accounts[$i]['id'];
        if ($id_new != $phone) {
            if ($set_phone == $accounts[$i]['phone']) {
                $flag = false;
            }
        }
    }
    return $flag;
}
function login()
{
    client_render('account/login.php');
}
function logout()
{
    unset($_SESSION['auth']);
    header('location: ' . BASE_URL);
}
function post()
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $getUserByEmail = "select * from accounts where email = '$email'";
    $user = executeQuery($getUserByEmail, false);
    $k = password_verify($password, $user['password']);

    $errors = "";
    if (empty($email)) {
        $errors .= "email-err=Hãy nhập email&";
    } else if ($email != $user['email']) {
        $errors .= "email-err=Tài khoản không tồn tại&";
    }
    if (empty($password)) {
        $errors .= "password-err=Hãy nhập mật khẩu&";
    } else if ($password != $k) {
        $errors .= "password-err=Sai mật khẩu&";
    }
    $errors = rtrim($errors, '&');
    if (strlen($errors) > 0) {
        header('location:' . BASE_URL . 'tai-khoan/dang-nhap' . '?' . $errors);
        die;
    }

    if ($user && password_verify($password, $user['password'])) {
        if ($user['role'] == 1) {
            unset($user['password']);
            $_SESSION['auth'] = $user;
            header('location:' . BASE_URL);
            die;
        } else if ($user['role'] == 2) {
            unset($user['password']);
            $_SESSION['auth'] = $user;
            header('location:' . ADMIN_URL);
            die;
        } else if ($user['role'] == 5) {
            unset($user['password']);
            $_SESSION['auth'] = $user;
            header('location:' . BASE_URL . 'cp-admin');
            die;
        }
    }
    header('location:' . BASE_URL . 'tai-khoan/dang-nhap');
}
