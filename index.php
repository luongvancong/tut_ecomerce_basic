<?php

require_once 'bootstrap/autoload.php';

$hotProducts = $application['product']->getProducts(12, ['hot' => 1]);
$newestProducts = $application['product']->getProducts(12);
?>

<?php include ROOT_PATH . '/includes/inc_header.php' ?>
            <div class="slider-home-page">
                <div id="iview">
                    <div data-iview:thumbnail="/assets/photos/photo11_thumb.jpg" data-iview:image="/assets/media/slide-01.jpg">
                        <div class="iview-caption caption1" data-x="100" data-y="150" data-transition="expandDown">
                            <h3>AWESOME FURNITURE</h3>
                            <h5> <strong>50%</strong> OFF<br>
                                TRENDY <strong>DESIGNS</strong>
                            </h5>
                        </div>
                    </div>
                    <div data-iview:thumbnail="/assets/photos/photo12_thumb.jpg" data-iview:image="/assets/media/slide-02.jpg" data-iview:transition="block-drop-random" data-iview:pausetime="2000">
                        <div class="iview-caption caption1" data-x="100" data-y="150" data-transition="expandDRight">
                            <h3>AWESOME FURNITURE</h3>
                            <h5> <strong>50%</strong> OFF<br>
                                TRENDY <strong>DESIGNS</strong>
                            </h5>
                        </div>
                    </div>
                    <div data-iview:thumbnail="/assets/photos/photo13_thumb.jpg" data-iview:image="/assets/media/slide-03.jpg">
                        <div class="iview-caption caption1" data-x="100" data-y="150" data-transition="expandLeft">
                            <h3>AWESOME FURNITURE</h3>
                            <h5> <strong>50%</strong> OFF<br>
                                TRENDY <strong>DESIGNS</strong>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <section  id="columns" class="container_9 clearfix col1" >
                <!-- Center -->
                <article id="center_column" class=" grid_5" >
                    <div class="category-list">
                        <ul class="products-grid first ">
                            <?php foreach($categories as $key => $item): ?>
                            <li class="fadeIn animated <?php echo $key == $countCategories-1 ? 'last' : '' ?>">
                                <span class="overlay first-bg"> </span>
                                <h3><a href="#"><?php echo $item['name'] ?></a></h3>
                                <a href="#"> <img src="/assets/media/cat.jpg" width="369" height="133"></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="width-carousel">
                        <div class="title-box">
                            <h3 class="title-carousel first-brd">Sản phẩm nổi bật</h3>
                        </div>

                        <ul class="products-grid first odd <?php echo count($hotProducts) > 4 ? 'bxslider' : '' ?>">
                            <?php foreach($hotProducts as $item): ?>
                                <?php include ROOT_PATH . '/includes/inc_product_item.php' ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="promo-home">
                        <ul>
                            <li class="first-bg"><a href="#"><img src="/assets/media/promo1.png"></a></li>
                            <li class="first-bg"><a href="#"><img src="/assets/media/promo2.png"></a></li>
                            <li class="first-bg last"><a href="#"><img src="/assets/media/promo3.png" ></a></li>
                        </ul>
                    </div>
                    <div class="width-carousel">
                        <div class="title-box">
                            <h3 class="title-carousel first-brd">Sản phẩm mới</h3>
                        </div>

                        <ul class="products-grid first odd <?php echo count($newestProducts) > 4 ? 'bxslider' : '' ?>">
                            <?php foreach($newestProducts as $item): ?>
                                <?php include ROOT_PATH . '/includes/inc_product_item.php' ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="width-carousel brand-carousel">
                        <div class="title-box">
                            <h3 class="title-carousel first-brd">Our Brands</h3>
                        </div>

                        <ul class="products-grid first odd bxslider2">
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/5.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/6.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/7.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/8.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/5.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/6.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/7.jpg" width="193" height="92"></a> </li>
                            <li class="item first fadeIn animated"> <a href="#"><img src="/assets/media/8.jpg" width="193" height="92"></a> </li>
                        </ul>
                    </div>
                </article>
            </section>
            <div class="footer-info first-bg">
                <div class="container_9 clearfix">
                    <p><a href="/"><img src="/assets/media/footer-banner.png" alt=""></a></p>
                </div>
            </div>
            <!-- Footer -->
            <?php include ROOT_PATH . '/includes/inc_footer.php' ?>
        </div>
    </body>
</html>


