<style type="text/css">
    #title-bar-tab{
        position: absolute;
        top: 0px;
        right: 0px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $(".breadcrumb").hide();
        var width = $(window).width();
        if (width >= 768) {
            var styles = {
                "white-space": "nowrap",
                "width": "240px",
                "overflow": "hidden",
                "text - overflow": "ellipsis"
            };

            $(".caption").css(styles);
            //$(".box_product").css("height", "350px");
        }
    });
</script>

<!-- Banner -->
<?php
if (isset($banner)) {
    $config = new Configweb_model();
    ?>
    <div style="margin-left:10px; margin-top: 5px; padding-bottom: 0px; margin-bottom: 0px;" id="banner_home">
        <ul class="bxslider" style="z-index: 0;">
            <?php
            $images = $config->_get_banner_show();
            foreach ($images as $img):
                ?>
                <li><img src="<?php echo Yii::app()->baseUrl; ?>/uploads/banner/<?= $img['banner_images'] ?>" /></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } ?>
<!-- End Banner -->

<div class="panel panel-default">
    <div class="panel-heading">
        <font id="font-22">สินค้ามาใหม่</font>
    </div>
    <ol class="dribbbles group" style="padding-left: 0px; margin-top:10px;">
        <?php
        $product_model = new Product();
        $i = 0;
        foreach ($last_product as $last):
            $i++;
            $img_title = $product_model->get_images_product_title($last['product_id']);
            if (!empty($img_title)) {
                $img = "uploads/product_thumb/" . $img_title['images'];
            } else {
                $img = "images/No_image_available.jpg";
            }

            $link = Yii::app()->createUrl('frontend/product/detail/id/' . $config->url_encode($last['product_id']));
            ?>
            <?php if ($i == "1") { ?>
                <li id="screenshot-<?php echo $i; ?>" class="col-lg-6 col-md-6 col-sm-12" style="text-align:center; margin-bottom:15px;">
                    <div class="dribbble" id="box_list_product">
                        <div class="dribbble-shot">
                            <div class="dribbble-img">
                                <a class="dribbble-link" href="#">
                                    <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/new-full.png" id="title-bar-tab">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img; ?>" style="max-width:80%;"/>
                                    </div>
                                </a>
                                <a class="dribbble-over hvr-pop" href="<?php echo $link ?>" id="hover-box-product">
                                    <?php echo $last['product_name']; ?><br/>
                                    <span id="font-22">ราคา <?php echo $last['product_price']; ?> บาท</span>
                                </a>
                            </div>
                            <ul class="tools group">
                                <li style="color:red;text-align:center; margin-bottom:6px;">
                                    <span id="font-22">ราคา <?php echo $last['product_price']; ?> บาท</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php } else { ?>
                <li id="screenshot-<?php echo $i; ?>" class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="text-align:center; margin-bottom:15px;">
                    <div class="dribbble" id="box_list_product">
                        <div class="dribbble-shot">
                            <div class="dribbble-img">
                                <a class="dribbble-link" href="#">
                                    <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/new-full.png" id="title-bar-tab">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img; ?>"/>
                                    </div>
                                </a>
                                <a class="dribbble-over hvr-pop" href="<?php echo $link ?>" id="hover-box-product">
                                    <?php echo $last['product_name']; ?><br/>
                                    <font style="color:yellow;">ราคา <?php echo $last['product_price']; ?> บาท</font>
                                </a>
                            </div>
                            <ul class="tools group">
                                <li style="color:red;text-align:center;">
                                    <span>ราคา <?php echo $last['product_price']; ?> บาท</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php } ?>
        <?php endforeach; ?>
    </ol>
</div>
<br />

<div class="panel panel-default">
    <div class="panel-heading">
        <font id="font-22">สินค้าแนะนำ</font>
    </div>
    <ol class="dribbbles group" style="padding-left: 0px; margin-top:10px;">
        <?php
        $i = 0;
        foreach ($sale_product as $sale):
            $i++;
            $img_title = $product_model->get_images_product_title($last['product_id']);
            if (!empty($img_title)) {
                $img = "uploads/product_thumb/" . $img_title['images'];
            } else {
                $img = "images/No_image_available.jpg";
            }
            $link = Yii::app()->createUrl('frontend/product/detail/id/' . $config->url_encode($sale['product_id']));
            ?>
            <?php if ($i == "1") { ?>
                <li id="screenshot-<?php echo $i; ?>" class="col-lg-6 col-md-6 col-sm-12" style="text-align:center; margin-bottom:15px;">
                    <div class="dribbble" id="box_list_product">
                        <div class="dribbble-shot">
                            <div class="dribbble-img">
                                <a class="dribbble-link" href="#">
                                    <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/hot-full.png" id="title-bar-tab">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img; ?>" style="max-width:80%;"/>
                                    </div>
                                </a>
                                <a class="dribbble-over hvr-pop" href="<?php echo $link ?>" id="hover-box-product">
                                    <?php echo $sale['product_name']; ?><br/>
                                    <span id="font-22">ราคา <?php echo $sale['product_price']; ?> บาท</span>
                                </a>
                            </div>
                            <ul class="tools group">
                                <li style="color:red;text-align:center; margin-bottom:6px;">
                                    <span id="font-22">ราคา <?php echo $sale['product_price']; ?> บาท</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php } else { ?>
                <li id="screenshot-<?php echo $i; ?>" class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="text-align:center; margin-bottom:15px;">
                    <div class="dribbble" id="box_list_product">
                        <div class="dribbble-shot">
                            <div class="dribbble-img">
                                <a class="dribbble-link" href="#">
                                    <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/hot-full.png" id="title-bar-tab">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img; ?>"/>
                                    </div>
                                </a>
                                <a class="dribbble-over hvr-pop" href="<?php echo $link ?>" id="hover-box-product">
                                    <?php echo $last['product_name']; ?><br/>
                                    <font style="color:yellow;">ราคา <?php echo $sale['product_price']; ?> บาท</font>
                                </a>
                            </div>
                            <ul class="tools group">
                                <li style="color:red;text-align:center;">
                                    <span>ราคา <?php echo $sale['product_price']; ?> บาท</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php } ?>
        <?php endforeach; ?>
    </ol>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.bxslider').bxSlider({
            auto: true,
            speed: 500
        });
    });
</script>
