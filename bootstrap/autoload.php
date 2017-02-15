<?php

if(! defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
}

require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../classes/Config.php';

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/Model.php';
require_once __DIR__ . '/../classes/Category.php';
require_once __DIR__ . '/../classes/Sort.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/Setting.php';
require_once __DIR__ . '/../classes/Pagination.php';

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
$product  = new Product($application); // Model sản phẩm
$category = new Category($application); // Model danh mục
$setting  = new Setting($application); // Model setting

// Cache model
$application['config']   = $config;
$application['category'] = $category;
$application['product']  = $product;
$application['setting']  = $setting;
