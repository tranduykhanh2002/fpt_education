<?php 
function contact_index(){
    $sql = "SELECT * from contact";
    $contact = executeQuery($sql, true);
    admin_render('contact/index.php', compact('contact', ), 'admin-assets/custom/admin-global.js');
}

function contact_update()
{
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $address_new = $_POST['address'];
        $phone_new = $_POST['phone'];
        $email_new = $_POST['email'];
        $time_open_new = $_POST['time_open'];
        $time_close_new = $_POST['time_close'];
        $map_new = $_POST['map'];
        $sql = "UPDATE contact SET address = '$address_new', map = '$map_new', phone = '$phone_new', email = '$email_new', time_open = '$time_open_new', time_close = '$time_close_new' WHERE id = '$id'";
        pdo_execute($sql);
        header("location: " . BASE_URL . "cp-admin/lien-he");
    }
    admin_render('contact/contact_update.php');
}
?>