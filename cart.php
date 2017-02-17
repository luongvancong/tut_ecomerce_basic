<?php

require_once 'bootstrap/autoload.php';

$action    = array_get($_GET, 'action', '');
$productId = (int) array_get($_GET, 'product_id');
$quantity  = (int) array_get($_GET, 'quantity');
$returnUrl = array_get($_GET, 'return_url', '/');

if($quantity <= 0) {
    redirect($returnUrl);
}

switch ($action) {
    case 'add':
        if(isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += 1;
        } else {
            $_SESSION['cart'][$productId] = 1;
        }

        break;
    case 'update':
        $_SESSION['cart'][$productId] = $quantity;
        break;

    case 'remove':
        unset($_SESSION['cart'][$productId]);
        break;

    default:

        break;
}


redirect($returnUrl);