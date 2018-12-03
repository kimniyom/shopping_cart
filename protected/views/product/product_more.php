<?php
$productModel = new Product();
?>

<?php
foreach ($product as $rsProduct):
    $img_title = $productModel->firstpictures($rsProduct['product_id']);
    if (!empty($img_title)) {
        $img = "uploads/product/thumbnail/480-" . $img_title;
    } else {
        $img = "images/No_image_available.jpg";
    }
    ?>
    <figure class="item" style=" margin-bottom: 35px;">
        <div class="product product-style-3" style=" background: #f1f2f4;  box-shadow: #999999 3px 3px 10px 0px;">
            <div class="img-wrapper" style="border:none;">
                <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>">
                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" />
                </a>

            </div>
            <figcaption class="desc">
                <h4 class="font-supermarket">
                    <a class="product-name" style="color:#5c5c5c;" href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>"><?php echo $rsProduct['product_name'] ?></a>
                </h4>
                <span class="price font-supermarket" style="color:#000000; font-weight: bold; font-size: 18px;">
                    <?php if ($rsProduct['product_price_pro'] > 0) { ?> 
                        <del style=" color: #ff0000;"><?php echo number_format($rsProduct['product_price']) ?></del>
                        <?php echo number_format($rsProduct['product_price_pro']) ?>  .-
                    <?php } else { ?>
                        <?php echo number_format($rsProduct['product_price']) ?>  .-
                    <?php } ?>
                </span>
            </figcaption>
        </div>
    </figure>
<?php endforeach; ?>




