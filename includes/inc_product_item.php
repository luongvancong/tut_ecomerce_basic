<li class="item first fadeIn animated">
    <a class="product-image" title="<?php echo $item['name'] ?>" href="product_detail.php?id=<?php echo $item['id'] ?>">
        <img src="/uploads/<?php echo $item['image'] ?>" width="249" height="180" alt="<?php echo $item['name'] ?>">
    </a>
    <h2 class="product-name"> <a title="<?php echo $item['name'] ?>" href="/"> <?php echo $item['name'] ?> </a> </h2>
    <div class="actions">
        <a class="btn-circle first-bg-hover"> <i class="icon-shopping-cart"></i> </a>
    </div>
</li>