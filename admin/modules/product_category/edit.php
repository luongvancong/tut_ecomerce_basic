<?php
    require_once __DIR__ . '/../../bootstrap/autoload.php';

    // Get categories
    $sql = "SELECT * FROM product_categories";
    $result = mysqli_query($link, $sql);

    $categories = [];
    while($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    // Sắp xếp danh mục
    $sortObj = new Sort($categories);
    $categories = $sortObj->getCategories();

    $categoryId = (int) $_GET['id'];

    // Lấy thông tin danh mục
    $sql = "SELECT * FROM product_categories WHERE id = " . $categoryId;
    $result = mysqli_query($link, $sql) or die(mysqli_error());
    $category = mysqli_fetch_assoc($result);

    if(empty($category)) {
        redirect('/admin/404.php');
    }

    // Add
    $action   = array_get($_POST, 'action');
    $name     = array_get($_POST, 'name', $category['name']);
    $slug     = array_get($_POST, 'slug', $category['slug']);
    $sort     = (int) array_get($_POST, 'sort', $category['sort']);
    $parentId = (int) array_get($_POST, 'parent_id', $category['parent_id']);

    $errors = [];

    if($action == 'update') {
        if($name == '') {
            $errors['name'] = 'Vui long nhap ten danh muc';
        }

        if(empty($errors)) {
            $sqlInsert = "
                UPDATE product_categories SET name='". $name ."', slug='". $slug ."', sort=". $sort .", parent_id=". $parentId ."
                WHERE id=". $categoryId ."
            ";

            // echo $sqlInsert;
            mysqli_query($link, $sqlInsert) or die(mysqli_error($link));

            if(mysqli_affected_rows($link)) {
                redirect('/admin/modules/product_category/listing.php?update=1');
            } else {
                redirect('/admin/modules/product_category/listing.php?update=0');
            }
        }
    }

?>
<?php include ROOT . '/includes/header.php' ?>

<div>
    <div class="page-header">
        <h1>Product Category</h1>
    </div>
    <form class="form form-horizontal" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label class="control-label col-sm-3">Parent</label>
            <div class="col-sm-6">
                <select class="form-control" name="parent_id">
                    <option value="">Parent</option>
                    <?php foreach($categories as $item): ?>
                    <option value="<?php echo $item['id'] ?>" <?php echo $item['id'] == $category['parent_id'] ? 'selected="selected"': '' ?> ><?php for($i = 0; $i < $item['level']; $i ++) echo '--'; ?><?php echo $item['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group <?php echo isset($errors['name']) ? 'has-error' : '' ?>">
            <label class="control-label col-sm-3">Name <b class="text-danger">*</b></label>
            <div class="col-sm-6">
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control">
                <?php if(isset($errors['name'])) : ?>
                <span class="help-block"><?php echo $errors['name'] ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Slug</label>
            <div class="col-sm-6">
                <input type="text" name="slug" value="<?php echo $slug ?>" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-3">Sort</label>
            <div class="col-sm-6">
                <input type="text" name="sort" value="<?php echo $sort ?>" class="form-control">
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