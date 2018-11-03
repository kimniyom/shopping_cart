<?php
$productModel = new Product();
$lastProduct = $productModel->_get_last_product();
$bestProduct = $productModel->_get_best_product();
$saleProduct = $productModel->_get_sale_products();

$articleModel = new Article();
$NewsBlog = $articleModel->Get_article_limit(3);
$articleCategory = Articlecategory::model()->findAll("active=:active", array(":active" => "1"));
$Banner = Banner::model()->findAll("status=:status", array(":status" => "1"));
$Categorys = Category::model()->findAll();
?>
            <div class="banner banner-image-fit-screen">
                <div class="rev_slider slider-home-1" id="slider_1" style="display:none">
                    <ul>
                        <?php foreach ($Banner as $baners): ?>
                            <li>
                                <img class="rev-slidebg" src="<?php echo Yii::app()->baseUrl; ?>/uploads/banner/<?php echo $baners['banner_images'] ?>" alt="demo" data-bgposition="center center">
                                <?php if (isset($baners['title'])) { ?>
                                    <div class="tp-caption" data-x="center" data-y="center" data-voffset="['-100','-100','-140','-140']" data-transform_in="y:-80px;opacity:0;s:800;e:easeInOutCubic;" data-transform_out="y:-80px;opacity:0;s:300;" data-start="1000">
                                        <h2 style="color:<?php echo $baners['color'] ?>;"><?php echo $baners['title'] ?></h2>
                                    </div>
                                <?php } ?>
                                <?php if (isset($baners['detail'])) { ?>
                                    <div class="tp-caption" data-x="center" data-y="center" data-voffset="['20','20','40','40']" data-width="['650','550','480','320']" data-whitespace="normal" data-transform_in="y:80px;opacity:0;s:800;e:easeInOutCubic;" data-transform_out="y:80px;opacity:0;s:300;"
                                         data-start="1400">
                                        <h4 style="color:<?php echo $baners['color'] ?>; text-align:center;"><?php echo $baners['detail'] ?></h4>
                                    </div>
                                <?php } ?>
                                <?php
                                if (!$baners['link']) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = "";
                                }
                                ?>
                                <div class="tp-caption" data-x="center" data-y="center" data-voffset="['120','120','200','200']" data-transform_in="y:100px;opacity:0;s:800;e:easeInOutCubic;" data-transform_out="y:200px;opacity:0;s:300;" data-start="1600" <?php echo $style ?>>

                                    <a class="btn btn-brand pill" href="http://<?php echo $baners['link'] ?>" target="_blank" style="color:#ffffff;">SHOP NOW</a>

                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
<div class="heading-wrapper text-center">
    <h3 class="heading" style=" margin-bottom: 0px;">SHOP BY CATEGORY</h3>
</div>
<section class="boxed-sm">
    <div class="container">
        <div class="row">
            <div class="product-category-grid-style-1" style=" padding-bottom: 30px;">
                <div class="row">
                    <?php
                    foreach ($Categorys as $Category):
                        $CountProductInCat = $productModel->countProductCategory($Category['id']);
                        ?>
                        <div class="col-sm-4 col-xs-4">
                            <a href="#">
                                <figure class="product-category-item">
                                    <div class="thumbnails">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/category/<?php echo $Category['icons'] ?>" alt="" class="img img-responsive"/>
                                    </div>
                                    <figcaption style=" background:#91b376;">
                                        <h3 class="font-supermarket"><?php echo $Category['categoryname'] ?> <?php echo $CountProductInCat ?> Items</h3>
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
        <div class="product-filter-home-2-wraper">
            <div class="js-product-filter-home-2 product-filter-home-2 text-center">
                <div class="product-filter-home-2-inner">
                    <h4 class="filter-title is-checked" data-filter=".Newproduct">New Products</h4>
                    <h4 class="filter-title" data-filter=".Bsetproduct">Best Sellers</h4>
                    <h4 class="filter-title" data-filter=".Saleproduct">Sales Products</h4>
                </div>
            </div>
        </div>
        <div class="row js-product-masonry-filter-layout-2 product-masonry-filter-layout-2">
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
                <figure class="item Newproduct">
                    <div class="product product-style-3" style=" background: #f1f2f4;">
                        <div class="img-wrapper" style="border:none;">
                            <a href="<?php echo Yii::app()->createUrl('frontend/product/views',array("id" => $rsProduct['product_id']))?>">
                                <span class="label label-success font-supermarket" style=" position: absolute;top: 20px;left: 0px; font-size: 14px; border-radius: 0px;">New</span>
                                <!--
                                <img class="img-responsive" src="<?php //echo Yii::app()->baseUrl;                         ?>/themes/kstudio/images/product/010.jpg" alt="product thumbnail">
                                -->
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
                                    <a class="animate-icon-cart" href="https://www.messenger.com/t/kstudiothai" target="_blank">
                                        <span class="lnr lnr-cart"></span>
                                    </a>
                                    <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                    <path stroke-dasharray="19.79 19.79" fill="none" , stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <figcaption class="desc">
                            <h4 class="font-supermarket">
                                <a class="product-name" style="color:#5c5c5c;" href=""><?php echo $rsProduct['product_name'] ?></a>
                            </h4>
                            <span class="price" style="color:#000000;"><?php echo number_format($rsProduct['product_price']) ?>.-</span>
                        </figcaption>
                    </div>
                </figure>
            <?php endforeach; ?>

            <?php
            foreach ($bestProduct as $rsBestProduct):
                $img_besttitle = $productModel->firstpictures($rsBestProduct['product_id']);
                if (!empty($img_besttitle)) {
                    $imgBest = "uploads/product/thumbnail/480-" . $img_besttitle;
                } else {
                    $imgBest = "images/No_image_available.jpg";
                }
                ?>
                <figure class="item Bsetproduct">
                    <div class="product product-style-3" style=" background: #f1f2f4;">
                        <div class="img-wrapper" style="border:none;">
                            <a href="">
                                <span class="label label-danger font-supermarket" style=" position: absolute;top: 20px;left: 0px; font-size: 14px; border-radius: 0px;">Hot</span>
                                <!--
                                <img class="img-responsive" src="<?php //echo Yii::app()->baseUrl;                         ?>/themes/kstudio/images/product/010.jpg" alt="product thumbnail">
                                -->
                                <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $imgBest ?>" alt="product thumbnail" />
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
                                    <a class="animate-icon-cart" href="https://www.messenger.com/t/kstudiothai" target="_blank">
                                        <span class="lnr lnr-cart"></span>
                                    </a>
                                    <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                    <path stroke-dasharray="19.79 19.79" fill="none" , stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <figcaption class="desc">
                            <h4 class="font-supermarket">
                                <a class="product-name" style="color:#5c5c5c;" href=""><?php echo $rsBestProduct['product_name'] ?></a>
                            </h4>
                            <span class="price" style="color:#000000;"><?php echo number_format($rsBestProduct['product_price']) ?>.-</span>
                        </figcaption>
                    </div>
                </figure>
            <?php endforeach; ?>
            <?php
            foreach ($saleProduct as $rsSaleProduct):
                $img_saletitle = $productModel->firstpictures($rsSaleProduct['product_id']);
                if (!empty($img_saletitle)) {
                    $imgSale = "uploads/product/thumbnail/480-" . $img_saletitle;
                } else {
                    $imgSale = "images/No_image_available.jpg";
                }
                ?>
                <figure class="item Saleproduct">
                    <div class="product product-style-3" style=" background: #f1f2f4;">
                        <div class="img-wrapper" style="border:none;">
                            <a href="">
                                <span class="label label-warning font-supermarket" style=" position: absolute;top: 20px;left: 0px; font-size: 14px; border-radius: 0px;">10 %</span>
                                <!--
                                <img class="img-responsive" src="<?php //echo Yii::app()->baseUrl;                         ?>/themes/kstudio/images/product/010.jpg" alt="product thumbnail">
                                -->
                                <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $imgSale ?>" alt="product thumbnail" />
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
                                    <a class="animate-icon-cart" href="https://www.messenger.com/t/kstudiothai" target="_blank">
                                        <span class="lnr lnr-cart"></span>
                                    </a>
                                    <svg x="0px" y="0px" width="36px" height="32px" viewbox="0 0 36 32">
                                    <path stroke-dasharray="19.79 19.79" fill="none" , stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <figcaption class="desc">
                            <h4 class="font-supermarket">
                                <a class="product-name" style="color:#5c5c5c;" href=""><?php echo $rsSaleProduct['product_name'] ?></a>
                            </h4>
                            <span class="price" style="color:#000000;"><?php echo number_format($rsSaleProduct['product_price']) ?>.-</span>
                        </figcaption>
                    </div>
                </figure>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Slide Brands -->
<div class="main">
    <div class="container-fluid">
        <div class="relate-product">
            <div class="heading-wrapper text-center">
                <h3 class="heading">SHOP BY BRAND</h3>
            </div>
            <div class="row">
                <div class="carousel-product">
                    <?php
                    $sqlBradProduct = "select t.brandname,p.product_id from product p inner join brand t on p.brand = t.id group by p.brand ";
                    $resultBrand = Yii::app()->db->createCommand($sqlBradProduct)->queryAll();
                    foreach ($resultBrand as $rsBrands):
                        $img_brand = $productModel->firstpictures($rsBrands['product_id']);
                        if (!empty($img_brand)) {
                            $imgBrans = "uploads/product/thumbnail/600-" . $img_brand;
                        } else {
                            $imgBrans = "images/No_image_available.jpg";
                        }
                        ?>
                        <div class="item">
                            <figure class="item">
                                <div class="product product-style-1">
                                    <div class="img-wrapper">
                                        <div style=" position: absolute;z-index:10; width:100%; bottom: 0px; right: 0px; text-align:center; font-size: 30px; background: url('<?php echo Yii::app()->baseUrl; ?>/images/bgheader.png');" class="font-supermarket"><?php echo $rsBrands['brandname'] ?></div>
                                        <a href="">
                                            <!-- themes/kstudio/images/product/01.jpg -->
                                            <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/<?php echo $imgBrans ?>" alt="product thumbnail">
                                        </a>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="call-to-action-style-1">
    <img class="rellax bg-overlay" src="<?php //echo Yii::app()->baseUrl;            ?>/themes/kstudio/images/call-to-action/1.jpg" alt="" />
    <div class="overlay-call-to-action"></div>
    <div class="container">
        <div class="row">
            <p class="h3">Orchid Food</p>
            <h2>Healthy - Fresh - Delicious.</h2>
            <a class="btn btn-brand pill" href="#">VIEW MORE </a>
        </div>
    </div>
</div>
-->
<section class="boxed-sm">
    <div class="container">
        <div class="heading-wrapper text-center">
            <h3 class="heading">The Blog</h3>
        </div>
        <div class="row">
            <div class="row blog-h reverse flex one-row multi-row-sm">
                <?php foreach ($NewsBlog as $rsblog): ?>
                    <div class="col-md-4">
                        <div class="post">
                            <div class="img-wrapper js-set-bg-blog-thumb">
                                <a href="">
                                    <img src="<?= Yii::app()->baseUrl; ?>/uploads/article/600-<?php echo $rsblog['images'] ?>" alt="Image" />
                                </a>
                            </div>
                            <div class="desc">
                                <h4 class="font-supermarket">
                                    <a href=""><?php echo $rsblog['title'] ?></a>
                                </h4>
                                <p class="meta">
                                    <span class="time"><?php echo $rsblog['create_date'] ?></span>
                                    <span class="comment">2</span>
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
