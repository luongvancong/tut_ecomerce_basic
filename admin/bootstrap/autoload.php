<?php
session_start();

require_once __DIR__ . '/../../functions/functions.php';
require_once __DIR__ . '/../../classes/Config.php';

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