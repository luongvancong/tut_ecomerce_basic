<?php
    require_once __DIR__ . '/../../bootstrap/autoload.php';

    $categoryId = (int) $_GET['id'];

    $sql = "DELETE FROM product_categories WHERE id = ". $categoryId;

    mysqli_query($link, $sql) or die(mysqli_error($link));

    if(mysqli_affected_rows($link) > 0) {
        redirect('listing.php?delete=1');
    } else {
        redirect('listing.php?delete=0');
    }