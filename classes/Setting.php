<?php

class Setting extends Model {
    protected $table = 'settings';

    /**
     * Lấy thông tin cấu hình
     * @return array
     */
    public function getSetting()
    {
        $sql = "SELECT * FROM settings LIMIT 1";
        return $this->fetch($sql);
    }
}