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
        <div class="product product-style-3" style=" background: #f1f2f4;">
            <div class="img-wrapper" style="border:none;">
                <a href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>">
                    <img class="img-responsive" src="<?php echo Yii::app()->baseUrl; ?>/<?php echo $img ?>" alt="product thumbnail" />
                </a>
               
            </div>
            <figcaption class="desc">
                <h4 class="font-supermarket">
                    <a class="product-name" style="color:#5c5c5c;" href="<?php echo Yii::app()->createUrl('frontend/product/views', array("id" => $rsProduct['product_id'])) ?>"><?php echo $rsProduct['product_name'] ?></a>
                </h4>
                <span class="price" style="color:#000000;"><?php echo number_format($rsProduct['product_price']) ?>.-</span>
            </figcaption>
        </div>
    </figure>
<?php endforeach; ?>


