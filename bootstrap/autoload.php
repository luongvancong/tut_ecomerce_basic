<?php

require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../classes/Config.php';

// Mảng config
$config = new Config();

// Connect
$link = mysqli_connect($config->get('database.host'), $config->get('database.user'), $config->get('database.password'), $config->get('database.name')) or die(mysqli_error());
mysqli_query($link, "SET NAMES 'utf8'");