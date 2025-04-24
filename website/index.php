<?php
// Định nghĩa đường dẫn cơ sở
define('BASE_PATH', __DIR__ . '/');

// Bật báo lỗi trong quá trình phát triển
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include header và navbar
include(BASE_PATH . 'View/includes/header.php');
include(BASE_PATH . 'View/includes/loader.php');
include(BASE_PATH . 'View/includes/navbar.php');

// Xác định trang cần hiển thị
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Định tuyến các trang và hiển thị nội dung
switch ($page) {
    case 'home':
        include(BASE_PATH . 'View/page/homepage.php');
        break;
    case 'products':
        include(BASE_PATH . 'View/page/all_products.php');
        break;
    case 'cart':
        include(BASE_PATH . 'View/page/cart.php');
        break;
    case 'checkout':
        include(BASE_PATH . 'View/page/checkout.php');
        break;
    case 'product':
        include(BASE_PATH . 'View/page/product_detail.php');
        break;
    default:
        include(BASE_PATH . 'View/page/error404.php');
        break;
}

// Include các modal và phần cuối trang

include(BASE_PATH . 'View/user/login.php');
include(BASE_PATH . 'View/user/register.php');
include(BASE_PATH . 'View/includes/navbarcart.php');
include(BASE_PATH . 'View/includes/backtotop.php');
include(BASE_PATH . 'View/includes/quickactions.php');
include(BASE_PATH . 'View/includes/footer.php');
?>