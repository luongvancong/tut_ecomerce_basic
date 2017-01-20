<?php

class Config {

    protected $config = array();

    public function __construct() {
        // Load config files
        $folderConfig = __DIR__ . '/../config';

        foreach (glob($folderConfig . "/*.php") as $filename) {
            $basename = basename($filename);
            $basename = str_replace('.php', '', $basename);
            $this->config[$basename] = require_once $filename;
        }
    }

    public function get($key, $default = null)
    {
        return array_get($this->config, $key, $default);
    }

    public function getConfig()
    {
        return $this->config;
    }

}