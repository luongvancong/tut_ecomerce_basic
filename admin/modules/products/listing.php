<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

$mProduct = $application['product'];

$products = $mProduct->getProducts();

?>

<?php include ROOT . '/includes/header.php' ?>

<div>

    <?php include ROOT . '/includes/notification.php' ?>

    <div class="page-header">
        <h1>
            Products
            <a class="btn btn-sm btn-primary pull-right" href="add.php">Thêm mới</a>
        </h1>
    </div>

    <table class="table table-stripped table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th width="30">Edit</th>
            <th width="30">Del</th>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td>
                        <img src="/uploads/<?php echo $product['image'] ?>" height="50" onerror="this.src='/assets/img/grey.gif'">
                    </td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['quantity'] ?></td>
                    <td><?php echo $product['cat_name'] ?></td>
                    <td>
                        <?php echo makeEditButton("edit.php?id=". $product['id']) ?>
                    </td>
                    <td>
                        <?php echo makeDeleteButton("delete.php?id=". $product['id']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php include ROOT . '/includes/footer.php' ?>
