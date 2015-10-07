<ol class="dribbbles group" style="padding-left: 0px;">
    <?php
    $config = new Configweb_model();
    $product_model = new Product();
    $i = 0;
    foreach ($product as $last):
        $i++;
        $img = $product_model->get_last_img($last['product_id']);
        $link = Yii::app()->createUrl('frontend/product/detail/id/' . $config->url_encode($last['product_id']));
        ?>
        <li id="screenshot-<?php echo $i; ?>" class="col-lg-4 col-md-4 col-sm-6" style="text-align:center; margin-bottom:15px;">
            <div class="dribbble" id="box_list_product">
                <div class="dribbble-shot">
                    <div class="dribbble-img">
                        <a class="dribbble-link" href="<?php echo $link; ?>">
                            <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
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
