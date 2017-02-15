<?php

/**
* Nơi xử lý các logic liên quan đến database
*/
class Database
{
    public $link;

    public function __construct($link)
    {
        $this->link = $link;
    }


    /**
     * Insert dữ liệu
     * @param  string $table
     * @param  array  $data
     * @return integer
     */
    public function insert($table, array $data)
    {
        $sql = "INSERT INTO {$table} ";
        $columns = implode(',', array_keys($data));
        $values  = "";

        $sql .= '(' . $columns . ')';

        foreach($data as $field => $value) {
            if(is_string($value)) {
                $values .= "'". mysqli_real_escape_string($this->link, xss_clean($value)) ."',";
            } else {
                $values .= mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
            }
        }

        $values = substr($values, 0, -1);

        $sql .= " VALUES (" . $values . ')';

        mysqli_query($this->link, $sql);

        return mysqli_insert_id($this->link);
    }


    /**
     * Cập nhật dữ liệu
     * @param  string $table
     * @param  array  $data
     * @param  array  $conditions
     * @return integer
     */
    public function update($table, array $data, array $conditions)
    {
        $sql = "UPDATE {$table}";

        $set = " SET ";

        $where = " WHERE ";

        foreach($data as $field => $value) {
            if(is_string($value)) {
                $set .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\',';
            } else {
                $set .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
            }
        }

        $set = substr($set, 0, -1);


        foreach($conditions as $field => $value) {
            if(is_string($value)) {
                $where .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\' AND ';
            } else {
                $where .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ' AND ';
            }
        }

        $where = substr($where, 0, -5);

        $sql .= $set . $where;

        mysqli_query($this->link, $sql) or die(mysqli_error($this->link));

        return mysqli_affected_rows($this->link);
    }


    /**
     * Xóa dữ liệu
     * @param  string $table
     * @param  array  $conditions
     * @return integer
     */
    public function delete($table, array $conditions)
    {
        $sql = "DELETE FROM {$table}";
        $where = " WHERE ";

        foreach($conditions as $field => $value) {
            if(is_string($value)) {
                $where .= $field .'=\''. mysqli_real_escape_string($this->link, xss_clean($value)) . '\' AND ';
            } else {
                $where .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ' AND ';
            }
        }

        $where = substr($where, 0, -5);

        $sql .= $where;

        mysqli_query($this->link, $sql);

        return mysqli_affected_rows($this->link);
    }


    /**
     * Chạy những câu query select
     * lấy bản ghi đầu tiên
     * @param  string $sql
     * @return array
     */
    public function fetch($sql) {
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    /**
     * Chạy câu sql select lấy nhiều bản ghi
     * @param  string $sql
     * @return array
     */
    public function fetchAll($sql)
    {
        $result = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        $data = [];

        if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        return $data;
    }
}