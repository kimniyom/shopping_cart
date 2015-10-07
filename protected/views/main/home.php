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
    $config = new configweb_model();
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

<div class="label label-primary" style="padding:10px; position: relative;">
    <font id="font-22">สินค้ามาใหม่</font>
</div>
<div style=" width: 100%; height: 10px; border-bottom: solid #0063dc 2px; margin-bottom: 5px;"></div>
<div class="row" style=" margin: 0px;">
    <ol class="dribbbles group" style="padding-left: 0px;">
        <?php
        $product_model = new Product();
        $i = 0;
        foreach ($last_product as $last):
            $i++;
            $img = $product_model->get_last_img($last['product_id']);
            $link = Yii::app()->createUrl('frontend/product/detail/id/' . $config->url_encode($last['product_id']));
            ?>
            <li id="screenshot-<?php echo $i; ?>" class="col-lg-4 col-md-4 col-sm-6" style="text-align:center; margin-bottom:15px;">
                <div class="dribbble" id="box_list_product">
                    <div class="dribbble-shot">
                        <div class="dribbble-img">
                            <a class="dribbble-link" href="#">
                                <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/new-full.png" id="title-bar-tab">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $img; ?>"/>
                                </div>
                            </a>
                            <a class="dribbble-over hvr-pop" href="<?php echo $link ?>" id="font-rsu-20">
                                <?php echo $last['product_name']; ?>
                            </a>
                        </div>
                        <ul class="tools group">
                            <li style="color:red;text-align:center;">
                                <span id="font-22">ราคา <?php echo $last['product_price']; ?> บาท</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>

</div>

<br />

<div class="label label-danger" style="padding:10px; position: relative;">
    <font id="font-22">สินค้าแนะนำ</font>
</div>
<div style=" width: 100%; height: 10px; border-bottom: solid #0063dc 2px; margin-bottom: 5px;"></div>
<div class="row" style=" margin: 0px;">
    <ol class="dribbbles group" style="padding-left: 0px;">
        <?php
        $i = 0;
        foreach ($sale_product as $sale):
            $i++;
            $img = $product_model->get_last_img($sale['product_id']);
            $link = Yii::app()->createUrl('frontend/product/detail/id/' . $config->url_encode($sale['product_id']));
            ?>
            <li id="screenshot-<?php echo $i; ?>" class="col-lg-4 col-md-4 col-sm-6" style="text-align:center; margin-bottom:15px;">
                <div class="dribbble" id="box_list_product">
                    <div class="dribbble-shot">
                        <div class="dribbble-img">
                            <a class="dribbble-link" href="#">
                                <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/hot-full.png" id="title-bar-tab">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $img; ?>"/>
                                </div>
                            </a>
                            <a class="dribbble-over hvr-pop" href="<?php echo $link ?>" id="font-rsu-20">
                                <?php echo $sale['product_name']; ?>
                            </a>
                        </div>
                        <ul class="tools group">
                            <li style="color:red;text-align:center;">
                                <span id="font-22">ราคา <?php echo $sale['product_price']; ?> บาท</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
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
