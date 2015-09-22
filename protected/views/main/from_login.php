<style type="text/css">
    body.modal-open #wrap{
        -webkit-filter: blur(7px);
        -moz-filter: blur(15px);
        -o-filter: blur(15px);
        -ms-filter: blur(15px);
        filter: blur(15px);
    }

    .modal-backdrop {background: #f7f7f7;}

    .close {
        font-size: 50px;
        display:block;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $("#login_btn").click(function () {
            $("#load").addClass("fa fa-spinner fa-pulse");
            if ($("#login_email").val() == "" || $("#login_password").val() == "") {
                $("#errorlog").hide();
                $("#error").fadeIn();
                return false;
            }

            var url = "<?php echo Yii::app()->createUrl('frontend/main/login/'); ?>";
            var data = {login_email: $("#login_email").val(), login_password: $("#login_password").val()};

            $.post(url, data,
                    function (success) {
                        if (success == 'nosuccess') {
                            $("#load").removeClass("fa fa-spinner fa-pulse");
                            $("#error").hide();
                            $("#errorlog").fadeIn();
                        } else {
                            window.location = "<?php echo Yii::app()->createUrl('frontend/main') ?>";
                        }
                    }
            );//end post

        });

        // Cencel 

        $("#reset").click(function () {
            $("#login_email").val("");
            $("#login_password").val("");
        });

    });// end jquery
</script>


<center>

    <div style="padding:10px;" id="font-20">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" id="login_email" name="login_email" class="form-control" placeholder="EMAIL..."/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                <input type="password" id="login_password" name="login_password" class="form-control" placeholder="PASSWORD..."/>
            </div>
        </div>

    </div>

    <div type="button"id="login_btn"  class="btn btn-success" style="width:100%;">
        <i class="fa fa-check" id="load"></i>
        เข้าสู่ระบบ
    </div>
    <br/><br/>
    <a href="<?php echo Yii::app()->createUrl('frontend/main/register/'); ?>" style="padding-top:20px;">? สมัคสมาชิก</a><br />

</center>  


