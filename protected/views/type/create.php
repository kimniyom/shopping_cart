<script type="text/javascript">
    function save_type() {
        $("#loading").addClass("fa fa-spinner fa-spin");
        var url = "<?php echo Yii::app()->createUrl('backend/typeproduct/save_type') ?>";
        var type_id = $("#type_id").val();
        var type_name = $("#type_name").val();
        var data = {
            type_id: type_id,
            type_name: type_name
        };
        if (type_name == "") {
            $("#type_name").focus();
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });

    }
    
    function delete_type(id){
        var r = confirm("ต้องการลบข้อมูล ใช่ หรือ ไม่ ...?");
        if(r === true){
            var url = "<?php echo Yii::app()->createUrl("backend/typeproduct")?>";
            var data = {id: id};
            
            $.post(url,data,function(success){
                window.location.reload();
            });
        }
    }
</script>

<?php
$this->breadcrumbs = array(
    'ประเภทสินค้า'
);
?>

<div class="panel panel-default">
    <div class="panel-heading">จัดการประเภทสินค้า</div>
    <div class="panel-body">
        <div class="row" style="margin: 0px;">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <label>รหัส</label>
                <input class="form-control input-sm" id="type_id" name="type_id" type="text" value="<?php echo $type_id; ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="row" style="margin: 0px;">
            <div class="col-sm-12 col-lg-12">
                <label>ประเภท</label>
                <input class="form-control input-sm" id="type_name" name="type_name" type="text" placeholder="ชื่อประเภทสินค้า ..."/>
            </div>
            <br/>

        </div>
    </div>
    <div class="panel-footer">
        <div class="btn btn-primary" onclick="save_type();"><i class=" glyphicon glyphicon-plus" id="loading"></i> เพิ่มข้อมูล</div>
    </div>
</div>


<table class="table table-striped table-bordered" id="product_type">
    <thead>
        <tr>
            <th>รหัส</th>
            <th>ประเภท</th>
            <th style=" text-align: center;">เมนูจัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($type as $rs): ?>
            <tr>
                <td><?php echo $rs['type_id'] ?></td>
                <td><?php echo $rs['type_name'] ?></td>
                <td style=" text-align: center;">
                    <a href="<?php echo Yii::app()->createUrl('backend/typeproduct/edit&id=' . $rs['id']) ?>">
                        <div class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> แก้ไข</div></a>
                    <div class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> ลบ</div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

