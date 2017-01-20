<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

// Lay thong tin cau hinh
$sql = "SELECT * FROM settings LIMIT 1";
$result = mysqli_query($link, $sql);
$setting = mysqli_fetch_assoc($result);

// Update thong tin
$action = array_get($_POST, 'action');
$companyName = array_get($_POST, 'company_name');
$address = array_get($_POST, 'address');

if($action == 'update') {
    $sql = "
        UPDATE settings SET company_name = '". $companyName ."', address='". $address ."' WHERE id = 1
    ";
    mysqli_query($link, $sql);
    redirect($_SERVER['REQUEST_URI']);
}


?>

<?php include ROOT . '/includes/header.php' ?>

<div>
    <div class="page-header">
        <h1>Cấu hình</h1>
    </div>
    <form class="form form-horizontal" method="POST" enctype="multipart/form-data">

        <?php if(is_file($_SERVER['DOCUMENT_ROOT'] . '/uploads/'.  array_get($setting, 'logo'))) : ?>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <img height="90" src="/uploads/<?php echo array_get($setting, 'logo') ?>">
            </div>
        </div>
        <?php endif; ?>

        <div class="form-group">
            <label class="control-label col-sm-3">Logo</label>
            <div class="col-sm-6">
                <input type="file" name="logo" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Company name</label>
            <div class="col-sm-6">
                <input type="text" name="company_name" value="<?php echo array_get($setting, 'company_name') ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Address</label>
            <div class="col-sm-6">
                <input type="text" name="address" value="<?php echo array_get($setting, 'address') ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <input type="hidden" name="action" value="update">
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                <a href="/admin">Back</a>
            </div>
        </div>
    </form>
</div>

<?php include ROOT . '/includes/footer.php' ?>