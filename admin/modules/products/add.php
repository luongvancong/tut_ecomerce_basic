<?php
    require_once __DIR__ . '/../../bootstrap/autoload.php';

    $mCategory = $application['category'];
    $mProduct = $application['product'];

    // Lấy thông tin từ form
    $action = array_get($_POST, 'action');
    $name = array_get($_POST, 'name');
    $teaser = array_get($_POST, 'teaser');
    $content = array_get($_POST, 'content');
    $category_id = (int) array_get($_POST, 'category_id');
    $price = (int) array_get($_POST, 'price');
    $promotion_price = (int) array_get($_POST, 'promotion_price');
    $quantity = (int) array_get($_POST, 'quantity');

    // Validate
    $errors = [];
    if($action == 'update') {
        if($name == '') {
            $errors['name'] = 'Vui lòng nhập tên sản phẩm';
        }

        if($teaser == '') {
            $errors['teaser'] = 'Vui lòng nhập mô tả ngắn sản phẩm';
        }

        if($content == '') {
            $errors['content'] = 'Vui lòng nhập mô tả sản phẩm';
        }

        if($category_id == 0) {
            $errors['category_id'] = 'Vui lòng chọn danh mục';
        }

        if($price == 0) {
            $errors['price'] = 'Vui lòng nhập giá';
        }

        if(empty($errors)) {
            $data = [
                'name'            => $name,
                'price'           => $price,
                'promotion_price' => $promotion_price,
                'quantity'        => $quantity,
                'teaser'          => $teaser,
                'content'         => $content,
                'category_id'     => $category_id
            ];

            // Nếu chọn ảnh để upload
            if(isset($_FILES['image'])) {
                $image = upload('image');
                $data['image'] = $image;
            }

            $insertId = $mProduct->insert($data);

            if($insertId > 0) {
                redirect('listing.php?insert=1');
            } else {
                redirect('listing.php?insert=0');
            }
        }
    }

    // Get categories
    $categories = $mCategory->getCategories();

?>

<?php include ROOT . '/includes/header.php' ?>
<div class="page-header">
    <h1>
        Thêm sản phẩm
        <a href="listing.php" class="btn btn-sm btn-default pull-right">Quay lại</a>
    </h1>
</div>

<form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-3">Ảnh đại diện</label>
        <div class="col-sm-6">
            <input type="file" name="image">
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['name']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Tên</label>
        <div class="col-sm-6">
            <input type="text" name="name" value="<?php echo $name ?>" class="form-control">
            <?php if(isset($errors['name'])) : ?>
                <span class="help-block"><?php echo $errors['name'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['quantity']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Số lượng</label>
        <div class="col-sm-6">
            <input type="text" name="quantity" value="<?php echo $quantity ?>" class="form-control">
            <?php if(isset($errors['quantity'])) : ?>
                <span class="help-block"><?php echo $errors['quantity'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['price']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Gía</label>
        <div class="col-sm-6">
            <input type="text" name="price" value="<?php echo $price ?>" class="form-control">
            <?php if(isset($errors['price'])) : ?>
                <span class="help-block"><?php echo $errors['price'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['promotion_price']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Giá khuyến mãi</label>
        <div class="col-sm-6">
            <input type="text" name="promotion_price" value="<?php echo $promotion_price ?>" class="form-control">
            <?php if(isset($errors['promotion_price'])) : ?>
                <span class="help-block"><?php echo $errors['promotion_price'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['category_id']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Danh mục</label>
        <div class="col-sm-6">
            <select class="form-control" name="category_id">
                <option value="">Danh mục</option>
                <?php foreach($categories as $item): ?>
                <option value="<?php echo $item['id'] ?>"><?php for($i = 0; $i < $item['level']; $i ++) echo '--'; ?><?php echo $item['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if(isset($errors['promotion_price'])) : ?>
                <span class="help-block"><?php echo $errors['promotion_price'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['teaser']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Mô tả ngắn</label>
        <div class="col-sm-6">
            <textarea name="teaser" class="form-control"><?php echo $teaser ?></textarea>
            <?php if(isset($errors['teaser'])) : ?>
                <span class="help-block"><?php echo $errors['teaser'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($errors['content']) ? 'has-error' : '' ?>">
        <label class="control-label col-sm-3">Mô tả</label>
        <div class="col-sm-12">
            <textarea name="content" class="editor"><?php echo $content ?></textarea>
            <?php if(isset($errors['content'])) : ?>
                <span class="help-block"><?php echo $errors['content'] ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <input type="hidden" name="action" value="update">
            <button style="submit" class="btn btn-sm btn-primary">Cập nhật</button>
        </div>
    </div>
</form>

<?php include ROOT . '/includes/footer.php' ?>