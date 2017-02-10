<?php

class Model {

    protected $table;

    protected $primaryKey = 'id';

    /**
     * [$database description]
     * @var Database
     */
    protected $database;

    protected $link;

    public function __construct($application)
    {
        $this->database = $application['database'];
        $this->link     = $application['database']->link;
    }

    public function insert(array $data)
    {
        return $this->database->insert($this->getTable(), $data);
    }

    public function update(array $data, array $conditions)
    {
        return $this->database->update($this->getTable(), $data, $conditions);
    }

    public function delete(array $conditions)
    {
        return $this->database->delete($this->getTable(), $conditions);
    }

    public function fetch($sql)
    {
        return $this->database->fetch($sql);
    }

    public function fetchAll($sql)
    {
        return $this->database->fetchAll($sql);
    }

    public function getById($id, $field = "*") {
        $sql = "SELECT {$field} FROM {$this->getTable()} WHERE {$this->getPrimaryKey()} = " . $id;
        return $this->fetch($sql);
    }


    public function getAll($field = "*") {
        $sql = "SELECT {$field} FROM {$this->getTable()}";
        return $this->fetchAll($sql);
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }
}