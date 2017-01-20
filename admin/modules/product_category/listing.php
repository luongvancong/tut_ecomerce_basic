<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

if(array_get($_GET, 'insert') == 1) {
    echo 'THanh cong';
} else {
    echo 'That bai';
}