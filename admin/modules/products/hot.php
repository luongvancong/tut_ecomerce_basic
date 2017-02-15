<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

$id = (int) array_get($_GET, 'id');

$mProduct = $application['product'];

$product = $mProduct->getById($id);

$hot = (int) !$product['hot'];

if($mProduct->update(['hot' => $hot], ['id' => $id])) {
    redirect('listing.php?update=1');
} else {
    redirect('listing.php?update=0');
}