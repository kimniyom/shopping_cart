<script>
    $(document).ready(function () {
        $(".breadcrumb").hide();
    });
</script>

<?php $config = new Configweb_model(); ?>
<br/><br/>
<center>
    <h1>Welcome To Backend V.1</h1><br/>
            <h2>Administrator</h2><br/>


            </center>
            <br/><br/>
            <div class="row" style="margin:0px; text-align: center;">
                <div class="col-lg-12 col-md-12" style=" text-align: center;">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $config->get_logoweb(); ?>" style="max-height: 300px; margin-bottom: 5px;"/>
                    <?php echo $config->get_webname(); ?>
                </div>
                
            </div>