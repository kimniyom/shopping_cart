<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/ckfinder.js"></script>

<script src="<?php echo Yii::app()->baseUrl ?>/assets/uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/assets/uploadify/uploadify.css">

<?php
$ConfigWeb = new Configweb_model();
$title = "แก้ไขสินค้า " . $product['product_id'];
$this->breadcrumbs = array(
    //$type_name => array('backend/product/getproduct&type_id=' . $type_id),
    $title,
);
?>

<div class="well" style="width:100%;">
    <form class="form-horizontal">
        <fieldset>
            <legend style="margin-bottom:0px;">
                <span class="label label-warning">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/add-product-icon.png"/>
                    แก้ไขข้อมูลสินค้า
                </span>
            </legend>
            <div class="row">
                <div class="col-md-3 col-lg-3" id="p-left" style="padding-top:10px;">
                    <div class="well" style=" border:#666666 dashed 2px; text-align: center; cursor: pointer;"
                         onclick="GetImages();">
                        <i class="fa fa-image fa-5x" style=" color: #cccccc;"></i><br/>
                        <i class="fa fa-plus"></i> <font id="font-20">เพิ่มรูปสินค้า</font>
                    </div>
                    <font id="font-20">รูปภาพสินค้า</font>
                    <div id="load_images_product"></div>
                </div>
                <div class="col-md-9 col-lg-9" id="p-right" style="padding-top:10px;">
                <label for="">Category</label>
                    <select class="form-control" id="category" onchange="combotype(this.value)">
                    <option value="">== Select ==</option>
                    <?php foreach($categorys as $rscategory): ?>
                        <option value="<?php echo $rscategory['id'] ?>" <?php echo ($rscategory['id'] == $product['category']) ? "selected" : ""; ?>><?php echo $rscategory['categoryname'] ?></option>
                    <?php endforeach; ?>
                    </select>
                    <label for="">Type</label>
                    <div id="combotype">
                    <select class="form-control" id="type">
                    <?php foreach($types as $rstypes): ?>
                        <option value="<?php echo $rstypes['type_id'] ?>" <?php echo ($rstypes['type_id'] == $product['type_id']) ? "selected" : ""; ?>><?php echo $rstypes['type_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>
                    <label for="">Brand</label>
                    <select class="form-control" id="brand">
                    <option value="">== Select ==</option>
                    <?php foreach($brands as $rsbrans): ?>
                        <option value="<?php echo $rsbrans['id'] ?>" <?php echo ($rsbrans['id'] == $product['brand']) ? "selected" : ""; ?>><?php echo $rsbrans['brandname'] ?></option>
                    <?php endforeach; ?>
                    </select>

                    <input type="hidden" id="product_id" name="product_id" class="form-control" value="<?php echo $product['product_id']; ?>" readonly style="width:40%;"/>

                    <label for="" >ชื่อสินค้า</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" value="<?php echo $product['product_name'] ?>"/>

                    <label for="" >ราคา</label>
                    <input type="text" id="product_price" name="product_price" class="form-control" onKeyUp="if (this.value * 1 != this.value)
                            this.value = '';" style="width:30%;" value="<?php echo $product['product_price'] ?>"/>

                    <br/>
                    <label for="">สถานะ</label>
                    <input id="status" name="status" class="styled" type="radio" value="0" <?php echo ($product['status'] == "0") ? "checked" : ""; ?>/>
                    <label for="radio">พร้อมขาย</label>
                    <input id="status" name="status" class="styled" type="radio" value="1" <?php echo ($product['status'] == "1") ? "checked" : ""; ?>/>
                    <label for="radio">ไม่พร้อมขาย</label>
                    <input id="status" name="status" class="styled" type="radio" value="2" <?php echo ($product['status'] == "2") ? "checked" : ""; ?>/>
                    <label for="radio">Sold Out</label>
                    <br/>
                    <label for="">สินค้าแนะนำ</label>
                    <input id="recommend" name="recommend" class="styled" type="radio" value="1" <?php echo ($product['recommend'] == "1") ? "checked" : ""; ?>/> <label for="radio">Yes</label>
                    <input id="recommend" name="recommend" class="styled" type="radio" value="0" <?php echo ($product['recommend'] == "0") ? "checked" : ""; ?>/> <label for="radio">No</label>
                    <br/>
                    <label for="textArea">รายละเอียด</label>
                    <textarea id="product_detail" name="product_detail" rows="3" class="form-control input-sm" required="required">
                        <?php echo $product['product_detail'] ?>
                    </textarea>
                    <hr/>

                    <button type="button" class="btn btn-success" onclick="save_product()">
                        <i class="fa fa-save"></i>
                        แก้ไขข้อมูล
                    </button>
                    <font style="color: #ff0033; display: none;" id="f_error">กรอกข้อมูลไม่ครบ ..?</font>
                    <!--
                    <button id="save_regis" name="save_regis" class="btn btn-success"
                            onclick="save_product();">
                        <span class="glyphicon glyphicon-save"></span> <b>บันทึกข้อมูล</b></button>
                    -->
                </div>
            </div>
        </fieldset>
    </form>
</div>

<!--
    ##### Model Images #####
-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="popupImages" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="font-18">เลือกรูปภาพ</h4>
            </div>
            <div class="modal-body" style="height: 400px; overflow: auto;">
                <input id="Filedata" name="Filedata" type="file" multiple="true">
                <font id="font-16">* อัพโหลดได้ครั้งละไม่เกิน <?php echo $ConfigWeb->LimitFileUpload() ?> ภาพ,นามสกุลไฟล์ .jpg,ขนาดไม่เกิน <?php echo $ConfigWeb->SizeFileUpload() ?> </font>
                <hr/>
                <div id="load_images"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-danger" onclick="DeleteImgProduct()">Delete</button>
                <button type="button" class="btn btn-primary" onclick="GetvalImg()">เลือกรูปภาพ</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function () {
        //load_data();
        $('#Filedata').uploadify({
            /*'buttonText': 'กรุณาเลือกรูปภาพ ...',*/
            'auto': true, //เปิดใช้การอัพโหลดแบบอัติโนมัติ
            buttonText: "อัพโหลดรูปภาพ",
            //'buttonImage': '<?//= Yii::app()->baseUrl ?>/images/image-up-icon.png',
            'swf': '<?= Yii::app()->baseUrl ?>/assets/uploadify/uploadify.swf', //โฟเดอร์ที่เก็บไฟล์ปุ่มอัพโหลด
            'uploader': "<?= Yii::app()->createUrl('backend/images/uploadify') ?>",
            'fileSizeLimit': "<?php echo $ConfigWeb->SizeFileUpload() ?>", //อัพโหลดได้ครั้งละไม่เกิน 1024kb
            //'width': '128',
            //'height': '132',
            'fileTypeExts': '*.jpg;', //กำหนดชนิดของไฟล์ที่สามารถอัพโหลดได้
            'multi': true, //เปิดใช้งานการอัพโหลดแบบหลายไฟล์ในครั้งเดียว
            'queueSizeLimit': "<?php echo $ConfigWeb->LimitFileUpload() ?>", //อัพโหลดได้ครั้งละ 5 ไฟล์
            'onUploadSuccess': function (file, data, response) {
                load_data();
            }
        });
    });

    loadimagesProduct();
    //Modify By Kimniyom
    CKEDITOR.replace('product_detail', {
        image_removeLinkByEmptyURL: true,
        //extraPlugins: 'image',
        //removeDialogTabs: 'link:upload;image:Upload',
        //filebrowserBrowseUrl: 'imgbrowse/imgbrowse.php',
        //filebrowserUploadUrl: 'ckupload.php',
        //uiColor: '#AADC6E',
        filebrowserBrowseUrl: "<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/ckfinder.html",
        filebrowserImageBrowseUrl: "<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/ckfinder.html?Type=Images",
        filebrowserFlashBrowseUrl: "<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/ckfinder.html?Type=Flash",
        filebrowserUploadUrl: "<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
        filebrowserImageUploadUrl: "<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
        filebrowserFlashUploadUrl: "<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"
    });

    function set_active(status, product_id) {
        var url = "<?php echo Yii::app()->createUrl('backend/product/set_active') ?>";
        var data = {status: status, product_id: product_id};
        $.post(url, data, function (success) {

        });
    }

    function GetImages() {
        load_data();
        $("#popupImages").modal();
    }

    function load_data() {
        $("#load_images").html("<center><i class=\"fa fa-spinner fa-spin\"></i></center>");
        var url = "<?php echo Yii::app()->createUrl('backend/images/loadimages') ?>";
        var data = {};
        $.post(url, data, function (datas) {
            $("#load_images").html(datas);
        });
    }

    function loadimagesProduct() {
        $("#load_images_product").html("<center><i class=\"fa fa-spinner fa-spin\"></i></center>");
        var url = "<?php echo Yii::app()->createUrl('backend/product/get_images') ?>";
        var productID = "<?php echo $product['product_id'] ?>";
        var data = {product_id: productID};
        $.post(url, data, function (datas) {
            $("#load_images_product").html(datas);
            checkheight();
        });
    }

    function save_product() {
        var url = "<?php echo Yii::app()->createUrl('backend/product/save_update') ?>";
        var product_name = $("#product_name").val();
        var category = $("#category").val();
        var type = $("#type").val();
        //var product_num = $("#product_num").val();
        var product_price = $("#product_price").val();
        var product_id = "<?php echo $product['product_id'] ?>";
        var brand = $("#brand").val();
        var status = $("input[name='status']:checked").val();
        var recommend = $("input[name='recommend']:checked").val();
        var product_detail = CKEDITOR.instances.product_detail.getData();

        if (category == '' || product_name == '' || product_price == '' || product_detail == '' || type == '' || brand == '') {
            $("#f_error").show().delay(5000).fadeOut(500);
            return false;
        }

        var data = {
            product_id: product_id,
            product_name: product_name,
            category: category,
            type: type,
            brand: brand,
            product_price: product_price,
            product_detail: product_detail,
            status: status,
            recommend: recommend
        };

        $.post(url, data, function (success) {
            window.location = "<?php echo Yii::app()->createUrl('backend/product/detail_product&product_id=') ?>" + product_id;
        });
    }

    function delete_images(id) {
        var r = confirm("คุณแน่ใจหรือไม่ ...?");
        var url = "<?php echo Yii::app()->createUrl('backend/product/delete_images') ?>";
        var productID = "<?php echo $product['product_id'] ?>";
        var data = {id: id, product_id: productID};

        if (r == true) {
            $.post(url, data, function (datas) {
                //load_data();
                loadimagesProduct();
            });
        }
    }
    
    function checkheight() {
        var w = window.innerWidth;
        if(w >= 768){
            var p_left = $("#p-left").height();
            var p_right = $("#p-right").height();
            //alert(p_left + " - " + p_right);
            if(p_left > p_right){
                $("#p-right").removeClass("p-right");
                $("#p-left").addClass("p-left");
            } else {
                $("#p-left").removeClass("p-left");
                $("#p-right").addClass("p-right");
            }
        } else {
            $("#p-left").css({"border": "none"});
            $("#p-right").css({"border": "none"});
        }

    }


function combotype(category){
        var url = "<?php echo Yii::app()->createUrl('backend/typeproduct/combotype') ?>";
        var data = {category: category,type: ""};
        $.post(url,data,function(datas){
            $("#combotype").html(datas);
        });
    }
</script>
