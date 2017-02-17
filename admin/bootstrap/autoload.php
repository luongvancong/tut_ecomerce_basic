<?php
session_start();

// Nếu khác trang login thì phải check đăng nhập
$scriptFileName = ['/admin/login.php'];
if(!in_array($_SERVER['SCRIPT_NAME'], $scriptFileName)) {
    // Neu chua dang nhap thi phai dang nhap
    if($_SESSION['logged'] === 0) {
        header('Location: /admin/login.php');
        exit;
    }
}

require_once __DIR__ . '/../../functions/functions.php';
require_once __DIR__ . '/../../classes/Config.php';

require_once __DIR__ . '/../../classes/Database.php';
require_once __DIR__ . '/../../classes/Model.php';
require_once __DIR__ . '/../../classes/Category.php';
require_once __DIR__ . '/../../classes/Sort.php';
require_once __DIR__ . '/../../classes/Product.php';
require_once __DIR__ . '/../../classes/Order.php';
require_once __DIR__ . '/../../classes/OrderDetail.php';
require_once __DIR__ . '/../../classes/Pagination.php';

define('APP_PATH', $_SERVER['DOCUMENT_ROOT']);

define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/admin');

// Nếu chưa logged thì mặc định logged = 0
if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = 0;
}

// Mảng config
$config = new Config();

// Connect
$link = mysqli_connect($config->get('database.host'), $config->get('database.user'), $config->get('database.password'), $config->get('database.name')) or die(mysqli_error());
mysqli_query($link, "SET NAMES 'utf8'");

$application = [];

$database = new Database($link);

$application['database'] = $database;

// Khai báo mảng chứa các đối tượng cần thiết
$product = new Product($application);
$category = new Category($application);
$order = new Order($application); // Model order
$orderDetail = new OrderDetail($application); // Model order detail

$application['config']   = $config;
$application['category'] = $category;
$application['product']  = $product;
$application['order']       = $order;
$application['orderDetail'] = $orderDetail;