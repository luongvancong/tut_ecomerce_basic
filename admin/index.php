<?php
require_once __DIR__ . '/bootstrap/autoload.php';

// Neu chua dang nhap thi phai dang nhap
if(isset($_SESSION['logged']) && $_SESSION['logged'] === 0) {
    header('Location: login.php');
    exit;
}

?>
<?php include 'includes/header.php' ?>
    <h1 class="page-header">Dashboard</h1>
    <div class="row placeholders">
        <a href="modules/settings/setting.php" class="btn btn-lg btn-danger"><i class="fa fa-cogs"></i> Settings</a>
        <a href="" class="btn btn-lg btn-info"><i class="fa fa-users"></i> Users</a>
        <a href="" class="btn btn-lg btn-success"><i class="fa fa-database"></i> Products</a>
        <a href="modules/product_category/listing.php" class="btn btn-lg btn-default"><i class="fa fa-database"></i> Products Category</a>
        <a href="" class="btn btn-lg btn-default"><i class="fa fa-leaf"></i> Posts</a>
    </div>
<?php include 'includes/footer.php' ?>