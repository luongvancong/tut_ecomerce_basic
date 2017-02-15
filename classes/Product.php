<?php

class Product extends Model {

    protected $table = 'products';

    public function getById($id, $field = "products.*")
    {
        $sql = "SELECT {$field} FROM {$this->getTable()}
               JOIN product_categories ON category_id = product_categories.id
               WHERE products.id = " . (int) $id. "
               LIMIT 1
               ";

        return $this->fetch($sql);
    }

    public function getProducts($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true) {
        $sql = "SELECT products.*, product_categories.name as cat_name FROM {$this->getTable()}
                JOIN product_categories ON products.category_id = product_categories.id
                WHERE 1
        ";

        $name = array_get($filter, 'name');
        $categoryId = (int) array_get($filter, 'category_id');
        $hot = (int) array_get($filter, 'hot', -1);

        if($name) {
            $sql .= " AND name LIKE '%". $name ."%'";
        }

        if($categoryId) {
            $sql .= " AND category_id = " . $categoryId;
        }

        if($hot >= 0) {
            $sql .= " AND hot = ". $hot;
        }

        $page = (int) array_get($_GET, 'page', 1);
        $start = ($page - 1) * $perPage;

        // Sắp xếp
        if(!$sort) {
            $sort = ['created_at', 'DESC'];
        }

        $sql .= " ORDER BY " .$sort[0].' '.$sort[1];

        if($paginate) {
            $sql .= " LIMIT {$start},{$perPage}";
        }

        return $this->fetchAll($sql);
    }
}