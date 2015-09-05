<script type="text/javascript">
    $(document).ready(function () {
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

<a href="javascript:void(0);" id="font-head">สินค้ามาใหม่</a>
<div style=" width: 100%; height: 10px; border-bottom: solid #0063dc 2px; margin-bottom: 5px;"></div>
<div class="row" style=" margin: 0px;">
    <?php
    $product = new Product();
    foreach ($last_product as $last):
        $img = $product->get_last_img($last['product_id']);
        $link = Yii::app()->createUrl('frontend/product/detail_product&product_id=' . $last['product_id']);
        ?>
        <a href="<?php echo $link; ?>">
            <div class="col-xs-12 col-md-4 col-lg-4">

                <div class="thumbnail btn box_product" style="text-align: center;" id="box_product">
                    <?php if ($img == "") { ?>
                        <div style="width:120px; height:125px;font-size:36px; text-align:center;">
                            NO <br />Images</div>
                    <?php } else { ?>
                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $img; ?>" class="img-responsive" id="img"/>
                    <?php } ?>

                    <div class="caption">
                        <p id="font-product"><?php echo $last['product_name']; ?><br/>
                            ราคา <?php echo $last['product_price']; ?> บาท</p>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>


<br />


<a href="javascript:void(0);" id="font-head">สินค้าแนะนำ</a>
<div style=" width: 100%; height: 10px; border-bottom: solid #0063dc 2px; margin-bottom: 5px;"></div>
<div class="row" style=" margin: 0px;">
    <?php
    foreach ($sale_product as $sale):
        $imghost = $product->get_last_img($sale['product_id']);
        $link = Yii::app()->createUrl('frontend/product/detail_product&product_id=' . $sale['product_id']);
        ?>
        <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="thumbnail btn box_product" style=" text-align: center;" id="box_product">

                <?php if ($img == "") { ?>
                    <div style="width:120px; height:125px;font-size:36px; text-align:center;">
                        NO <br />Images</div>
                <?php } else { ?>
                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?= $imghost; ?>" id="img"/>
                <?php } ?>

                <div class="caption">
                    <p><?php echo $last['product_name'] ?></p>
                    <p>
                        <a href="<?php echo $link; ?>" class="btn btn-warning" role="button">รายละเอียด</a> 
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




