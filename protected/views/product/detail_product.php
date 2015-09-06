
<style type="text/css">
    table tr td{ height:30px;}
    #im-resize{ width: 80px; height: 75px; padding: 5px; margin-bottom: 5px;}
    #cart_box{
        float: right; margin-top: 0px; padding-top: 15px;
        position:fixed; top:10px; right:20px;z-index:3;
    }
</style>

<script type="text/javascript">
    function Add_cart_success() {
        //$('.add-to-cart').on('click', function () {
        var cart = $('.shopping-cart');
        //var imgtodrag = $(this).parent('.item').find("img").eq(0);
        var imgtodrag = $("#img-cart").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                    .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                    .css({
                        'opacity': '0.5',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '100'
                    })
                    .appendTo($('body'))
                    .animate({
                        'top': cart.offset().top + 10,
                        'left': cart.offset().left + 10,
                        'width': 75,
                        'height': 75
                    }, 1000, 'easeInOutExpo');

            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach();
            });
            load_inbox_cart();
        }
        //});
    }
</script>

<script type="text/javascript">

    function add_cart(order_id, product_id, price) {
        var url = "<?= Yii::app()->createUrl('frontend/orders/add_cart') ?>";
        var num = $("#num").val();
        var price_total = (price * num);
        alert(price_total);
        var data = {
            order_id: order_id,
            product_id: product_id,
            price: price,
            num: num,
            price_total: price_total
        };

        if (num == '' || num == '0') {
            alert("กรุณากรอกจำนวน");
            return false;
        }
        $.post(url, data,
                function (success) {
                    //alert('เพิ่มสินค้าในตะกร้าแล้ว');
                    Add_cart_success();
                    //window.location.reload();
                }
        ); // End post
    }
</script>

<script type="text/javascript">
    function set_group_img(img) {
        $("#img_group").html("<img src='<?php echo Yii::app()->baseUrl ?>/uploads" + "/" + img + " ' width='80%' style='margin-right:20px;' />");
    }
</script>

<script type="text/javascript">
    function get_comment(product_id) {
        var url = "<?php echo Yii::app()->createUrl('comment/get_comment'); ?>";
        var data = {product_id: product_id};
        $.post(url, data, function (datas) {
            $("#etc_product").html(datas);
        });
    }
</script>

<script type="text/javascript">
    function show_list_cart() {
        $("#cartlist").modal();
        var url = "<?php echo Yii::app()->createUrl('frontend/orders/show_order_shout_list'); ?>";
        var data = "";
        $.post(url, data, function (result) {
            $("#load_cart").html(result);
        });
    }

    function load_cart_list() {
        load_inbox_cart();
        var url = "<?php echo Yii::app()->createUrl('frontend/orders/show_order_shout_list'); ?>";
        var data = "";
        $.post(url, data, function (result) {
            $("#load_cart").html(result);
        });
    }

    function load_inbox_cart() {
        var url = "<?php echo Yii::app()->createUrl('frontend/product/load_inbox_cart'); ?>";
        var data = "";
        $.post(url, data, function (result) {
            $("#load_inbox_cart").html(result);
        });
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        load_inbox_cart();
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
    $product['type_name'] => array('frontend/product/show_product_all&type_id=' . $product['type_id']),
    $product['product_name'],
);
?>

<?php
$config = new Configweb_model();
echo Yii::app()->session['order_id'];
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

<!--
       cart list
-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="cartlist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/full-shopping-cart-icon.png"/>
                    <font style="padding-top: 10px;">ตะกร้าสินค้า</font>
                </h5>
            </div>
            <div class="modal-body" id="load_cart"></div>
        </div>
    </div>
</div>
<!--
    End cart list
-->

<div class="well" style=" width:100%; margin-top:20px; background:#FFF; text-align: left;">
    <div class="row">

        <div class="col-lg-4 col-md-12 col-xs-12">

            <font style=" color: #F00; font-size: 24px; font-weight: normal;">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/yellow-tag-icon.png"/>
            <?= $product['product_name'] ?>
            </font><br/>
            <b>รหัสสินค้า</b> <?= $product['product_id'] ?><br/>
            <b>ประเภทสินค้า</b> <?= $product['type_name'] ?><br/>
            <b>อัพเดทล่าสุด</b> <?= $config->thaidate($product['d_update']); ?><br/><br/>
            <div class="row">
                <div class="well">
                    <?php if (Yii::app()->session['status'] != '') { ?>

                        <table style=" width: 100%;">
                            <tr>
                                <td><b style=" font-size: 16px;">จำนวน</b></td>
                                <td>
                                    <input type="text" class="form-control" id="num" value="1" style="text-align: center; border: #F00 solid 2px; height: 43px; font-size: 16px;"/>
                                </td>
                                <td style=" text-align: center;">
                                    <button class="btn btn-danger add-to-cart" type="button"
                                            onclick="add_cart('<?= Yii::app()->session['order_id'] ?>', '<?php echo $product['product_id'] ?>', '<?php echo $product['product_price'] ?>');">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> 
                                        <b style=" font-size: 16px;">หยิบใส่ตะกร้า</b>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    <?php } else { ?>
                        <center>
                            <b>เข้าสู่ระบบก่อนสั่งสินค้า</b>
                        </center>
                    <?php } ?>
                    <?php $price = $product['product_price']; ?>
                </div>
            </div>

            <center>
                <font style="color:#000; font-size: 24px;">
                ราคา
                <span class="badge btn-danger" style="font-size: 24px;"><?= number_format($product['product_price']) ?>.-</span>  บาท
                </font>
            </center>
        </div>

        <div class="col-lg-8 col-md-12 col-xs-12" style=" padding-top: 20px;">
            <?php
            $product_model = new Product();
            $img = $product_model->get_last_img($product['product_id']);
            if ($img != "") {
                ?>
                <center>
                    <img src="<?= Yii::app()->baseUrl ?>/uploads/<?= $img; ?>" class="img-responsive thumbnail" alt="Responsive image" id="img-cart"/>
                </center>     
            <?php } else { ?>
                <div id="img" style="width:400px; height:350px; background:#CCC; font-size:36px; text-align:center; padding-top:30px; margin-right:20px;">
                    NO<br />Images 
                </div>
            <?php } ?>

        </div>

    </div>


    <?php if ($img != "No-Camera-icon.png") { ?>
        <div class="row">
            <div class=" col-lg-12" style=" text-align: center;">
                <img src="<?php echo Yii::app()->baseUrl; ?>/images/box-shadow-t.png" class="img-responsive"/>
            </div>
        </div>

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
                                <a class="image-link" href="<?php echo Yii::app()->baseUrl; ?>/uploads/<?= $rs['images'] ?>">
                                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?= $rs['images'] ?>" class="btn btn-default" id="im-resize"/></a>
                            <?php endforeach; ?>
                        </center>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class=" col-lg-12" style=" text-align: center;">
                <img src="<?php echo Yii::app()->baseUrl; ?>/images/box-shadow-t.png" class="img-responsive"/>
            </div>
        </div>
    <?php } ?>

    <div class="row" style="text-align: center; margin-top: 20px;">
        <div class="btn-group btn-group-sm" role="group" aria-label="...">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-hand-down"></span> รายละอียด</button>
            <button type="button" class="btn btn-default"
                    onclick="get_comment('<?php echo $product['product_id'] ?>');"><span class="glyphicon glyphicon-comment"></span> คำถาม</button>
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-usd"></span> วิธีการสั่งซื้อ</button>
        </div>
    </div>
    <center>
        <h4>รายละเอียด</h4>
    </center>
    <div class="well" 
         style="padding: 2px; background: none; border: #bfefff solid 1px; border-radius:5px;   
         text-align: center;
         margin-top: 10px; font-size: 16px; padding-left: 15px;" id="etc_product">
         <?= $product['product_detail'] ?>
    </div>

    <!-- สินค้าที่เกียวข้อง -->
    <div class="panel panel-primary">
        <div class="panel-heading">
            สินค้าใกล้เคียง
        </div>
        <div class="panel-body">
            <div class="row">
                <?php
                foreach ($near as $ne):
                    $link = Yii::app()->createUrl('frontend/product/detail_product&product_id=' . $ne['product_id']);
                    ?>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <a href="<?php echo $link; ?>" class="image-link">
                            <div class="thumbnail btn" style=" text-align: center;" id="box_product">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $ne['images']; ?>" id="img"/>
                                <div class="caption">
                                    <p style="color: #ff0000; font-size: 16px;">
                                        <?php echo $ne['product_name']; ?><br/>
                                        ราคา <b><?php echo $ne['product_price']; ?></b> บาท
                                    </p>

                                </div>
                            </div></a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
