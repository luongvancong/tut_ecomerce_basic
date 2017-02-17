<?php

require_once 'bootstrap/autoload.php';

$mProduct = $application['product'];
?>

<?php include ROOT_PATH . '/includes/inc_header.php' ?>

<div id="cart-listing">

        <table class="table table-hover table-stripped">
            <thead>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php foreach($_SESSION['cart'] as $productId => $quantity): ?>
                    <form method="GET" action="/cart.php">
                        <?php
                            $product = $mProduct->getById($productId);
                        ?>
                        <tr>
                            <td><?php echo $product['name'] ?></td>
                            <td>
                                <input type="text" name="quantity" value="<?php echo $quantity ?>" class="form-control" style="border: 1px solid #ccc; padding: 7px;">
                            </td>
                            <td><?php echo formatCurrency($product['price']) ?></td>
                            <td><?php echo formatCurrency($product['price'] * $quantity) ?></td>
                            <td>
                                <a href="/cart.php?action=remove&product_id=<?php echo $productId ?>&return_url=<?php echo $_SERVER['REQUEST_URI'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                                <input type="hidden" name="return_url" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="product_id" value="<?php echo $productId ?>">
                                <button class="btn btn-sm btn-info">Cập nhật</button>
                            </td>
                        </tr>
                    </form>
                <?php endforeach;?>
                <tr>
                    <td colspan="2"></td>
                    <td>Tổng tiền:</td>
                    <td><span style="font-weight: bold; color: red; font-size: 16px;"><?php echo formatCurrency($totalMoneyItemCart) ?></span></td>
                    <td><a href="/order.php" class="btn btn-sm btn-primary">Gửi đơn hàng</a></td>
                </tr>
            </tbody>
        </table>

        <a href="/" class="pull-right" style="margin: 0 20px 20px 0;">Quay lại trang chủ</a>
        <div class="clearfix"></div>

</div>

<?php include ROOT_PATH . '/includes/inc_footer.php' ?>