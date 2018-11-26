<style type="text/css">
    table tr td{ height:30px;}
    #im-resize{height: 75px; padding: 5px; margin-bottom: 5px;}
    #cart_box{
        float: right; margin-top: 0px; padding-top: 15px;
        position:fixed; top:10px; right:20px;z-index:3;
    }
</style>

<script type="text/javascript">
    function set_group_img(img) {
        $("#img_group").html("<img src='<?php echo Yii::app()->baseUrl ?>/uploads" + "/" + img + " ' width='80%' style='margin-right:20px;' />");
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();

        $('.img_zoom').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled: true
            }
            // other options
        });

    });
</script>

<?php
$this->breadcrumbs = array(
    $product['categoryname'] => array('backend/product/category/categoryID/' . $product['category']),
    $product['type_name'] => array('backend/product/getproduct/category/' . $product['category'] . '/type/' . $product['type_id']),
    $product['product_name'],
);
?>

<?php
$config = new Configweb_model();
$ProductModel = new Backend_Product();
?>

<span class="navbar-brand" id="cart_box" data-toggle="popover" 
      data-trigger="hover" data-placement="left" data-trigger="focus"
      data-content="ตะกร้าสินค้า">
    <a href="Javascript:void(0);" onclick="show_list_cart();">
        <i class="shopping-cart"></i>
    </a>
    <div class="label label-success" id="load_inbox_cart" 
         style="text-align: center; font-size: 12px; position: absolute; top: 10px; right: 10px;">
    </div>
</span>

<div class="well" style=" width:100%; margin-top:20px;text-align: left; background: #FFF;">
    <div class="row">

        <div class="col-lg-6 col-md-6 col-xs-12">
            <a href="<?php echo Yii::app()->createUrl('backend/product/update', array("product_id" => $product['product_id'])) ?>">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Update</button></a>
            <hr/>
            <font style=" color: #F00; font-size: 24px; font-weight: normal;">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/yellow-tag-icon.png"/>
            <?= $product['product_name'] ?>
            </font><br/>
            <b>รหัสสินค้า</b> <?= $product['product_id'] ?><br/>
            <b>Category</b> <?= $product['categoryname'] ?><br/>
            <b>Type</b> <?= $product['type_name'] ?><br/>
            <b>Brand</b> <?= $product['brandname'] ?><br/>
            <b>อัพเดทล่าสุด</b> <?= $config->thaidate($product['d_update']); ?><br/><br/>
            <b>ราคา</b> <b style=" color: #F00;">
                <?php if ($product['product_price_pro'] > 0) { ?>
                    <del><?= number_format($product['product_price']) ?></del>
                    <?= number_format($product['product_price_pro']) ?>
                <?php } else { ?>    
                    <?= number_format($product['product_price']) ?>
                <?php } ?> .- บาท
            </b><br/><br/>
            <b>Description</b> <br/>
            <?php echo $product['description'] ?>
            <hr/> สินค้าแนะนำ:<?php echo ($product['recommend'] == "1") ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-remove text-danger'></i>"; ?>
            สินค้าขายดี:<?php echo ($product['recommend'] == "1") ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-remove text-danger'></i>"; ?>
            <br/>สถานะ:<?php echo $ProductModel->Status($product['status']) ?>
        </div>

        <div class="col-lg-6 col-md-6 col-xs-12" style=" padding-top: 20px;">
            <?php
            $product_model = new Product();
            $img_title = $product_model->firstpictures($product['product_id']);
            if (!empty($img_title)) {
                $img = "uploads/product/" . $img_title;
            } else {
                $img = "images/No_image_available.jpg";
            }
            if ($img != "") {
                ?>
                <center>
                    <img src="<?= Yii::app()->baseUrl ?>/<?= $img; ?>" class="img-responsive thumbnail" alt="Responsive image" id="img-cart"/>
                </center>     
            <?php } else { ?>
                <div id="img" style="width:400px; height:350px; background:#CCC; font-size:36px; text-align:center; padding-top:30px; margin-right:20px;">
                    NO<br />Images 
                </div>
            <?php } ?>
            <br/>
            <?php if ($img != "No-Camera-icon.png") { ?>
                <div class=" row">
                    <div class=" col-lg-12">
                        <!-- Img -->
                        <?php if ($img != "") { ?>
                            <div class="img_zoom">
                                <center>
                                    <?php foreach ($images as $rs): ?>
                                        <!--
                                            <a href="javascript:void(0);" onclick="set_group_img('<?//php echo $rs->images ?>');" style=" text-decoration: none;">
                                        -->
                                        <a class="image-link" href="<?php echo Yii::app()->baseUrl; ?>/uploads/product/<?= $rs['images'] ?>">
                                            <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/product/<?= $rs['images'] ?>" class="btn btn-default" id="im-resize" style=" background: #FFF;"/></a>
                                    <?php endforeach; ?>
                                </center>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">รายละเอียด</a></li>
            <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">รีวิว(<?php echo $countreview ?>)</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row" id="etc_product">
                    <div class="col-lg-12 col-md-12">
                        <div style=" padding: 10px;">
                            <?= $product['product_detail'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="review">
                <div id="box-review" style=" padding: 10px;"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    loadreview();
    function loadreview() {
        $("#box-review").html("<center><i class='fa fa-spinner fa-spin fa-2x'></i></center>");
        var product_id = "<?php echo $product['product_id'] ?>";
        var url = "<?php echo Yii::app()->createUrl('backend/product/review') ?>";
        var data = {product_id: product_id};

        $.post(url, data, function (result) {
            $("#box-review").html(result);
        });
    }

    function deleteReview(id) {
        var url = "<?php echo Yii::app()->createUrl('backend/product/deletereview') ?>";
        var data = {id: id};
        $.post(url, data, function (datas) {
            loadreview();
        });
    }
</script>
