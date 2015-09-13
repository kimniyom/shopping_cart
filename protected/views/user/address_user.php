<script type="text/javascript">
    function chang_address(type, value, active) {
        var url = "<?php echo Yii::app()->createUrl('frontend/user/get_combobox') ?>";
        var data = {type: type, value: value, active: active};
        $.post(url, data, function (result) {
            $("#" + type).html(result);
        });
    }

    function edit_address() {
        var url = "<?php echo Yii::app()->createUrl('frontend/user/get_address') ?>";
        var pid = "<?php echo Yii::app()->session['pid'] ?>";
        var data = {pid: pid};
        $.post(url, data, function (result) {
            $("#show_address").html(result);
            $("#edit_address").modal();
        });

    }

    function save_address() {
        var url = "<?php echo Yii::app()->createUrl('frontend/user/save_address') ?>";
        var name = $("#name").val();
        var lname = $("#lname").val();
        var number = $("#number").val();
        var building = $("#building").val();
        var _class = $("#class").val();
        var room = $("#room").val();
        var changwat = $("#changwat").val();
        var ampur = $("#ampur").val();
        var tambon = $("#tambon").val();
        var zipcode = $("#zipcode").val();
        var pid = "<?php echo Yii::app()->session['pid'] ?>";

        if (name == '') {
            $("#name").focus();
            return false;
        }

        if (lname == '') {
            $("#lname").focus();
            return false;
        }

        if (number == '') {
            $("#number").focus();
            return false;
        }

        if (changwat == '') {
            $("#changwat").focus();
            return false;
        }

        if (ampur == '') {
            $("#ampur").focus();
            return false;
        }

        if (tambon == '') {
            $("#tambon").focus();
            return false;
        }

        if (zipcode == '') {
            $("#zipcode").focus();
            return false;
        }

        var data = {
            name: name,
            lname: lname,
            number: number,
            building: building,
            _class: _class,
            room: room,
            changwat: changwat,
            ampur: ampur,
            tambon: tambon,
            pid: pid,
            zipcode: zipcode
        };

        $.post(url, data, function (result) {
            $("#edit_address").modal("hide");
            load_address();
        });

    }
</script>

<div class="well" style=" background: #FFF;" id="font-18">
    <div class="btn btn-default btn-xs" onclick="edit_address()" style=" float: right;">
        <i class=" glyphicon glyphicon-edit"></i>
        แก้ไขที่อยู่
    </div><br/>
    <label>
        คุณ <?php echo $address['name'] . ' ' . $address['lname'] ?>
    </label>
    <br/><br/>
    <label>เลขที่</label> <?php echo $address['number'] ?>
    <label>อาคาร</label> <?php echo $address['building'] ?>
    <label>ชั้น</label> <?php echo $address['class'] ?>
    <label>ห้อง</label> <?php echo $address['room'] ?><br/>
    <label>ตำบล</label>  <?php echo $address['tambon_name'] ?><br/>
    <label>อำเภอ</label>  <?php echo $address['ampur_name'] ?><br/>
    <label>จังหวัด</label>  <?php echo $address['changwat_name'] ?><br/>
    <label>รหัสไปรษณีย์</label>  <?php echo $address['zipcode'] ?>
    <br/><br/>
    <label>Tel </label> <?php echo $address['tel'] ?><br/>
    <label>Email </label> <?php echo $address['email'] ?>
</div>


<!-- Modal Edit Address -->
<div class="modal fade" id="edit_address">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="fa fa-home"></i> แก้ไขที่อยู่
                </h4>
            </div>
            <div class="modal-body">
                <div id="show_address"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> ปิดหน้านี้</button>
                <button type="button" class="btn btn-primary" onclick="save_address()"><i class="fa fa-save"></i> แก้ไขที่อยู่</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

