<script type="text/javascript">
    $(document).ready(function () {
        $("#address").attr("disabled", "disabled");
        $("#tel").attr("disabled", "disabled");

        $("#edit_address").click(function () {
            $("#address").removeAttr("disabled");
            $("#tel").removeAttr("disabled");
            $("#save_address").show();
        });
    });
</script>


<div class="well">
    <i class="fa fa-user"></i><br/>
    <label>
        คุณ <?php echo $address['name'] . ' ' . $address['lname'] ?>
    </label>
    <br/><br/>

    เลขที่ : 
    อาคาร : <br/>
    ชั้น :<br/>
    ห้อง :<br/>
    ตำบล :<br/>
    อำเภอ : <br/>
    จังหวัด : <br/>
    รหัสไปรษณีย์ : <br/>

    <br/><br/>
    Tel : <?php echo $address['tel'] ?><br/>
    Email : <?php echo $address['email'] ?>
</div>

<label><h3>แก้ไขที่อยู่ใหม่</h3></label>
<div class="well">
    <div class="row">
        <div class="col-lg-3">
            ชื่อ
        </div>
        <div class="col-lg-9">
            <input type="text" id="name" name="name" class="form-control input-sm"/>
        </div><br/><br/>
        <div class="col-lg-3">
            นามสกุล
        </div>
        <div class="col-lg-9">
            <input type="text" id="lname" name="lname" class="form-control input-sm"/>
        </div><br/><br/>
        <div class="col-lg-3">
            เลขที่
        </div>
        <div class="col-lg-9">
            <input type="text" id="number" name="number" class="form-control input-sm"/>
        </div><br/><br/>
        <div class="col-lg-3">
            อาคาร
        </div>
        <div class="col-lg-9">
            <input type="text" id="lname" name="lname" class="form-control input-sm"/>
        </div><br/><br/>
        <div class="col-lg-3">
            ชั้น
        </div>
        <div class="col-lg-9">
            <input type="text" id="lname" name="lname" class="form-control input-sm"/>
        </div><br/><br/>
        <div class="col-lg-3">
            ห้อง
        </div>
        <div class="col-lg-9">
            <input type="text" id="lname" name="lname" class="form-control input-sm"/>
        </div><br/><br/>
        <div class="col-lg-3">
            จังหวัด
        </div>
        <div class="col-lg-9">
            <select id="changwat" name="changwat" class="form-control input-sm">
                <option value="">เลือกจังหวัด</option>
                <?php foreach ($changwat as $ch): ?>
                    <option value="<?php echo $ch['changwat_id'] ?>"><?php echo $ch['changwat_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div><br/><br/>
        <div class="col-lg-3">
            อำเภอ
        </div>
        <div class="col-lg-9">
            <select id="ampur" name="ampur" class="form-control input-sm">
            </select>
        </div><br/><br/>
        <div class="col-lg-3">
            ตำบล
        </div>
        <div class="col-lg-9">
            <select id="tambon" name="tambon" class="form-control input-sm">
                <option value=""></option>
            </select>
        </div><br/><br/>
        <div class="col-lg-3">
            รหัสไปรษณีย์
        </div>
        <div class="col-lg-9">
            <input type="text" id="zipcode" name="zipcode" class="form-control input-sm" maxlength="5"/>
        </div><br/><br/>
    </div>
</div>