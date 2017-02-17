<?php

class Category extends Model {

    protected $table = 'product_categories';

    public function getCategories(array $filter = array(), array $sort = array()) {

        $id = (int) array_get($filter, 'id');
        $name = mysqli_real_escape_string($this->link, array_get($filter, 'name'));

        $sql = "SELECT * FROM product_categories WHERE 1";

        if($id) {
            $sql .= " AND id = " . $id;
        }

        if($name) {
            $sql .= " AND name LIKE '%". $name ."%'";
        }

        $result = mysqli_query($this->link, $sql);

        $categories = [];
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        $sortObj = new Sort($categories);
        $categories = $sortObj->getCategories();

        return $categories;
    }
}