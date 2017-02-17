<li class="item first fadeIn animated">
    <a class="product-image" title="<?php echo $item['name'] ?>" href="product_detail.php?id=<?php echo $item['id'] ?>">
        <img src="/uploads/<?php echo $item['image'] ?>" width="249" height="180" alt="<?php echo $item['name'] ?>">
    </a>
    <h2 class="product-name"> <a title="<?php echo $item['name'] ?>" href="/"> <?php echo $item['name'] ?> </a> </h2>
    <div class="actions">
        <a class="btn-circle first-bg-hover" href="/cart.php?action=add&product_id=<?php echo $item['id'] ?>&quantity=1&return_url=<?php echo $_SERVER['REQUEST_URI'] ?>"> <i class="icon-shopping-cart"></i> </a>
    </div>
</li>