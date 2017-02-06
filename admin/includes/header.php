<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Dashboard Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="/assets/css/bs3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome/css/font-awesome.min.css">
        <style type="text/css">
            .sidebar {
                position: fixed;
                left: 0;
                top: 0px;
                background: #fff;
                border-right: 1px solid #ccc;
                min-height: 100%;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="pull-right">
                <div>Hi <?php echo $_SESSION['login_name'] ?></div>
                <a href="/admin/logout.php" class="text-right">Logout</a>
            </div>
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="/admin/modules/settings/setting.php">Setting</a></li>
                        <li><a href="/admin/modules/product_category/listing.php">Product Category</a></li>
                        <li><a href="/admin/modules/products/listing.php"><i class="fa fa-cubes"></i> Products</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3">