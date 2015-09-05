<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/assets/ckeditor/ckfinder/ckfinder.js"></script>

<?php
$title = "เพิ่มสินค้า";
$this->breadcrumbs = array(
    $type_name => array('backend/product/getproduct&type_id=' . $type_id),
    $title,
);
?>

<script type="text/javascript">

    function save_product() {
        var url = "<?php echo Yii::app()->createUrl('backend/product/save_product') ?>";
        var product_name = $("#product_name").val();
        var type_id = "<?php echo $type_id ?>";
        var product_num = $("#product_num").val();
        var product_price = $("#product_price").val();
        var product_id = $("#product_id").val();
        var product_detail = CKEDITOR.instances.product_detail.getData();
        
        if (product_name == '' || product_price == '' || product_detail == '' || product_num == '') {
            $("#f_error").show().delay(5000).fadeOut(500);

            return false;
        }

        
        var data = {
            product_id: product_id,
            product_name: product_name,
            type_id: type_id,
            product_num: product_num,
            product_price: product_price,
            product_detail: product_detail
        };
        
        
        $.post(url, data, function (success) {
            window.location = "<?php echo Yii::app()->createUrl('backend/product/detail_product&product_id=') ?>" + product_id;
        });

    }
</script>
<div class="well" style="width:100%;">

    <form class="form-horizontal">
        <fieldset>
            <legend>
                <span class="label label-warning">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/add-product-icon.png"/>
                    เพิ่มข้อมูลสินค้า
                </span>
            </legend>
            <div class="form-group">
                <label for="" class="col-lg-2 control-label">รหัสสินค้า</label>
                <div class="col-lg-10">
                    <input type="text" id="product_id" name="product_id" class="form-control" value="<?php echo $product_id; ?>" readonly style="width:40%;"/>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-lg-2 control-label">ชื่อสินค้า</label>
                <div class="col-lg-10">
                    <input type="text" id="product_name" name="product_name" class="form-control" style="width:100%;" required="required"/>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-lg-2 control-label">ราคา</label>
                <div class="col-lg-10">
                    <input type="text" id="product_price" name="product_price" class="form-control" onkeypress="return chkNumber()" style="width:30%;" required="required"/>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-lg-2 control-label">จำนวน</label>
                <div class="col-lg-10">
                    <input type="text" id="product_num" name="product_num"
                           value="1"
                           class="form-control" onkeypress="return chkNumber()" style="width:30%;" required="required"/>
                </div>
            </div>
            <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">รายละเอียด</label>
                <div class="col-lg-10">
                    <textarea id="product_detail" name="product_detail" rows="3" class="form-control input-sm" required="required"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="button" class="btn btn-success" onclick="save_product()">
                        <i class="fa fa-save"></i>
                        บันทึกข้อมูล
                    </button>
                    <font style=" color: #ff0033; display: none;" id="f_error">กรอกข้อมูลไม่ครบ ..?</font>
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

<script>

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
    });</script>

