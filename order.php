<?php

require_once 'bootstrap/autoload.php';

$metadata['title'] = "Thông tin đơn hàng, nhập thông tin khách hàng";

$action = array_get($_POST, 'action', '');

$customerName    = array_get($_POST, 'customer_name');
$customerAddress = array_get($_POST, 'customer_address', '');
$customerEmail   = array_get($_POST, 'customer_email', '');
$customerPhone   = array_get($_POST, 'customer_phone', '');
$customerNote    = array_get($_POST, 'customer_note', '');

if($action == 'update') {
    // Lặp giỏ hàng để tính toán tổng tiền của các sản phẩm trong giỏ hàng
    $totalMoneyItemCart = 0;
    $mProduct = $application['product'];
    foreach($_SESSION['cart'] as $productId => $quantity) {
        $product = $mProduct->getById($productId);
        $totalMoneyItemCart += ($product['price'] * $quantity);
    }

    // Lưu thông tin đơn hàng
    $mOrder = $application['order'];
    $orderId = $mOrder->insert([
        'customer_name'    => $customerName,
        'customer_address' => $customerAddress,
        'customer_phone'   => $customerPhone,
        'customer_note'    => $customerNote,
        'customer_email'   => $customerEmail,
        'total_money'      => $totalMoneyItemCart
    ]);

    // Lưu thông tin đơn hàng chi tiết
    $mOrderDetail = $application['orderDetail'];
    foreach($_SESSION['cart'] as $productId => $quantity) {
        $product = $mProduct->getById($productId);
        $mOrderDetail->insert([
            'order_id' => $orderId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $product['price'],
            'money' => $product['price'] * $quantity
        ]);
    }

    // Xóa giỏ hàng của khách
    unset($_SESSION['cart']);

    // Chuyển về trang chủ
    redirect('/');
}

?>

<?php include ROOT_PATH . '/includes/inc_header.php' ?>

<div class="order container">
    <div class="row">
        <div class="col-sm-3">
            <h3>Thông tin khách hàng</h3>
            <form method="POST" action="" class="form">
                <div class="form-group">
                    <label class="control-label">Họ và tên</label>
                    <input type="text" name="customer_name" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <input type="text" name="customer_phone" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="text" name="customer_email" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Địa chỉ</label>
                    <input type="text" name="customer_address" required class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Ghi chú</label>
                    <textarea class="form-control" name="customer_note"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="action" value="update">
                    <button type="submit" class="btn btn-sm btn-primary">Gửi đơn hàng</button>
                </div>
            </form>
        </div>
        <div class="col-sm-9">
            <h3>Thông tin giỏ hàng</h3>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include ROOT_PATH . '/includes/inc_footer.php' ?>