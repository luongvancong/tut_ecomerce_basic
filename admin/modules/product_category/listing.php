<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

$sql = "SELECT * FROM product_categories";
$result = mysqli_query($link, $sql);
$tempCategories = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tempCategories[] = $row;
}

$sortObj = new Sort($tempCategories);
$sortCategories = $sortObj->getCategories();

?>

<?php include ROOT . '/includes/header.php' ?>

<div>

    <?php include ROOT . '/includes/notification.php' ?>

    <div class="page-header">
        <h1>
            Product Category
            <a class="btn btn-sm btn-primary pull-right" href="/admin/modules/product_category/add.php">Thêm mới</a>
        </h1>
    </div>

    <table class="table table-stripped table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th width="30">Edit</th>
            <th width="30">Del</th>
        </thead>
        <tbody>
            <?php foreach($sortCategories as $cat) : ?>
                <tr>
                    <td><?php echo $cat['id'] ?></td>
                    <td>
                        <?php
                            for($i = 0; $i < $cat['level']; $i++) {
                                echo '----';
                            }
                            echo $cat['name'];
                        ?>
                    </td>
                    <td>
                        <a href="/admin/modules/product_category/edit.php?id=<?php echo $cat['id'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="/admin/modules/product_category/delete.php?id=<?php echo $cat['id'] ?>" class="text-danger"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<?php include ROOT . '/includes/footer.php' ?>
