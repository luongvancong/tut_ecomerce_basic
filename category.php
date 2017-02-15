<?php

require_once 'bootstrap/autoload.php';

$categoryId = (int) array_get($_GET, 'id');
$currentPage = (int) array_get($_GET, 'page');

$mCategory = $application['category'];
$mProduct = $application['product'];

$perPage = 20;
$products = $mProduct->getProducts($perPage, ['category_id' => $categoryId]);

// Đếm tổng số bản ghi
$sqlTotal = "SELECT COUNT(*) as count FROM products WHERE category_id = " . $categoryId;
$total = $application['database']->fetch($sqlTotal);
$total = $total['count'];

// Phân trang
$pagination = new Pagination($total, $perPage, $currentPage);
?>

<?php include ROOT_PATH . '/includes/inc_header.php' ?>
<style type="text/css">
    .products-grid li.item {
        width: 260px;
    }
</style>

<div class="category-full-image">
    <ul class="category-slider">
        <li> <img src="/assets/media/page-title-bg.jpg"></li>
    </ul>
</div>

<div class="container_9 title-container">
   <div class="page-title first-bg"> Furniture </div>
   <div class="breadcrumb"> <a title="return to Home" href="/">Home</a> <span class="navigation-pipe">/</span> <span class="navigation_page">Living Room</span> </div>
</div>

<section id="columns" class="container_9 clearfix col2-right">
   <!-- Center -->
   <article id="center_column" class=" grid_5">
        <ul class="products-grid">
            <?php foreach($products as $item): ?>
                <?php include ROOT_PATH . '/includes/inc_product_item.php' ?>
            <?php endforeach; ?>
        </ul>

        <div class="pagination">
            <?php echo $pagination->links() ?>
        </div>
   </article>

    <?php include ROOT_PATH . '/includes/inc_right_sidebar.php'; ?>
</section>

<?php include ROOT_PATH . '/includes/inc_footer.php' ?>