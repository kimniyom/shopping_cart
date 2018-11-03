<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
            $web = new Configweb_model();
            echo $web->get_webname();
            ?>
        </title>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="kstudio,KSTUDIO,kstudiothai,เครื่องเสียง,หูฟัง,ลำโพง" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl; ?>/themes/kstudio/css/main.css" />
        <style>
            #lisubmenu{
                border-bottom:solid 1px #eeeeee;
            }
            #ulmenu{
                box-shadow:none;border:1px solid #eeeeee;border-bottom:none;
            }

        </style>
        <?php
        $productModel = new Product();
        $lastProduct = $productModel->_get_last_product();
        $bestProduct = $productModel->_get_best_product();
        $saleProduct = $productModel->_get_sale_products();

        $articleModel = new Article();
        $NewsBlog = $articleModel->Get_article_limit(3);
        $articleCategory = Articlecategory::model()->findAll("active=:active", array(":active" => "1"));


        $ContactModel = new Contact();
        $Contact = $ContactModel->gat_contact();
        $logoMini = "<img src='" . Yii::app()->baseUrl . "/images/logo.png' class='img-responsive' alt='Image'>";
        $iconsloader = "<img src='" . Yii::app()->baseUrl . "/images/icons/spin.svg' />";
        ?>
    </head>
    <body class="animsition animsition">
        <input value="<?php echo $logoMini ?>" id="logomini" type="hidden" />
        <?php
        $Categorys = Category::model()->findAll();
        ?>
        <div class="home-1" id="page">
            <!-- Menu Nav -->
            <div id="kkmenusidebar"></div>
            <header class="header-style-1" style="background:#ffffff;"><!-- /images/bgheader.png-->
                <div class="container" id="menuBar">
                    <div class="row">
                        <div class="header-1-inner">
                            <a class="brand-logo animsition-link" href="index.html">
                                <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" alt="" style="max-height: 52px;"/>
                            </a>
                            <nav>
                                <ul class="menu hidden-xs">
                                    <li>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a class="active" href="shop.html" >Shop <i class="fa fa-angle-down"></i></a>
                                        <ul id="ulmenu">

                                            <?php
                                            foreach ($Categorys as $rsCategory):
                                                $Types = ProductType::model()->findAll("category=:id", array(":id" => $rsCategory['id']));
                                                if (count($Types) <= 0) {
                                                    ?>
                                                    <li id="lisubmenu">
                                                        <a href="shop.html"><?php echo $rsCategory['categoryname'] ?></a>
                                                    </li>
                                                <?php } else { ?>
                                                    <li id="lisubmenu">
                                                        <a href="shop.html"><?php echo $rsCategory['categoryname'] ?> <i class="fa fa-angle-right" style="right:10px; top:20px; position:absolute;"></i></a>
                                                        <ul id="ulmenu">
                                                            <?php
                                                            foreach ($Types as $rsTypes):
                                                                $sqlGetBrand = "select b.id,b.brandname from product p inner join brand b ON p.brand = b.id where p.type_id = '" . $rsTypes['type_id'] . "' group by brand";
                                                                $Brands = Yii::app()->db->createCommand($sqlGetBrand)->queryAll();
                                                                if (count($Brands) <= 0) {
                                                                    ?>
                                                                    <li id="lisubmenu">
                                                                        <a href="shop-detail.html"><?php echo $rsTypes['type_name'] ?></a>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li id="lisubmenu">
                                                                        <a href="shop-detail.html"><?php echo $rsTypes['type_name'] ?> <i class="fa fa-angle-right" style="right:10px; top:20px; position:absolute;"></i></a>
                                                                        <ul id="ulmenu">
                                                                            <?php foreach ($Brands as $rsBrand): ?>
                                                                                <li id="lisubmenu"><a href=""><?php echo $rsBrand['brandname'] ?></a></li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                            <?php endforeach; ?>

                                        </ul>
                                    </li>

                                    <li>
                                        <a href="">BRAND <i class="fa fa-angle-down"></i></a>

                                        <ul id="ulmenu">
                                            <?php $BrandsMenu = Brand::model()->findAll() ?>
                                            <?php foreach ($BrandsMenu as $rsBrandMenu): ?>
                                                <li id="lisubmenu"><a href=""><?php echo $rsBrandMenu['brandname'] ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">BLOG <i class="fa fa-angle-down"></i></a>
                                        <ul id="ulmenu">
                                            <?php foreach ($articleCategory as $articleCategorys): ?>
                                                <li id="lisubmenu">
                                                    <a href="blog.html"><?php echo $articleCategorys['category'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">Contact</a>
                                    </li>
                                    <li>
                                        <a href="">About</a>
                                    </li>

                                </ul>
                            </nav>
                            <aside class="right">
                                <!--
                                <div class="widget widget-control-header">
                                    <div class="select-custom-wrapper">
                                        <select class="no-border">
                                            <option>USD</option>
                                            <option>VND</option>
                                            <option>EUR</option>
                                            <option>JPY</option>
                                        </select>
                                    </div>
                                </div>
                                -->
                                <div class="widget widget-control-header widget-search-header">
                                    <a class="control btn-open-search-form js-open-search-form-header" href="#">
                                        <span class="lnr lnr-magnifier"></span>
                                    </a>
                                    <div class="form-outer">
                                        <button class="btn-close-form-search-header js-close-search-form-header">
                                            <span class="lnr lnr-cross"></span>
                                        </button>
                                        <form>
                                            <input placeholder="Search" />
                                            <button class="search">
                                                <span class="lnr lnr-magnifier"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!--
                                <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
                                    <a class="control" href="shop-cart.html">
                                        <p class="counter">0</p>
                                        <span class="lnr lnr-cart"></span>
                                    </a>
                                </div>
                                -->
                                <div class="widget widget-control-header hidden-lg hidden-md hidden-sm">
                                    <a class="navbar-toggle js-offcanvas-has-events" type="button" href="#menu">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </a>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </header>



            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'homeLink' => '<i class="fa fa-home"></i> ' . CHtml::link('หน้าแรก', Yii::app()->createUrl('frontend/main')),
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->



            <?php
            echo $content;
            ?>

        </div>

        <footer class="footer-style-1">
            <div class="container">
                <div class="row">
                    <div class="footer-style-1-inner">
                        <div class="widget-footer widget-text col-first col-small">
                            <a href="#">
                                <img class="logo-footer" src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" alt="kstudio" />
                            </a>
                            <div class="widget-link">
                                <ul>
                                    <li>
                                        <span class="lnr lnr-map-marker icon"></span>
                                        <span><?php echo $Contact['address'] ?></span>
                                    </li>
                                    <li>
                                        <span class="lnr lnr-phone-handset icon"></span>
                                        <?php echo $Contact['tel'] ?>
                                    </li>
                                    <li>
                                        <span class="lnr lnr-envelope icon"></span>
                                        <?php echo $Contact['email'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-footer widget-link col-second col-medium">
                            <div class="list-link">
                                <h4 class="h4 heading">SHOP</h4>
                                <ul>
                                    <?php foreach ($Categorys as $Category): ?>
                                        <li>
                                            <a href=""><?php echo $Category['categoryname'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="list-link">
                                <h4 class="h4 heading">BRAND</h4>
                                <ul>
                                    <?php foreach ($BrandsMenu as $rsBrandMenu): ?>
                                        <li>
                                            <a href="#"><?php echo $rsBrandMenu['brandname'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="list-link">
                                <h4 class="h4 heading">BLOG</h4>
                                <div id="fb-root"></div>
                                <ul>
                                    <?php foreach ($articleCategory as $articleCategorys): ?>
                                        <li id="lisubmenu">
                                            <a href=""><?php echo $articleCategorys['category'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-footer widget-newsletter-footer col-last col-small">
                            <script>(function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id))
                                        return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.2&appId=1637139006560611&autoLogAppEvents=1';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-page" data-href="https://www.facebook.com/kstudiothai/" data-tabs="timeline" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kstudiothai/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kstudiothai/">Kstudio</a></blockquote></div>
                            <!--
                            <h4 class="h4 heading">NEWSLETTER</h4>
                            <p>Subscribe now to get daily updates</p>
                            <form class="Orchid-form form-inline btn-add-on circle border">
                                <div class="form-group">
                                    <input class="form-control pill transparent" placeholder="Your Email..." type="email" />
                                    <button class="btn btn-brand circle" type="submit">
                                        <i class="fa fa-envelope-o"></i>
                                    </button>
                                </div>
                            </form>
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right style-1">
                <div class="container">
                    <div class="row">
                        <div class="copy-right-inner">
                            <p>Copyright © 2018 Designed by Kimniyom.</p>
                            <!--
                            <div class="widget widget-footer widget-footer-creadit-card">
                                <ul class="list-unstyle">
                                    <li>
                                        <a href="#">
                                            <img src="<?php //echo Yii::app()->baseUrl;               ?>/themes/kstudio/images/icons/creadit-card-01.png" alt="creadit card" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php //echo Yii::app()->baseUrl;               ?>/themes/kstudio/images/icons/creadit-card-02.png" alt="creadit card" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php //echo Yii::app()->baseUrl;               ?>/themes/kstudio/images/icons/creadit-card-03.png" alt="creadit card" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?php //echo Yii::app()->baseUrl;               ?>/themes/kstudio/images/icons/creadit-card-04.png" alt="creadit card" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--
        <div class="modal fade" id="quick-view-product" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-quickview woocommerce" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="woocommerce-product-gallery">
                                    <div class="main-carousel-product-quick-view">
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/01.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/02.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/03.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/04.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/05.jpg" alt="product thumbnail" />
                                        </div>
                                    </div>
                                    <div class="thumbnail-carousel-product-quickview">
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/01.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/02.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/03.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/04.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?//= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/05.jpg" alt="product thumbnail" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="summary">
                                    <div class="desc">
                                        <div class="header-desc">
                                            <h2 class="product-title">Sald</h2>
                                            <p class="price">$2.00</p>
                                        </div>
                                        <div class="body-desc">
                                            <div class="woocommerce-product-details-short-description">
                                                <p>Duis vestibulum ante velit. Pellentesque orci felis, pharetra ut pharetra ut, interdum at mauris. Aenean efficitur aliquet libero sit amet scelerisque. Suspendisse efficitur mollis eleifend. Aliquam tortor nibh, venenatis quis
                                                    sem dapibus, varius egestas lorem a sollicitudin. </p>
                                            </div>
                                        </div>
                                        <div class="footer-desc">
                                            <form class="cart">
                                                <div class="quantity buttons-added">
                                                    <input class="minus" value="-" type="button" />
                                                    <input class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number" />
                                                    <input class="plus" value="+" type="button" />
                                                </div>
                                                <div class="group-btn-control-wrapper">
                                                    <button class="btn btn-brand no-radius">ADD TO CART</button>
                                                    <button class="btn btn-wishlist btn-brand-ghost no-radius">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-meta">
                                        <p class="posted-in">Categories:
                                            <a href="#" rel="tag">Food</a>
                                        </p>
                                        <p class="tagged-as">Tags:
                                            <a href="#" rel="tag">Natural</a>,
                                            <a href="#" rel="tag">Orchid</a>,
                                            <a href="#" rel="tag">Health</a>,
                                            <a href="#" rel="tag">Green</a>,
                                            <a href="#" rel="tag">Vegetable</a>
                                        </p>
                                        <p class="id">ID:
                                            <a href="#">A203</a>
                                        </p>
                                    </div>
                                    <div class="widget-social align-left">
                                        <ul>
                                            <li>
                                                <a class="facebook" data-toggle="tooltip" title="Facebook" href="http://www.facebook.com/Upperthemes">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="pinterest" data-toggle="tooltip" title="Pinterest" href="http://www.pinterest.com/Upperthemes">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="twitter" data-toggle="tooltip" title="Twitter" href="http://www.twitter.com/Upperthemes">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="google-plus" data-toggle="tooltip" title="Google Plus" href="https://plus.google.com/Upperthemes">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="instagram" data-toggle="tooltip" title="Instagram" href="https://instagram.com/Upperthemes">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/jquery.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/bootstrap.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/function-check-viewport.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/slick.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/select2.full.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/imagesloaded.pkgd.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/jquery.mmenu.all.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/rellax.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/isotope.pkgd.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/bootstrap-notify.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/bootstrap-slider.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/in-view.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/countUp.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/library/animsition.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/revolution/css/settings.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/revolution/css/layers.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/revolution/css/navigation.css" />
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/global.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-banner-home-1.js">


        </script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-mm-menu.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-set-bg-blog-thumb.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-isotope-product-home-1.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-isotope-product-home-2.js"></script>

        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel.js"></script>

        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel-thumbnail.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel-product-quickview.js"></script>
        <!-- Demo Only-->
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/demo-add-to-cart.js">


        </script>
        <script tyle="text/javascript">
            setScreen();
            getMenu();
            function setScreen() {
                var w = window.innerWidth;
                if (w >= 768) {
                    $("#menuBar").css({"padding-bottom": "20px"});
                } else {
                    $("#slider_1").hide();
                    $("#slider_1").css({"height": "20px"});
                }
            }

            function getMenu() {
                var url = "<?php echo Yii::app()->createUrl('site/getmenu') ?>";
                $.get(url, function (data) {
                    $("#kkmenusidebar").html(data);
                });
            }
        </script>
    </body>
</html>
