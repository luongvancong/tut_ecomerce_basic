<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

$id = (int) array_get($_GET, 'id');

$product = $application['product'];

if($product->delete(['id' => $id])) {
    redirect('listing.php?delete=1');
} else {
    redirect('listing.php?delete=0');
}