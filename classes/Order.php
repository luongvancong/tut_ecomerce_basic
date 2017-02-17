<?php

class Order extends Model {

    protected $table = 'orders';

    /**
     * Lấy danh sách đơn hàng
     * @param  integer $perPage
     * @param  array   $filter
     * @return array
     */
    public function getOrders($perPage = 20, array $filter = array())
    {
        $page = (int) array_get($_GET, 'page', 1);
        $start = ($page - 1) * $perPage;

        $sqlWhere = " WHERE 1 ";

        // Condition
        $customerEmail = array_get($filter, 'customer_email');
        $customerPhone = array_get($filter, 'customer_phone');

        if($customerEmail) {
            $sqlWhere .= " AND customer_email LIKE '%". $customerEmail ."%'";
        }

        if($customerPhone) {
            $sqlWhere .= " AND customer_phone = '" . $customerPhone . "'";
        }

        // Nối sql với điều kiện lọc
        $sql = "SELECT * FROM {$this->getTable()} ". $sqlWhere ." LIMIT {$start},{$perPage}";

        $orders = $this->fetchAll($sql);

        // Đếm tổng số bản ghi
        $sqlTotal = "SELECT COUNT(*) as count FROM {$this->getTable()} ". $sqlWhere;
        $rowTotal = $this->fetch($sqlTotal);
        $rowTotal = $rowTotal['count'];

        // Return
        return [
            'total_row' => $rowTotal,
            'data'      => $orders,
            'per_page'  => $perPage
        ];
    }
}