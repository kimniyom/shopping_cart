<script type="text/javascript">
    function save_about() {
        var url = "<?php echo Yii::app()->createUrl('backend/contact/save') ?>";
        var email = $("#c_email").val();
        var tel = $("#c_tel").val();

        if (email == '' || tel == '') {
            $("#f_error").show().delay(5000).fadeOut(500);
            return false;
        }
        var data = {
            email: email,
            tel: tel
        };

        $.post(url, data, function (success) {
            window.location = "<?php echo Yii::app()->createUrl('backend/contact/view')?>";
            $("#f_success").show().delay(5000).fadeOut(500);
        });
    }
</script>

<?php
    $title = "ข้อมูลติดต่อ";
    $this->breadcrumbs = array($title,);
?>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">
            <i class="fa fa-phone"></i> ข้อมูลติดต่อ</a></li>
    <li role="presentation">
        <a href="#social" aria-controls="social" role="tab" data-toggle="tab">
            <i class="fa fa-facebook"></i> โซเชียลมีเดีย</a></li>
    <li role="presentation"><a href="#"><i class="fa fa-eye"></i> view</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="contact">
        <div class="panel panel-default" style="border-top:none; border-radius:0px;">
                <div class="panel-heading">
                    <i class="fa fa-phone"></i> ข้อมูลติดต่อ
                    <div class="pull-right">
                        <a href="<?php echo Yii::app()->createUrl('backend/about');?>"><i class="fa fa-eye"></i> view</a>
                    </div>
                </div>
                <div class="panel-body">
                <div class="col-lg-12">
                    <label>อีเมล์</label>
                    <input type="text" id="c_email" class="form-control"/>
                    <label>เบอร์โทรศัพท์</label>
                    <input type="text" id="c_tel" class="form-control">
                </div>
            </div>
                <div class="panel-footer">
                    <button type="button" class="btn btn-success" onclick="save_about()">
                        <i class="fa fa-save"></i>
                        บันทึกข้อมูล
                    </button>
                    <font style=" color: #ff0033; display: none;" id="f_error">กรอกข้อมูลไม่ครบ ..?</font>
                    <font style=" color: green; display: none;" id="f_success">บันทึกข้อมูลแล้ว</font>
                    <!--
                    <button id="save_regis" name="save_regis" class="btn btn-success"
                            onclick="save_product();">
                        <span class="glyphicon glyphicon-save"></span> <b>บันทึกข้อมูล</b></button>
                    -->
                </div>
            </div>
    </div>

    <!-- content Tab 2-->
    <div role="tabpanel" class="tab-pane" id="social">
        <div role="tabpanel" class="tab-pane active" id="contact">
            <div class="panel panel-default" style="border-top:none; border-radius:0px;">
                    <div class="panel-heading">
                        <i class="fa fa-facebook"></i> โซเชียลมีเดีย
                        <div class="pull-right">
                            <a href="javascript:save_about()"><i class="fa fa-save"></i> บันทึกข้อมูล</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <font style=" color: #ff0033; display: none;" id="f_error">กรอกข้อมูลไม่ครบ ..?</font>
                            <font style=" color: green; display: none;" id="f_success">บันทึกข้อมูลแล้ว</font>
                            <div class="col-lg-4 col-md-4">
                                <label>Social media</label>
                            </div>
                            <div class="col-lg-8">
                                <label>ID</label>
                            </div>
                        </div><font style=" color: #ff0033; display: none;" id="f_error">กรอกข้อมูลไม่ครบ ..?</font>
                            <font style=" color: green; display: none;" id="f_success">บันทึกข้อมูลแล้ว</font>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:100%;">
                                    <span id="icon">เลือกแอพพลิเคชั่น</span>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <?php foreach($massocial as $rs):?>
                                    <li>
                                        <a href="javascript:set_social('<?php echo $rs['id']?>','<?php echo $rs['social_app']?>','<?php echo $rs['icon']?>')">
                                            <img src="<?php echo Yii::app()->baseUrl;?>/images/<?php echo $rs['icon']?>" width="24"/>
                                            <?php echo $rs['social_app']?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                  </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <input type="text" id="c_tel" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <?php if(empty($social)){ ?>
                            <center>ไม่มีข้อมูล</center>
                        <?php } ?>
                        <table class="table">
                        <?php foreach($social as $datas):?>
                        <tr>
                            <td style="text-align:center;">
                                <img src="<?php echo Yii::app()->baseUrl;?>/images/<?php echo $datas['icon']?>" width="24"/>
                            </td>
                            <td><?php echo $datas['social_app'] ?></td>
                            <td><?php echo $datas['accout'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div><!-- end panel -->
        </div>
    </div><!-- End Tab 2 -->
</div>

<script type="text/javascript">
    function set_social(id,app,icon){
        var img = "<img src='<?php echo Yii::app()->baseUrl;?>/images/" + icon + "' width='24'/> " + app;
        $("#social_id").val(id);
        $("#icon").html(img);
    }
</script>
