<style type="text/css">
    #setColorNear{
        background: #FFFFFF;
    }
    .product {

        padding:0px;
        transition: all 0.3s ease-in-out;
    }
    .product:hover {
        box-shadow: #eeeeee 0px 0px 5px 0px;
        padding:10px;
        transition: all 0.3s ease-in-out;
    }

    .product img{
        transition: all 0.3s ease-in-out;
    }
    
    .view-products #text-color-product{
        color:#9d1419;
    }
    
</style>
<?php
$title = "sggdfgdgdgdgf";
$this->breadcrumbs = array(
    $title,
);
?>
<?php $productModel = new Product(); ?>
<div class="view-products">
<div class="shop-detail-3 woocommerce" id="page" style=" background: #eeeeee;">
    <!--
    <section class="sub-header shop-detail-1">
        <img class="rellax bg-overlay" src="<?php //echo Yii::app()->baseUrl   ?>/themes/kstudio/images/sub-header/017.jpg" alt="">
        <div class="overlay-call-to-action"></div>
        <h3 class="heading-style-3">Shop Detail</h3>
    </section>
    -->
    <section class="boxed-sm">
        <div class="container" style=" background: #FFFFFF;">
            <div class="row product-detail" style=" margin-top: 0px;padding: 5px;">
                <div class="row product-detail-wrapper">
                    <div class="col-md-6">
                        <div class="woocommerce-product-gallery vertical">
                            <div class="main-carousel">
                                <?php foreach ($images as $al): ?>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/uploads/product/thumbnail/482-<?= $al['images'] ?>" alt="product thumbnail">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="thumbnail-carousel">
                                <!--482x455
                                <div class="item">
                                    <img class="img-responsive" src="<?php //echo Yii::app()->baseUrl           ?>/themes/kstudio/images/product/01.jpg" alt="product thumbnail">
                                </div>
                                -->
                                <?php foreach ($images as $al): ?>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/uploads/product/thumbnail/482-<?= $al['images'] ?>" alt="product thumbnail">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="summary">
                            <div class="desc">
                                <div class="header-desc">
                                    <h2 class="product-title" id="text-color-product"><?php echo $product['product_name'] ?></h2>
                                    <p class="price"><?php echo number_format($product['product_price']) ?></p>
                                </div>
                                <div class="body-desc">
                                    <div class="woocommerce-product-details-short-description">
                                        <p><?php echo $product['description'] ?></p>
                                    </div>
                                </div>
                                <div class="footer-desc">
                                    <form class="cart">
                                        <div class="quantity buttons-added">
                                            <input class="minus" value="-" type="button">
                                            <input class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" type="number">
                                            <input class="plus" value="+" type="button">
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
                                    <a href="#" rel="tag"><?php echo $product['categoryname'] ?></a>
                                </p>
                                <p class="tagged-as">Tags:
                                    <a href="#" rel="tag">Natural</a>,
                                    <a href="#" rel="tag">Orchid</a>,
                                    <a href="#" rel="tag">Health</a>,
                                    <a href="#" rel="tag">Green</a>,
                                    <a href="#" rel="tag">Vegetable</a>
                                </p>
                                <p class="id">ID:
                                    <a href="#"><?php echo $product['product_id'] ?></a>
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
            <div class="woocommerce-tabs">
                <div class="row">
                    <div class="col-md-12 woocommerce-tabs-inner">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <ul class="tabs tab-style-2" role="tablist">
                                    <li class="active" role="presentation">
                                        <a href="#Description" aria-controls="Description" role="tab" data-toggle="tab">Description</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Additional-Information" aria-controls="Additional-Information" role="tab" data-toggle="tab">Additional Information</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#Review" aria-controls="Review" role="tab" data-toggle="tab">Review (2)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tab-content tab-content-style-2">
                            <div class="tab-pane fade in active" id="Description" role="tabpanel">
                               <?php echo $product['product_detail'] ?>
                            </div>
                            <div class="tab-pane fade" id="Additional-Information" role="tabpanel">
                                <table class="shop_attributes table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Country</th>
                                            <td>
                                                <p>England, London</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th>
                                            <td>
                                                <p>3.5 Kg</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Next Day Delivery Available</th>
                                            <td>
                                                <p>Yes</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Review" role="tabpanel">
                                <ol class="comment-list">
                                    <li>
                                        <div class="the-comment">
                                            <div class="avatar">
                                                <img class="avatar" alt="avatar" src="<?php echo Yii::app()->baseUrl ?>/themes/kstudio/images/comment/01.png">
                                            </div>
                                            <div class="comment-box">
                                                <div class="comment-author meta">
                                                    <p class="author">Mark Hunt</p>
                                                    <p class="time">15 March 2017</p>
                                                </div>
                                                <div class="comment-text">
                                                    <p>This is a test … Quisque ligulas ipsum, euismod atras vulputate iltricies etri elit.This is a test … </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="the-comment">
                                            <div class="avatar">
                                                <img class="avatar" alt="avatar" src="<?php echo Yii::app()->baseUrl ?>/themes/kstudio/images/comment/02.png">
                                            </div>
                                            <div class="comment-box">
                                                <div class="comment-author meta">
                                                    <p class="author">Lori Peters</p>
                                                    <p class="time">16 March 2017</p>
                                                </div>
                                                <div class="comment-text">
                                                    <p>This is a reply test … </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="relate-product">
                <div class="heading-wrapper text-center">
                    <h3 class="heading">สินค้าในหมวดเดียวกัน</h3>
                </div>
                <div class="row">
                    <div class="carousel-product">
                        <?php
                        foreach ($near as $nears):
                            $fimg = $productModel->firstpictures($nears['product_id']);
                            ?>
                            <div class="item">
                                <figure class="item">
                                    <div class="product product-style-1">
                                        <div class="img-wrappers">                               
                                            <img class="img-responsive" src="<?php echo Yii::app()->baseUrl ?>/uploads/product/thumbnail/482-<?php echo $fimg ?>" alt="product thumbnail">
                                        </div>
                                        <figcaption class="desc text-center" id="setColorNear">
                                            <h3 style="height:50px; overflow: hidden;white-space: wrap;text-overflow: ellipsis;">
                                                <a class="product-name font-supermarket" href="product-detail.html"><?php echo $nears['product_name'] ?></a>
                                            </h3>
                                            <span class="price"><?php echo number_format($nears['product_price']) ?></span>
                                        </figcaption>
                                    </div>
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<script type="text/javascript">
    //load_comment();
    function load_comment() {
        $("#comment").html("<center><i class='fa fa-spinner fa-spin fa-2x'></i></center>");
        var product_id = "<?php echo $product['product_id'] ?>";
        var url = "<?php echo Yii::app()->createUrl('frontend/comment') ?>";
        var data = {product_id: product_id};

        $.post(url, data, function (result) {
            $("#comment").html(result);
        });
    }

    function send_comment() {
        var product_id = "<?php echo $product['product_id'] ?>";
        var box_comment = $("#box_comment").val();
        var url = "<?php echo Yii::app()->createUrl('frontend/comment/send_comment') ?>";
        var data = {product_id: product_id, box_comment: box_comment};
        if (box_comment == '') {
            $("#box_comment").focus();
            return false;
        }
        $.post(url, data, function (result) {
            load_comment();
        });
    }


</script>

