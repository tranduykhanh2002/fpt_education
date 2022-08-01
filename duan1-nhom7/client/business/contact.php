<?php
unset($_SESSION['false_number']);
unset($_SESSION['success']);
function contact()
{

    client_render('contact/index.php');
}

function insert_feed_back()
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $create_at = date('Y/m/d');
    if (strlen($phone) > 10) {
        $_SESSION['false_number'] = 'Quá kí tự cho phép';
    } elseif (strlen($phone) < 10) {
        $_SESSION['false_number'] = 'Tối thiểu 10 ký tự';
    } else {
        $sql = "INSERT INTO feedback(name,email,phone,message,create_at) VALUES ('$name','$email','$phone','$message', '$create_at')";
        pdo_execute($sql);
        $_SESSION['success'] = 'Cảm ơn bạn đã liên hệ với chúng tôi';
    }
    client_render('contact/index.php');
}