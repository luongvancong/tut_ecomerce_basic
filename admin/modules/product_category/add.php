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

    // Add
    $action = array_get($_POST, 'action');
    $name = array_get($_POST, 'name');
    $slug = array_get($_POST, 'slug');
    $sort = (int) array_get($_POST, 'sort');
    $parentId = (int) array_get($_POST, 'parent_id');

    $errors = [];

    if($action == 'update') {
        if($name == '') {
            $errors['name'] = 'Vui long nhap ten danh muc';
        }

        if(empty($errors)) {
            $sqlInsert = "
                INSERT INTO product_categories(name, parent_id, slug, sort)
                VALUES('". $name ."', ". $parentId .", '". $slug ."', ". $sort .")
            ";
            // echo $sqlInsert;
            mysqli_query($link, $sqlInsert) or die(mysqli_error($link));
            $categoryId = mysqli_insert_id($link);
            if($categoryId > 0) {
                redirect('/admin/modules/product_category/listing.php?insert=1');
            } else {
                redirect('/admin/modules/product_categoriesy/listing.php?insert=0');
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
                    <option value="<?php echo $item['id'] ?>"><?php for($i = 0; $i < $item['level']; $i ++) echo '--'; ?><?php echo $item['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group <?php echo isset($errors['name']) ? 'has-error' : '' ?>">
            <label class="control-label col-sm-3">Name <b class="text-danger">*</b></label>
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control">
                <?php if(isset($errors['name'])) : ?>
                <span class="help-block"><?php echo $errors['name'] ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3">Slug</label>
            <div class="col-sm-6">
                <input type="text" name="slug" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-3">Sort</label>
            <div class="col-sm-6">
                <input type="text" name="sort" value="" class="form-control">
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