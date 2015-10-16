<script>
    $(document).ready(function () {
        $(".breadcrumb").hide();
    });
</script>

<?php $config = new Configweb_model(); ?>
<br/><br/>
<center>
    <h1>Welcome To ShoppingCart V.1<h1><h3>mini cms</h3><br/>
            <h2>Administrator</h2><br/>


            </center>
            <br/><br/>
            <div class="row" style="margin:0px; text-align: center;">
                <div class="col-lg-6 col-md-6">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $config->get_logoweb(); ?>" style="max-height: 36px; margin-bottom: 5px;"/>
                    <?php echo $config->get_webname(); ?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <a href="http://www.theassembler.net/" target="_bank" class="hvr-buzz-out" style=" text-decoration: none; color: #FFF;">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/assembler_logo.png" style="max-height: 36px; margin-bottom: 5px;"/>
                        &COPY; The Assembler
                    </a>
                </div>
            </div>