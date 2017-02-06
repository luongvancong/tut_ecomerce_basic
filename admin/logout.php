<?php

require_once 'bootstrap/autoload.php';

$_SESSION['logged'] = 0;
$_SESSION['login_id'] = 0;
$_SESSION['login_name'] = "";

redirect('/admin');