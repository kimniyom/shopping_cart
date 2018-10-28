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
        <meta name="keywords" content="" />
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
        ?>
    </head>
    <body class="animsition animsition">
        <?php
        $Categorys = Category::model()->findAll();
        ?>
        <div class="home-1" id="page">
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                        <ul>
                            <li>
                                <a href="index.html">Home Version 1</a>
                            </li>
                            <li>
                                <a href="index-02.html">Home Version 2</a>
                            </li>
                            <li>
                                <a href="index-03.html">Home Version 3</a>
                            </li>
                            <li>
                                <a href="index-04.html">Home Version 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="active" href="shop.html">Shop</a>
                        <ul>
                            <li>
                                <a href="shop.html">Shop List</a>
                            </li>

                            <li>
                                <a href="shop-detail.html">Shop Detail</a>
                                <ul>
                                    <li>
                                        <a href="shop-detail.html">Shop Detail</a>
                                    </li>
                                    <li>
                                        <a href="shop-detail-02.html">Shop Detail Version 2</a>
                                    </li>
                                    <li>
                                        <a href="shop-detail-03.html">Shop Detail Version 3</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                        <ul>
                            <li>
                                <a href="blog.html">Blog List Version 1</a>
                            </li>
                            <li>
                                <a href="blog-02.html">Blog List Version 2</a>
                            </li>
                            <li>
                                <a href="blog-03.html">Blog List Version 3</a>
                            </li>
                            <li>
                                <a href="blog-04.html">Blog List Version 4</a>
                            </li>
                            <li>
                                <a href="blog-detail.html">Blog Detail</a>
                                <ul>
                                    <li>
                                        <a href="blog-detail.html">Blog Detail</a>
                                    </li>
                                    <li>
                                        <a href="blog-detail-02.html">Blog Detail Version 2</a>
                                    </li>
                                    <li>
                                        <a href="blog-detail-03.html">Blog Detail Version 3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="faq.html">Feature</a>
                        <ul>
                            <li>
                                <a href="404.html">404 Page</a>
                            </li>
                            <li>
                                <a href="faq.html">Faq</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <header class="header-style-1" style="background:#000000;"><!-- /images/bgheader.png-->
                <div class="container" id="menuBar">
                    <div class="row">
                        <div class="header-1-inner">
                            <a class="brand-logo animsition-link" href="index.html">

                                <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/images/logoC.png" alt="" />

                            </a>
                            <nav>
                                <ul class="menu hidden-xs">
                                    <li>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">Feature</a>
                                        <ul style="width:500px; padding:10px; left:0px; position: absolute !important;">
                                            <li>
                                            <center>
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">category1</div>
                                                    <div class="col-md-4 col-lg-4">category2</div>
                                                    <div class="col-md-4 col-lg-4">category3</div>
                                                </div>
                                                </li>
                                        </ul>
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
                                                                $Brands = Brand::model()->findAll("id=:id", array(":id" => $rsTypes['id']));
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
                                        <a href="contact.html">BRAND <i class="fa fa-angle-down"></i></a>
                                        <?php $BrandsMenu = Brand::model()->findAll() ?>
                                        <ul id="ulmenu">
                                            <?php foreach ($BrandsMenu as $rsBrandMenu): ?>
                                                <li id="lisubmenu"><a href=""><?php echo $rsBrandMenu['brandname'] ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <li>
                                                <a href="blog.html">Blog List Version 1</a>
                                            </li>
                                            <li>
                                                <a href="blog-02.html">Blog List Version 2</a>
                                            </li>
                                            <li>
                                                <a href="blog-03.html">Blog List Version 3</a>
                                            </li>
                                            <li>
                                                <a href="blog-04.html">Blog List Version 4</a>
                                            </li>
                                            <li>
                                                <a href="blog-detail.html">Blog Detail </a>
                                                <ul>
                                                    <li>
                                                        <a href="blog-detail.html">Blog Detail</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-detail-02.html">Blog Detail Version 2</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-detail-03.html">Blog Detail Version 3</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>


                                </ul>
                            </nav>
                            <aside class="right">
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
                                <div class="widget widget-control-header widget-shop-cart js-widget-shop-cart">
                                    <a class="control" href="shop-cart.html">
                                        <p class="counter">0</p>
                                        <span class="lnr lnr-cart"></span>
                                    </a>
                                </div>
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
            <div class="banner banner-image-fit-screen">
                <div class="rev_slider slider-home-1" id="slider_1" style="display:none">
                    <ul>
                        <li>
                            <img class="rev-slidebg" src="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/images/slider/kbanner3.jpg" alt="demo" data-bgposition="center center">
                            <div class="tp-caption" data-x="center" data-y="center" data-voffset="['-100','-100','-140','-140']" data-transform_in="y:-80px;opacity:0;s:800;e:easeInOutCubic;" data-transform_out="y:-80px;opacity:0;s:300;" data-start="1000">
                                <h2 style="color:#ffffff;">Fresh Orchid Food</h2>
                            </div>
                            <div class="tp-caption" data-x="center" data-y="center" data-voffset="['20','20','40','40']" data-width="['650','550','480','320']" data-whitespace="normal" data-transform_in="y:80px;opacity:0;s:800;e:easeInOutCubic;" data-transform_out="y:80px;opacity:0;s:300;"
                                 data-start="1400">
                                <h4 style="color:#ffffff;">Nunc suscipit elit ligula, ut porttitor justo rutrum eget. Proin et diam fringilla, elementum nisi volutpat, eleifend eros. Nullam venenatis nunc nisl, elementum euismod dui imperdiet id.</h4>
                            </div>
                            <div class="tp-caption" data-x="center" data-y="center" data-voffset="['120','120','200','200']" data-transform_in="y:100px;opacity:0;s:800;e:easeInOutCubic;" data-transform_out="y:200px;opacity:0;s:300;" data-start="1600">
                                <a class="btn btn-brand pill" href="product-list.html" style="color:#ffffff;">SHOP NOW</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <section class="boxed-sm">
                <div class="container">
                    <div class="row">
                        <div class="product-category-grid-style-1">
                            <div class="row">
                                <?php foreach ($Categorys as $Category): ?>
                                    <div class="col-sm-4">
                                        <a href="#">
                                            <figure class="product-category-item">
                                                <div class="thumbnail">
                                                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/category/<?php echo $Category['icons'] ?>" alt="" style="width:400px;" class="img img-responsive"/>
                                                </div>
                                                <figcaption>
                                                    <h3><?php echo $Category['categoryname'] ?></h3>
                                                </figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="boxed-sm">
                <div class="container">

                    <div class="heading-wrapper text-center">
                        <h3 class="heading-style-2">Our Products</h3>
                    </div>
                    <div class="product-filter-home-2-wraper">
                        <div class="js-product-filter-home-2 product-filter-home-2 text-center">
                                <div class="product-filter-home-2-inner">
                                    <h4 class="filter-title is-checked" data-filter=".Fruit">New Products</h4>
                                    <h4 class="filter-title" data-filter=".Vegetable">Best Sellers</h4>
                                    <h4 class="filter-title" data-filter=".Fruit">Sales Products</h4>
                                </div>
                        </div>
                    </div>
                    <div class="row js-product-masonry-filter-layout-2 product-masonry-filter-layout-2">
                        <div class="grid-sizer"></div>
                        <figure class="item Vegetable">
                            <div class="product product-style-3">
                                <div class="img-wrapper">
                                    <a href="product-detail.html">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/themes/kstudio/images/product/010.jpg" alt="product thumbnail">
                                    </a>
                                    <div class="product-control-wrapper bottom-right">
                                        <div class="wrapper-control-item">
                                            <a class="js-quick-view" href="#" type="button" data-toggle="modal" data-target="#quick-view-product">
                                                <span class="lnr lnr-eye"></span>
                                            </a>
                                        </div>
                                        <div class="wrapper-control-item item-wish-list">
                                            <a class="js-wish-list js-notify-add-wish-list" href="#">
                                                <span class="lnr lnr-heart"></span>
                                            </a>
                                        </div>
                                        <div class="wrapper-control-item item-add-cart js-action-add-cart">
                                            <a class="animate-icon-cart" href="#">
                                                <span class="lnr lnr-cart"></span>
                                            </a>
                                            <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                            <path stroke-dasharray="19.79 19.79" fill="none" , stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <figcaption class="desc">
                                    <h3>
                                        <a class="product-name" href="product-detail.html">Tomato</a>
                                    </h3>
                                    <span class="price">$ 2.75</span>
                                </figcaption>
                            </div>
                        </figure>
                        <figure class="item Fruit">
                            <div class="product product-style-3">
                                <div class="img-wrapper">
                                    <a href="product-detail.html">
                                        <img class="img-responsive" src="images/product/06.jpg" alt="product thumbnail">
                                    </a>
                                    <div class="product-control-wrapper bottom-right">
                                        <div class="wrapper-control-item">
                                            <a class="js-quick-view" href="#" type="button" data-toggle="modal" data-target="#quick-view-product">
                                                <span class="lnr lnr-eye"></span>
                                            </a>
                                        </div>
                                        <div class="wrapper-control-item item-wish-list">
                                            <a class="js-wish-list js-notify-add-wish-list" href="#">
                                                <span class="lnr lnr-heart"></span>
                                            </a>
                                        </div>
                                        <div class="wrapper-control-item item-add-cart js-action-add-cart">
                                            <a class="animate-icon-cart" href="#">
                                                <span class="lnr lnr-cart"></span>
                                            </a>
                                            <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                            <path stroke-dasharray="19.79 19.79" fill="none" , stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <figcaption class="desc">
                                    <h3>
                                        <a class="product-name" href="product-detail.html">Apple</a>
                                    </h3>
                                    <span class="price">$ 4.75</span>
                                </figcaption>
                            </div>
                        </figure>
                    </div>

                    <div class="heading-wrapper text-center">
                        <h3 class="heading">Our Products</h3>
                    </div>
                    <div class="row">
                        <div class="row js-product-masonry-layout-1 product-masonry-layout-1">
                            <div class="grid-sizer"></div>
                            <?php
                            foreach ($lastProduct as $rsProduct):
                                $img_title = $productModel->firstpictures($rsProduct['product_id']);
                                if (!empty($img_title)) {
                                    $img = "uploads/product/thumbnail/480-" . $img_title;
                                } else {
                                    $img = "images/No_image_available.jpg";
                                }
                                ?>
                                <figure class="item">
                                    <div class="product product-style-2">
                                        <div class="img-wrapper">
                                            <a href="product-detail.html">
                                                <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" />
                                            </a>
                                            <div class="product-control-wrapper bottom-right">
                                                <div class="wrapper-control-item">
                                                    <a class="js-quick-view" href="#" type="button" data-toggle="modal" data-target="#quick-view-product">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </div>
                                                <div class="wrapper-control-item item-wish-list">
                                                    <a class="js-wish-list js-notify-add-wish-list" href="#">
                                                        <span class="lnr lnr-heart"></span>
                                                    </a>
                                                </div>
                                                <div class="wrapper-control-item item-add-cart js-action-add-cart">
                                                    <a class="animate-icon-cart" href="#">
                                                        <span class="lnr lnr-cart"></span>
                                                    </a>
                                                    <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                                    <path stroke-dasharray="19.79 19.79" fill="none" ,="," stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                                    </svg>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <figcaption class="desc">
                                        <h3>
                                            <a class="product-name" href="product-detail.html"><?php echo $rsProduct['product_name'] ?></a>
                                        </h3>
                                        <span class="price"><?php echo $rsProduct['product_price'] ?></span>
                                    </figcaption>
                                </figure>
                            <?php endforeach; ?>
                            <!--
                                          <figure class="item item-size-2">
                                            <div class="product product-style-2">
                                              <div class="img-wrapper">
                                                <a href="product-detail.html">
                                                  <img class="img-responsive" src="<?php //echo Yii::app()->baseUrl;    ?>/themes/kstudio/images/product/isotope-03.jpg" alt="product thumbnail" />
                                                </a>
                                                <div class="product-control-wrapper bottom-right">
                                                  <div class="wrapper-control-item">
                                                    <a class="js-quick-view" href="#" type="button" data-toggle="modal" data-target="#quick-view-product">
                                                      <span class="lnr lnr-eye"></span>
                                                    </a>
                                                  </div>
                                                  <div class="wrapper-control-item item-wish-list">
                                                    <a class="js-wish-list js-notify-add-wish-list" href="#">
                                                      <span class="lnr lnr-heart"></span>
                                                    </a>
                                                  </div>
                                                  <div class="wrapper-control-item item-add-cart js-action-add-cart">
                                                    <a class="animate-icon-cart" href="#">
                                                      <span class="lnr lnr-cart"></span>
                                                    </a>
                                                    <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                                      <path stroke-dasharray="19.79 19.79" fill="none" ,="," stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                                    </svg>
                                                  </div>
                                                </div>
                                                <figcaption class="desc">
                                                  <h3>
                                                    <a class="product-name" href="product-detail.html">Bean</a>
                                                  </h3>
                                                  <span class="price">$3.20</span>
                                                </figcaption>
                                              </div>
                                            </div>
                                          </figure>
                            -->



                        </div>
                    </div>
                </div>
            </section>
            <div class="call-to-action-style-1">
                <img class="rellax bg-overlay" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/call-to-action/1.jpg" alt="" />
                <div class="overlay-call-to-action"></div>
                <div class="container">
                    <div class="row">
                        <p class="h3">Orchid Food</p>
                        <h2>Healthy - Fresh - Delicious.</h2>
                        <a class="btn btn-brand pill" href="#">VIEW MORE </a>
                    </div>
                </div>
            </div>
            <section class="boxed-sm">
                <div class="container">
                    <div class="heading-wrapper text-center">
                        <h3 class="heading">The Blog</h3>
                    </div>
                    <div class="row">
                        <div class="row blog-h reverse flex one-row multi-row-sm">
                            <div class="col-md-4">
                                <div class="post">
                                    <div class="img-wrapper js-set-bg-blog-thumb">
                                        <a href="blog-detail.html">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/blog/01.jpg" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h4>
                                            <a href="blog-detail.html">Beauty With Orchid Products</a>
                                        </h4>
                                        <p class="meta">
                                            <span class="time">Feberuary 05, 2017</span>
                                            <span class="comment">2</span>
                                        </p>
                                        <p>Etiam at varius diam, id blandit erat. Suspendisse eget volutpat risus, id venenatis justo. Fusce elementum ligula elit. Duis ultricies ultrices nibh, a tincidunt risus pretium eleifend. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="post">
                                    <div class="img-wrapper js-set-bg-blog-thumb">
                                        <a href="blog-detail.html">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/blog/02.jpg" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h4>
                                            <a href="blog-detail.html">Green Vegetables Are Good For Healthy</a>
                                        </h4>
                                        <p class="meta">
                                            <span class="time">January 30, 2017</span>
                                            <span class="comment">0</span>
                                        </p>
                                        <p>Vivamus consectetur nulla mattis lorem ultricies, ac congue tellus consectetur. Vivamus sed purus volutpat, varius mauris id, tempus augue. Nuefd ans congue liquam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="post">
                                    <div class="img-wrapper js-set-bg-blog-thumb">
                                        <a href="blog-detail.html">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/blog/03.jpg" alt="Image" />
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h4>
                                            <a href="blog-detail.html">Refreshing Green Smoothie Recipe</a>
                                        </h4>
                                        <p class="meta">
                                            <span class="time">January 20, 2017</span>
                                            <span class="comment">4</span>
                                        </p>
                                        <p>Praesent efficitur felis eu luctus vestibulum. In hac habitasse platea dictumst. Nam egestas eu nisl ac pellentesque. Duis congue suscipit lorem vel congue. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="call-to-action-style-2">
            <div class="wrapper-carousel-background">
                <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/call-to-action/1-1.jpg" alt="" />
                <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/call-to-action/1-2.jpg" alt="" />
                <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/call-to-action/1-3.jpg" alt="" />
                <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/call-to-action/1-4.jpg" alt="" />
            </div>
            <div class="overlay-call-to-action"></div>
            <a class="btn btn-brand pill icon-left" href="#">
                <i class="fa fa-instagram"></i>FOWLLOW US</a>
        </div>
        <footer class="footer-style-1">
            <div class="container">
                <div class="row">
                    <div class="footer-style-1-inner">
                        <div class="widget-footer widget-text col-first col-small">
                            <a href="#">
                                <img class="logo-footer" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/logo.png" alt="Logo Orchid" />
                            </a>
                            <div class="widget-link">
                                <ul>
                                    <li>
                                        <span class="lnr lnr-map-marker icon"></span>
                                        <span>379 5th Ave New York, NYC 10018</span>
                                    </li>
                                    <li>
                                        <span class="lnr lnr-phone-handset icon"></span>
                                        <a href="tel:0123456789">(+1) 96 716 6879</a>
                                    </li>
                                    <li>
                                        <span class="lnr lnr-envelope icon"></span>
                                        <a href="mailto: contact@site.com">contact@site.com </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-footer widget-link col-second col-medium">
                            <div class="list-link">
                                <h4 class="h4 heading">SHOP</h4>
                                <ul>
                                    <li>
                                        <a href="#">Food</a>
                                    </li>
                                    <li>
                                        <a href="#">Farm</a>
                                    </li>
                                    <li>
                                        <a href="#">Health</a>
                                    </li>
                                    <li>
                                        <a href="#">Orchid</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-link">
                                <h4 class="h4 heading">SUPPORT</h4>
                                <ul>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="list-link">
                                <h4 class="h4 heading">MY ACCOUNT</h4>
                                <ul>
                                    <li>
                                        <a href="#">Sign In</a>
                                    </li>
                                    <li>
                                        <a href="#">My Cart</a>
                                    </li>
                                    <li>
                                        <a href="#">My Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#">Check Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-footer widget-newsletter-footer col-last col-small">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right style-1">
                <div class="container">
                    <div class="row">
                        <div class="copy-right-inner">
                            <p>Copyright © 2017 Designed by Upperthemes. All rights reserved.</p>
                            <div class="widget widget-footer widget-footer-creadit-card">
                                <ul class="list-unstyle">
                                    <li>
                                        <a href="#">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/icons/creadit-card-01.png" alt="creadit card" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/icons/creadit-card-02.png" alt="creadit card" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/icons/creadit-card-03.png" alt="creadit card" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/icons/creadit-card-04.png" alt="creadit card" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/01.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/02.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/03.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/04.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/05.jpg" alt="product thumbnail" />
                                        </div>
                                    </div>
                                    <div class="thumbnail-carousel-product-quickview">
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/01.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/02.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/03.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/04.jpg" alt="product thumbnail" />
                                        </div>
                                        <div class="item">
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/images/product/05.jpg" alt="product thumbnail" />
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

        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel-thumbnail.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/config-carousel-product-quickview.js"></script>
        <!-- Demo Only-->
        <script src="<?= Yii::app()->baseUrl; ?>/themes/kstudio/js/demo-add-to-cart.js">


        </script>
        <script tyle="text/javascript">
            setScreen();
            function setScreen() {
                var w = window.innerWidth;
                if (w >= 768) {
                    $("#menuBar").css({"padding-bottom": "20px"});
                } else {
                    $("#slider_1").hide();
                    $("#slider_1").css({"height": "20px"});
                }
            }
        </script>
    </body>
</html>
