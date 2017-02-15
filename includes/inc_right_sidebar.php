<!-- Right -->
<aside id="right_column" class="column grid_2 omega">
    <!-- Block categories module -->
    <div id="categories_block_left" class="block">
        <h4 class="title_block">Danh mục</h4>
        <div class="block_content">
            <ul class="tree dhtml">
                <?php foreach($categories as $item): ?>
                <li>
                    <a href="/category.php?id=<?php echo $item['id'] ?>" title=""><?php echo $item['name'] ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</aside>