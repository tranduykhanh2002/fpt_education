<?php
session_start();
ob_start();
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : "/";

require_once './commons/utils.php';
require_once './mail/index.php';
require_once './dao/system_dao.php';
require_once './client/business/product.php';
require_once './client/business/categories.php';
require_once './client/business/blog.php';
require_once './carbon/autoload.php';

// dd($url);

switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'trang-chu':
        require_once './client/business/homepage.php';
        home();
        break;

        // controller Product
    case 'san-pham':
        if (isset($_GET['id-danhmuc']) && ($_GET['id-danhmuc'] > 0)) {
            $cate_id = $_GET['id-danhmuc'];
            $products = loadall_product_by_categories($cate_id);
        } else {
            product_index();
        }
        break;
    case 'yeu-thich':
        favorite_product();
        break;

    case 'san-pham-yeu-thich':
        require_once './client/business/product.php';
        product_like();
        break;
    case 'san-pham-yeu-thich/xoa':
        require_once './client/business/product.php';
        delete_product_favorite();
        break;
    case 'tin-tuc':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $cate_post_id = $_GET['id'];
            $posts = load_post_by_cate($cate_post_id);
        } else {
            blog();
        }
        break;

    case 'bai-viet':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $post = loadone_blog($id);
        } else {
            blog();
        }
        break;

    case 'lien-he':
        require_once './client/business/contact.php';
        contact();
        break;
    case 'phan-hoi':
        require_once './client/business/contact.php';
        insert_feed_back();
        break;

        // controller tài khoản
        // case 'tai-khoan':
        //     require_once './client/business/account.php';
        //     update_account();

        // mananger tai khoan
    case 'cp-admin/tai-khoan/khach-hang':
        require_once './admin/business/users.php';
        if (isset($_GET['idOder'])) {
            userOrder($_GET['idOder']);
        } else {
            account_index(1);
        }
        break;

    case 'cp-admin/tai-khoan/nhan-vien':
        require_once './admin/business/users.php';
        if (isset($_GET['idOder'])) {
            staffOrder($_GET['idOder']);
        } else {
            account_index(2);
        }
        break;

    case 'cp-admin/tai-khoan/chinh-sua':
        require_once './admin/business/users.php';
        edit_account($_GET['id']);
        break;
        break;
    case 'tai-khoan/quen-mat-khau':
        require_once './client/business/account.php';
        forgot_password();
        break;
    case 'tai-khoan/kiem-tra-ma':
        require_once './client/business/account.php';
        code_check();
        break;
    case 'tai-khoan/doi-mat-khau':
        require_once './client/business/account.php';
        reset_password();
        break;
    case 'tai-khoan/dang-ky':
        require_once './client/business/account.php';
        register();
        break;
        // Manager address 
    case 'tai-khoan/dia-chi':
        require_once './client/business/address.php';
        address($_SESSION['auth']['id']);
        break;

    case 'tai-khoan/chinh-sua-dia-chi':
        require_once './client/business/address.php';
        edit_address($_GET['id']);
        break;
    case 'tai-khoan/cap-nhat':
        require_once './client/business/account.php';
        update_account();
        break;
    case 'tai-khoan/cap-nhat':
        require_once './client/business/account.php';
        update_account();
        break;
    case 'tai-khoan/dang-nhap':
        require_once './client/business/account.php';
        login();
        break;
    case 'tai-khoan/dang-xuat':
        require_once './client/business/account.php';
        logout();
        break;
    case 'tai-khoan/luu-dang-nhap':
        require_once './client/business/account.php';
        post();
        break;

        // dat hang
    case 'data.php':
        $toppings = trim($_GET['toppingIP']);
        $toppings = explode(' ', $toppings);
        require_once './client/business/cart.php';
        $cart_id = creat_cart($_SESSION['auth']['id'], $_GET['quantity'], $_GET['size'], $_GET['productId'], $_GET['sugar'], $_GET['ice']);
        if (($toppings[0]) > 0) {
            product_optinon($cart_id, $toppings);
        }

        // gio hang
    case 'gio-hang':
        if (isset($_SESSION['auth']['id'])) {
            require_once './client/business/cart.php';
            myCart($_SESSION['auth']['id']);
        } else {
            echo header("refresh:0; url =tai-khoan/dang-nhap?null_account");
            exit();
        }
        break;
    case 'don-hang':
        if (isset($_SESSION['auth']['id'])) {
            require_once './client/business/order.php';
            myOrder($_SESSION['auth']['id']);
        } else {
            echo header("refresh:0; url =tai-khoan/dang-nhap?null_account");
            exit();
        }
        break;
    case 'don-hang-chi-tiet':
        require_once './client/business/order.php';
        myOrderOne($_SESSION['auth']['id'], $_GET['id']);
        break;

    case 'cp-admin':
        checkAuth([STAFF_ROLE, ADMIN_ROLE]);
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;

        // thống kê doanh thu
    case 'statistics':
        require_once './admin/business/revenue_statistics.php';
        statistics();
        break;

    case 'cp-admin/statistics':
        require_once './admin/business/revenue_statistics.php';
        statistics();
        break;

    case 'cp-admin/danh-muc':
        require_once './admin/business/category.php';
        cate_index();
        break;
    case 'cp-admin/danh-muc/xoa':
        checkAuth2();
        require_once './admin/business/category.php';
        cate_remove();
        break;
    case 'cp-admin/danh-muc/tao-moi':
        require_once './admin/business/category.php';
        cate_add_form();
        break;
    case 'cp-admin/danh-muc/luu-tao-moi':
        require_once './admin/business/category.php';
        cate_save_add();
        break;
    case 'cp-admin/danh-muc/cap-nhat':
        require_once './admin/business/category.php';
        cate_update();
        // product
    case 'cp-admin/san-pham':
        require_once './admin/business/product.php';
        pro_index();
        break;
    case 'cp-admin/san-pham/xoa':
        checkAuth2();
        require_once './admin/business/product.php';
        pro_remove();
        break;
    case 'cp-admin/san-pham/tao-moi':
        require_once './admin/business/product.php';
        pro_add_form();
        break;
    case 'cp-admin/san-pham/luu-tao-moi':
        require_once './admin/business/product.php';
        pro_save_add();
        break;
    case 'cp-admin/san-pham/sua':
        require_once './admin/business/product.php';
        pro_fix();
        break;
    case 'cp-admin/san-pham/luu-sua':
        require_once './admin/business/product.php';
        pro_save_fix();
        break;
        //bai viết
    case 'cp-admin/bai-viet':
        require_once './admin/business/post.php';
        post_index();
        break;
    case 'cp-admin/bai-viet/xoa':
        require_once './admin/business/post.php';
        post_remove();
        break;
    case 'cp-admin/bai-viet/tao-moi':
        require_once './admin/business/post.php';
        post_add_form();
        break;
    case 'cp-admin/bai-viet/luu-tao-moi':
        require_once './admin/business/post.php';
        post_save_add();
        break;
    case 'cp-admin/bai-viet/sua':
        require_once './admin/business/post.php';
        post_fix();
        break;
    case 'cp-admin/bai-viet/luu-sua':
        require_once './admin/business/post.php';
        post_save_fix();
        break;

    case 'cp-admin/lien-he':
        require_once './admin/business/contact.php';
        contact_index();

        break;
    case 'cp-admin/lien-he/cap-nhat':
        require_once './admin/business/contact.php';
        contact_update();

        break;
    case 'cp-admin/phan-hoi':
        require_once './admin/business/feed_back.php';
        feed_back_index();
        break;
    case 'cp-admin/phan-hoi-xoa':
        require_once './admin/business/feed_back.php';
        feed_back_delete();
        break;
    case 'cp-admin/phan-hoi-user':
        require_once './admin/business/feed_back.php';
        feed_back_update();
        break;


        // danh mục bài viêt
    case 'cp-admin/danh-muc-bai-viet':
        require_once './admin/business/cate_post.php';
        cate_post_index();
        break;
    case 'cp-admin/danh-muc-bai-viet/xoa':
        require_once './admin/business/cate_post.php';
        cate_post_remove();
        break;
    case 'cp-admin/danh-muc-bai-viet/tao-moi':
        require_once './admin/business/cate_post.php';
        cate_post_add_form();
        break;
    case 'cp-admin/danh-muc-bai-viet/luu-tao-moi':
        require_once './admin/business/cate_post.php';
        cate_post_save_add();
        break;
    case 'cp-admin/danh-muc-bai-viet/cap-nhat':
        require_once './admin/business/cate_post.php';
        cate_post_update();
        break;
        // don hang
    case 'cp-admin/quan-ly-don-hang':
        if (isset($_SESSION['auth']['id'])) {
            require_once './admin/business/order.php';
            OrderAll();
        } else {
            echo header("refresh:0; url =tai-khoan/dang-nhap?null_account");
            exit();
        }
        break;
    case 'cp-admin/don-hang-chi-tiet':
        require_once './admin/business/order.php';
        OrderOneDetail($_GET['id']);
        break;

    case 'cp-admin/phan-hoi-don-hang':
        require_once './admin/business/feedback.php';
        renderAll();
        break;


    default:
        include_once './client/views/404.php';
        break;
}
