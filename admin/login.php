<?php
    require_once 'bootstrap/autoload.php';

    if($_SESSION['logged'] == 1) {
        header('Location: /admin');
    }

    $action    = isset($_POST['action']) ? $_POST['action'] : '';
    $loginName = isset($_POST['login_name']) ? $_POST['login_name'] : '';
    $password  = isset($_POST['password']) ? $_POST['password'] : '';

    $errors = [];
    $errorMessage = '';
    if($action == 'submit') {
        if($loginName == '') {
            $errors['login_name'] = 'Vui long nhap username';
        }

        if($password == '') {
            $errors['password'] = 'Vui long nhap password';
        }

        if(empty($errors)) {
            // Kiem tra username va password co dung ko
            $sql = "SELECT * FROM admin_users
                    WHERE login_name = '". mysqli_real_escape_string($link, $loginName) ."'
                    AND password='". md5($password) ."'
                    LIMIT 1";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $user = mysqli_fetch_assoc($result);
            if(!$user) {
                $errorMessage = 'Sai username hoặc mật khẩu';
            } else {
                // Ghi session
                $_SESSION['logged'] = 1;
                $_SESSION['login_name'] = $user['login_name'];
                $_SESSION['login_id'] = $user['id'];
            }

            // Redirect va thong bao trang thai
            if(isset($_SESSION['logged']) && $_SESSION['logged'] === 1) {
                header('Location: /admin');
                exit;
            }
        }
    }


?><!DOCTYPE html>
<html>
<head>
    <title>Admin login</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bs3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/jquery-ui-1.12.1/jquery-ui.min.css">
</head>
<body>
    <div class="container">
        <?php if($errorMessage) : ?>
            <div class="alert alert-danger"><?php echo $errorMessage ?></div>
        <?php endif; ?>
        <form class="form-horizontal" method="POST" action="" style="margin-top: 50px;">
            <div class="form-group <?php echo isset($errors['login_name']) ? 'has-error' : '' ?>">
                <label class="col-sm-3 control-label">Login name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="login_name" value="<?php echo $loginName ?>">
                    <?php if(isset($errors['login_name'])) : ?>
                        <span class="help-block text-danger"><?php echo $errors['login_name'] ?></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control date-picker" name="password" value="<?php echo $password ?>">
                    <?php if(isset($errors['password'])) : ?>
                        <span class="help-block text-danger"><?php echo $errors['password'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="hidden" name="action" value="submit">
                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>

<script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>

</body>
</html>