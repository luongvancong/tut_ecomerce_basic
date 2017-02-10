<?php

class Product extends Model {

    protected $table = 'products';

    public function getProducts($perPage = 20, array $filter = array(), $paginate = true) {
        $sql = "SELECT products.*, product_categories.name as cat_name FROM {$this->getTable()}
                JOIN product_categories ON products.category_id = product_categories.id
                WHERE 1
        ";

        $name = array_get($filter, 'name');
        $categoryId = (int) array_get($filter, 'category_id');

        if($name) {
            $sql .= " AND name LIKE '%". $name ."%'";
        }

        if($categoryId) {
            $sql .= " AND category_id = " . $categoryId;
        }

        $page = (int) array_get($_GET, 'page', 1);
        $start = ($page - 1) * $perPage;

        if($paginate) {
            $sql .= " LIMIT {$start},{$perPage}";
        }

        return $this->fetchAll($sql);
    }
}