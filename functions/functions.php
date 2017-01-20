<?php

if( ! function_exists('array_get') ) {
    function array_get($array, $key, $default = null) {
        $explode = explode('.', $key);
        foreach($explode as $k) {
            if(isset($array[$k])) {
                $array = $array[$k];
            } else {
                $array[$k] = $default;
            }
        }
        return $array;
    }
}


if( ! function_exists('redirect') ) {
    function redirect($page) {
        header('Location: '. $page);
        exit;
    }
}