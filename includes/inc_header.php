<?php
    $categories = $application['category']->getCategories();
    $countCategories = count($categories);

    $glbSetting = $application['setting']->getSetting();

?><!DOCTYPE html>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 8 ]>
<html class="ie8">
<![endif]-->
<!--[if IE 9 ]>
<html class="ie9">
<![endif]-->
<!--[if IE 7]>
<script type="text/javascript">
    location.replace("http://windows.microsoft.com/en-US/internet-explorer/products/ie/home");
</script>
<![endif]-->
<html>
    <head>
        <title>Online Sale</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="/assets/css/styles.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/assets/css/custom-style.css" rel="stylesheet" type="text/css" media="all" />
        <!--[if IE 8 ]>
        <link href="css/ie-grid.css" rel="stylesheet" type="text/css" media="all" />
        <![endif]-->
        <script src="/assets/js/jquery-1.7.1.min.js"></script>
        <script src="/assets/js/modernizr.custom.js"></script>
        <link rel="stylesheet" href="/assets/css/prettyPhoto.css" />
        <script src="/assets/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {

            $(".fa-search-btn").prettyPhoto();


            });

        </script>

        <!--[if IE 8 ]>
        <link rel="stylesheet" href="css/skin 4/ie-style.css" />
        <![endif]-->
        <link rel="stylesheet" href="/assets/css/iview.css" />
        <link rel="stylesheet" href="/assets/css/skin 4/style.css" />
        <script type="text/javascript" src="/assets/js/raphael-min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.easing.js"></script>
        <script src="/assets/js/iview.js"></script>
        <script>
            $(document).ready(function(){
                $('#iview').iView({
                          pauseTime: 7000,
                    pauseOnHover: true,
                    directionNav: true,
                    directionNavHide: false,
                    controlNav: true,
                    controlNavNextPrev: false,
                    controlNavTooltip: false,
                    nextLabel: "Próximo",
                    previousLabel: "Anterior",
                    playLabel: "Jugada",
                    pauseLabel: "Pausa",
                    timer: "360Bar",
                    timerBg: "#EEE",
                    timerColor: "#000",
                    timerDiameter: 40,
                    timerPadding: 4,
                    timerStroke: 8,
                    timerPosition: "bottom-right"
                });
            });
        </script>

        <!-- bxSlider Javascript file -->
        <script src="/assets/js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="/assets/css/jquery.bxslider.css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
              $('.bxslider2').bxSlider({
                slideWidth: 193,
                minSlides: 7,
                maxSlides: 7
              });
            });
        </script>


        <!-- bxSlider Javascript file -->
        <script src="/assets/js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="/assets/css/jquery.bxslider.css" rel="stylesheet" />
        <script>
            $(document).ready(function(){
              $('.bxslider').bxSlider({
                slideWidth: 270,
                minSlides: 4,
                maxSlides: 4,
                slideMargin: 28
              });
            });
        </script>



    </head>
    <body id="index" class=" ">
        <div id="page" class="clearfix">
            <div class="navbar navbar-static top-links first-bg" >
                <div class="navbar-inner container_9">
                    <ul id="header_nav" class="nav pull-right">
                        <li ><i class="icon-shopping-cart"></i> <a href="#">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
            <!-- Header -->
            <header id="header" role="heading" class="third-bg" >
                <div class="header-content container_9">
                    <a title="onlinestore" href="home.html" class="logo "><img alt="logo" src="/assets/media/logo.jpg"></a>
                    <div class="quick-access">
                        <ul>
                            <li > <a rel="nofollow" title="View my exchange" href="/" class="cart-btn first-bg" > <i class="icon-exchange"></i> </a> </li>
                            <li > <a rel="nofollow" title="View my shopping cart" href="/" class="cart-btn  first-bg" > <i class="icon-shopping-cart"></i> </a> <span>0 - 0 VNĐ</span> </li>
                        </ul>
                    </div>
                    <form method="get" action="index.php?controller=search" id="searchbox">
                        <p>
                            <input type="text" placeholder="Bạn muốn tìm gì?" value="" name="search_query">
                        </p>
                    </form>
                </div>
                <script src="/assets/js/jquery.dlmenu.js"></script>
                <script>
                    $(function() {
                    $( '#dl-menu' ).dlmenu();

                    $(".sf-menu li.item").hover(
                       function () {

                     $(this).children('a').addClass('hover');
                       },
                       function () {
                           $(this).children('a').removeClass('hover');
                       }
                     );


                    });
                </script>
                <div id="dl-menu" class="dl-menuwrapper" style="display:none;">
                    <button class="dl-trigger">Open Menu</button>
                    <ul class="dl-menu">
                        <li>
                            <a href="#">Fashion</a>
                            <ul class="dl-submenu">
                                <li>
                                    <a href="#">Men</a>
                                    <ul class="dl-submenu">
                                        <li><a href="product-list.html">Shirts</a></li>
                                        <li><a href="product-list.html">Jackets</a></li>
                                        <li><a href="product-list.html">Chinos &amp; Trousers</a></li>
                                        <li><a href="product-list.html">Jeans</a></li>
                                        <li><a href="product-list.html">T-Shirts</a></li>
                                        <li><a href="product-list.html">Underwear</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Women</a>
                                    <ul class="dl-submenu">
                                        <li><a href="product-list.html">Jackets</a></li>
                                        <li><a href="product-list.html">Knits</a></li>
                                        <li><a href="product-list.html">Jeans</a></li>
                                        <li><a href="product-list.html">Dresses</a></li>
                                        <li><a href="product-list.html">Blouses</a></li>
                                        <li><a href="product-list.html">T-Shirts</a></li>
                                        <li><a href="product-list.html">Underwear</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Children</a>
                                    <ul class="dl-submenu">
                                        <li><a href="product-list.html">Boys</a></li>
                                        <li><a href="product-list.html">Girls</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Electronics</a>
                            <ul class="dl-submenu">
                                <li><a href="product-list.html">Camera &amp; Photo</a></li>
                                <li><a href="product-list.html">TV &amp; Home Cinema</a></li>
                                <li><a href="product-list.html">Phones</a></li>
                                <li><a href="product-list.html">PC &amp; Video Games</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Furniture</a>
                            <ul class="dl-submenu">
                                <li>
                                    <a href="product-list.html">Living Room</a>
                                    <ul class="dl-submenu">
                                        <li><a href="product-list.html">Sofas &amp; Loveseats</a></li>
                                        <li><a href="product-list.html">Coffee &amp; Accent Tables</a></li>
                                        <li><a href="product-list.html">Chairs &amp; Recliners</a></li>
                                        <li><a href="product-list.html">Bookshelves</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Bedroom</a>
                                    <ul class="dl-submenu">
                                        <li>
                                            <a href="#">Beds</a>
                                            <ul class="dl-submenu">
                                                <li><a href="product-list.html">Upholstered Beds</a></li>
                                                <li><a href="product-list.html">Divans</a></li>
                                                <li><a href="product-list.html">Metal Beds</a></li>
                                                <li><a href="product-list.html">Storage Beds</a></li>
                                                <li><a href="product-list.html">Wooden Beds</a></li>
                                                <li><a href="product-list.html">Children's Beds</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Bedroom Sets</a></li>
                                        <li><a href="#">Chests &amp; Dressers</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Home Office</a></li>
                                <li><a href="#">Dining &amp; Bar</a></li>
                                <li><a href="#">Patio</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Jewelry &amp; Watches</a>
                            <ul class="dl-submenu">
                                <li><a href="product-list.html">Fine Jewelry</a></li>
                                <li><a href="product-list.html">Fashion Jewelry</a></li>
                                <li><a href="product-list.html">Watches</a></li>
                                <li>
                                    <a href="product-list.html">Wedding Jewelry</a>
                                    <ul class="dl-submenu">
                                        <li><a href="product-list.html">Engagement Rings</a></li>
                                        <li><a href="product-list.html">Bridal Sets</a></li>
                                        <li><a href="product-list.html">Women's Wedding Bands</a></li>
                                        <li><a href="product-list.html">Men's Wedding Bands</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
            <div class="sf-contener clearfix second-bg ">
                <nav class="nav-wrap container_9">
                    <ul class="sf-menu clearfix  ">
                        <li class="item"><a class="parent" href="home.html">Trang chủ</a> </li>
                        <li class="item">
                            <a class="parent" href="home.html">Sản phẩm</a>
                            <ul>
                                <?php foreach($categories as $item): ?>
                                <li><a href="/category.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="item"><a class="parent"  href="/cart.php">Giỏ hàng</a></li>
                        <li class="item"><a class="parent" href="/post.php">Tin tức</a>
                        </li>
                    </ul>
                </nav>
            </div>