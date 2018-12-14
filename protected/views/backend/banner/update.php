<?php
$Config = new Configweb_model();
?>

<?php
$this->breadcrumbs = array(
    "BANNER" => array('backend/banner'),
    "UPDATE"
);
?>

<div class="panel panel-default">
    <div class="panel-heading"><b>แก้ไข</b></div>
    <div class="panel-body">
        <label>Title</label>
        <input type="text" class="form-control" id="title" value="<?php echo $banner['title'] ?>"/>
        <label>Link</label>
        <input type="text" class="form-control" id="link" value="<?php echo $banner['link'] ?>"/>
        <label>Detail</label>
        <textarea id="detail" class="form-control" rows="5"><?php echo $banner['detail'] ?></textarea>
        <br/>
        <label>Text-Color</label>
        <input type="color" value="<?php echo $banner['color'] ?>" id="color">
        <hr/>
    </div>
    <div class="panel-footer">
        <button type="button" class="btn btn-default" onclick="Save()"><i class="fa fa-save"></i> บันทึก</button>
    </div>
</div>

<script type="text/javascript">
    function Save() {
        var url = "<?php echo Yii::app()->createUrl('backend/banner/saveupdate') ?>";
        var title = $("#title").val();
        var color = $("#color").val();
        var link = $("#link").val();
        var detail = $("#detail").val();
        var id = "<?php echo $banner['banner_id'] ?>";
        var data = {id: id, title: title, link: link, detail: detail, color: color};

        $.post(url, data, function (success) {
            window.location = "<?php echo Yii::app()->createUrl('backend/banner') ?>";
        });
    }
</script>
