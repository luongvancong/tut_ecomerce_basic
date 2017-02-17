<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';
$page = array_get($_GET, 'page', 1);
$mOrder = $application['order'];
$dataOrder = $mOrder->getOrders(10, $_GET);
$orders = $dataOrder['data'];
$total = $dataOrder['total_row'];
$perPage = $dataOrder['per_page'];

?>

<?php include ROOT . '/includes/header.php' ?>

 <div class="page-header">
    <h1>
        Danh sách đơn hàng
    </h1>
</div>

<form method="GET" class="form form-inline">
    <input type="text" name="customer_email" value="<?php echo array_get($_GET, 'customer_email') ?>" class="form-control input-sm" placeholder="abc@gmail.com">
    <input type="text" name="customer_phone" value="<?php echo array_get($_GET, 'customer_phone') ?>" class="form-control input-sm" placeholder="09000000">
    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
</form>

<table class="table table-hover table-stripped">
    <thead>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Customer Phone</th>
        <th>Customer Email</th>
        <th>Customer Address</th>
        <th>Customer Note</th>
        <th>Total Money</th>
        <th>Created At</th>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $order['customer_name'] ?></td>
                <td><?php echo $order['customer_phone'] ?></td>
                <td><?php echo $order['customer_email'] ?></td>
                <td><?php echo $order['customer_address'] ?></td>
                <td><?php echo $order['customer_note'] ?></td>
                <td><?php echo formatCurrency($order['total_money']) ?></td>
                <td><?php echo $order['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="pull-right">
    <?php
        $pagination = new Pagination($total, $perPage, $page);
        echo $pagination->links();
    ?>
</div>
<div class="clearfix"></div>

<?php include ROOT . '/includes/footer.php' ?>