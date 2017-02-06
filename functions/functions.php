<?php

if( ! function_exists('array_get') ) {
    function array_get($array, $key, $default = null) {
        $explode = explode('.', $key);
        foreach($explode as $k) {
            if(isset($array[$k])) {
                $array = $array[$k];
            } else {
                $array = $default;
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

if( ! function_exists('upload') ) {
    /**
     * Upload file
     * @param  str $fileControl
     * @return str
     */
    function upload($fileControl) {
        $baseFilename = APP_PATH . '/uploads/' . $_FILES[$fileControl]['name'];
        $info = new SplFileInfo($baseFilename);
        $ext = $info->getExtension();

        // Tên file mới
        $filename = md5($baseFilename) . '.' . $ext;

        move_uploaded_file($_FILES[$fileControl]['tmp_name'], APP_PATH . '/uploads/' . $filename);

        return $filename;
    }
}