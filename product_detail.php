<?php
require_once 'bootstrap/autoload.php';

$productId = (int) array_get($_GET, 'id');

$mProduct = $application['product'];

$product = $mProduct->getById($productId, "products.*, product_categories.id as cat_id, product_categories.name as cat_name");


?>

<?php include ROOT_PATH . '/includes/inc_header.php' ?>

    <style type="text/css">
        .prettyPhoto > img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center center;
        }
        .product-content img {
            max-width: 100%;
        }
    </style>

    <div class="category-full-image">
        <!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
              $('.category-slider').bxSlider({

                   auto: true,
                   mode:'fade'



              });
            });
        </script>
        <ul class="category-slider">
            <li>  <img src="/assets/media/slide-01.jpg" width="1920" height="536"></li>
            <li>  <img src="/assets/media/slide-02.jpg" width="1920" height="536"></li>
            <li>  <img src="/assets/media/slide-03.jpg" width="1920" height="536"></li>
        </ul>
    </div>
    <div class="container_9 title-container">
        <div class="page-title first-bg"> Furniture </div>
        <div class="breadcrumb">
            <a title="return to Home" href="/">Trang chủ</a>
            <span class="navigation-pipe">/</span>
            <a title="return to Home" href="/category.php?id=<?php echo $product['category_id'] ?>"><?php echo $product['cat_name'] ?></a>
            <span class="navigation-pipe">/</span>
            <span class="navigation_page"><?php echo $product['name'] ?></span>
        </div>
    </div>
    <section  id="columns" class="container_9 clearfix col2-right">
        <!-- Center -->
        <article id="center_column" class=" grid_5">
            <div class="clearfix" id="primary_block">
                <!-- right infos-->
                <div id="pb-right-column">
                    <!-- product img-->
                    <div id="image-block">
                        <link rel="stylesheet" href="css/prettyPhoto.css" />
                        <script src="js/jquery.prettyPhoto.js"></script>
                        <script type="text/javascript">
                            jQuery(document).ready(function() {

                            $(".prettyPhoto").prettyPhoto();

                            });

                        </script>
                        <a class="prettyPhoto" href="media/246-thickbox_default.jpg"><img src="/uploads/<?php echo $product['image'] ?>"></a>
                    </div>
                </div>
                <div id="pb-left-column">
                    <div id="short_description_block">
                        <h1><?php echo $product['name'] ?></h1>
                        <div class="price">
                            <p class="our_price_display"> <span id="our_price_display"><?php echo number_format($product['price'], 0, '.', '.') ?></span> </p>
                        </div>
                        <div class="rte align_justify" id="short_description_content">
                            <?php echo $product['teaser'] ?>
                        </div>
                    </div>
                    <form method="post" action="controller=cart" id="buy_block">
                        <div class="product_attributes">
                            <div class="add-to-box">
                                <script>
                                    $(document).ready(function(){



                                            $(".input a").click(function () {
                                            var inputEl = $(this).parent().parent().children().next().children();
                                            var qty = inputEl.val();
                                            if ($(this).parent().hasClass("plus"))
                                                qty++;
                                            else
                                                qty--;
                                            if (qty < 0)
                                                qty = 0;
                                            inputEl.val(qty);
                                        })



                                    });
                                </script>
                                <div class="input-qty-box">
                                    <div class="input">
                                        <ul class="range">
                                            <li class="item minus"><a style=" cursor:pointer">-</a></li>
                                            <li>
                                                <input type="text" maxlength="3" size="2" value="1" class="input-text qty text" id="quantity_wanted" name="qty">
                                            </li>
                                            <li class="item plus"><a style=" cursor:pointer">+</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="btn-icon btn" href="/cart.php?product_id=<?php echo $product['id'] ?>&action=add"><i class="icon-shopping-cart"></i> Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function(){



                    $('.content-li:first').addClass ('active');
                    $('.content-li:first').css ('display', 'block');

                    $('ul.i-tab').delegate('li:not(.active)', 'click', function() {
                    $(this).addClass('active').siblings().removeClass('active')
                    .parents('.tabs').find('ul.tab-content .content-li').hide()
                    .eq($(this).index()).show();
                    })



                });
            </script>
            <div class="tabs">
                <ul class="i-tab">
                    <li class="active first-bg-hover"> Mô tả về sản phẩm </li>
                </ul>
                <ul class="tab-content">
                    <li class="content-li active" style="display: block;">
                        <div class="box-collateral box-description">
                            <div class="std product-content">
                                <?php echo $product['content'] ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </article>

        <?php include ROOT_PATH . '/includes/inc_right_sidebar.php'; ?>
    </section>

<?php include ROOT_PATH . '/includes/inc_footer.php' ?>