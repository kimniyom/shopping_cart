<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>
            <?php
            $web = new configweb_model();
            echo $web->get_webname();
            ?>
        </title>
        <style type="text/css">
            @font-face {
                font-family:Th;
                src: url('<?php echo Yii::app()->baseUrl; ?>/css/font/TH K2D July8 Bold.ttf') format('truetype');
            }

            body {
                margin: 0;
                font-family:Th;
            }

            /* For the "inset" look only */
            html {
                font-family:Th;
                overflow: auto;
            }

        </style>

        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/css/system.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/bootstrap/css/bootstrap-readable.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/css/cart.css" type="text/css" media="all" />

        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/bootstrap-select.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/bootstrap-dropdown.js" type="text/javascript"></script>

        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.css"/>

        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/assets/gallery_img/dist/magnific-popup.css" type="text/css" media="all" />
        <script type="text/javascript" charset="utf-8"src="<?php echo Yii::app()->baseUrl; ?>/assets/gallery_img/dist/jquery.magnific-popup.js"></script>

        <!-- Data table  -->
        <script type="text/javascript" charset="utf-8"src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.min.css" type="text/css" media="all" />

        <script type="text/javascript" charset="utf-8"src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/css/dataTables.tableTools.css" type="text/css" media="all" />

        <!-- 
        Grahp
        <script src="<?//= base_url() ?>chart/highcharts.js"></script>
        <script src="<?//= base_url() ?>chart/theam/grid-light.js"></script>
        -->
        <!-- JQuery UI -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/css/Aristo/Aristo.css" />
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/vader/vader.js" type="text/javascript"></script>

        <!-- Banner -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/css/jquery.bxslider.css" type="text/css" media="all" />
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/js/jquery.bxslider.js" type="text/javascript"></script>

        <script type="text/javascript">
            function chkNumber(ele) {
                var vchar = String.fromCharCode(event.keyCode);
                if ((vchar < '0' || vchar > '9') && (vchar != '.'))
                    return false;
                ele.onKeyPress = vchar;
            }
        </script>

        <script type="text/javascript">
            function login() {
                var url = "<?php echo Yii::app()->createUrl('frontend/main/from_login') ?>";
                $("#from_Login").load(url);
                $("#Login").modal();
            }
        </script>

    </head>
    <?php
    //config
    $config = new configweb_model();
    $product_model = new Product();
    $img = Yii::app()->baseUrl . "/images/";
    if (Yii::app()->session['member'] != "") {
        $user = Yii::app()->session['member'];
    }
    ?>
    <body style="background:url('<?php echo Yii::app()->baseUrl; ?>/themes/webapp/images/line-bg-advice.png')repeat-x fixed #fdfbfc;">

        <!-- Modal LogIN-->
        <div class="modal fade" id="Login" tabindex="2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" style=" margin-top: 3%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <center>
                            <h4 class="modal-title" id="myModalLabel">
                                <i class="fa fa-key"></i>
                                เข้าสู่ระบบ
                            </h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div id="from_Login"></div>
                    </div>
                    <div class="modal-footer">
                        <div id="error"style="display:none; font-size: 14px; text-align: center;">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/images/error.png"/> กรอกรข้อมูลให้ครบทุกช่อง ... ?
                        </div>
                        <div id="errorlog" style="display:none; font-size: 14px; text-align: center;">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/themes/webapp/images/error.png"/> ไม่มีรายชื่อในบัญชี ... !
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="container" style="margin-bottom:5%;"> navbar-fixed-top-->
        <nav class="navbar navbar-default" role="navigation" style="z-index:1; border-radius:0px; border: none; margin-bottom:0px; background: none;">
            <div class="container" style="background:url('<?php echo Yii::app()->baseUrl; ?>/themes/webapp/images/glass.png');">
                <a class="navbar-brand" style=" margin-top: 0px; padding-top: 5px;">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $config->get_logoweb(); ?>" height="48px"/>
                </a>
                <a class="navbar-brand" href="#" style=" font-family: Th;font-size:28px;"> 
                    <?php echo $config->get_webname(); ?>
                </a>
            </div>
        </nav>

        <nav class="navbar navbar-default" role="navigation" style="z-index:1; border-radius:0px; border: none; margin-bottom:0px; box-shadow: none;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= Yii::app()->createUrl('frontend/main/main_system') ?>">
                                <span class="glyphicon glyphicon-home"></span> 
                                <font id="font-th">หน้าหลัก</font></a>
                        </li>
                        <li>
                            <a href="<?= Yii::app()->createUrl('web_system/menager_product/payments_g') ?>">
                                <span class="glyphicon glyphicon-usd"></span> 
                                <font id="font-th">วิธีการชำระเงิน</font></a>
                        </li>
                        <?php if (Yii::app()->session['username'] == "U") { ?>
                            <li>
                                <a href="<?= Yii::app()->createUrl('web_system/menager_product/notify') ?>">
                                    <span class="glyphicon glyphicon-tasks"></span> 
                                    <font id="font-th">แจ้งการโอนเงิน</font></a>
                            </li>
                        <?php } ?>

                        <li class="dropdown">
                            <?php if (Yii::app()->session['status'] == "U") { ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-list-alt"></span> 
                                    <font id="font-th">ประวัติสั่งซื้อสินค้า</font> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= Yii::app()->createUrl('web_system/menager_order/from_show_order_product') ?>" id="font-th"> - สินค้าค้างชำระ</a></li>
                                    <li><a href="<?= Yii::app()->createUrl('web_system/menager_order/from_show_order_confrim') ?>" id="font-th"> - สินค้ารอการจัดส่ง</a></li>
                                    <li><a href="<?= Yii::app()->createUrl('web_system/menager_order/from_show_order_success') ?>" id="font-th"> - สินค้าที่จัดส่งเรียบร้อยแล้ว</a></li>
                                </ul>
                            <?php } ?>
                        </li>

                        <li>
                            <a href="<?= Yii::app()->createUrl('web_system/main_system/contact') ?>">
                                <span class="glyphicon glyphicon-phone-alt"></span> 
                                <font id="font-th">ติดต่อเรา</font>
                            </a>
                        </li>

                    </ul>
                    <?php if (Yii::app()->session['username'] != "") { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="<?= Yii::app()->createUrl('site/logout/') ?>">
                                    <span class="glyphicon glyphicon-off"></span> 
                                    <font id="font-th">ออกจากระบบ</font>
                                </a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" onclick="login();">
                                    <span class="glyphicon glyphicon-user"></span> 
                                    <font id="font-th">เข้าสู่ระบบ</font></a>
                            </li>
                        </ul>
                    <?php } ?>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <div class="container" style="background:url(<?php echo Yii::app()->baseUrl; ?>/images/glass.png); padding-top:10px; padding-bottom:5px; margin-bottom:25px;">
            <div class="row">

                <div class="col-sm-12 col-md-3 col-lg-3">

                    <!--###################### USER #################-->
                    <?php if (Yii::app()->session['status'] != '') { ?>
                        <div class="btn btn-warning disabled" id="h_menu">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/use-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;"> ผู้ใช้งาน
                        </div>
                        <div id="use">
                            ชื่อ : <?= Yii::app()->session['username'] ?><br>
                            สถานะ : <?php
                            if (Yii::app()->session['status'] == 'A') {
                                echo "ผู้ดูแลระบบ";
                            } else if (Yii::app()->session['status'] == 'U') {
                                echo "สมาชิก";
                            } else {
                                echo "ผู้ใช้งานทั่วไป";
                            }
                            ?><br/>
                            <a href="<?= Yii::app()->createUrl('web_system/main_system/from_edit_register/'); ?>">ข้อมูลส่วนตัว</a>
                        </div><br/>
                    <?php } ?>

                    <?php if (Yii::app()->session['status'] == 'U') { ?>
                        <!-- รถเข็น -->
                        <div class="btn btn-primary disabled" id="h_menu">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/images/Cart-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;"/> ตะกร้าสินค้า
                        </div>
                        <div id="use">
                            <div style="float:left; text-decoration:underline;">จำนวนสินค้า </div>
                            <div style="float:right; text-decoration:underline; color:#F00; font-weight:bold;">
                                <?php
                                $count = $product_model->_get_cart_count();
                                if (isset($count)) {
                                    echo $count;
                                } else {
                                    echo "0";
                                }
                                ?>
                            </div>
                            <br>          	
                            <div style="float:left; text-decoration:underline;"> ราคา </div>
                            <div style="float:right; text-decoration:underline; color:#F00; font-weight:bold;">
                                <?php
                                $sumall = 0;
                                $result = $product_model->_get_cart_sum();
                                foreach ($result as $data):
                                    $sum = ($data['product_price'] * $data['product_num']);
                                    $sumall = $sumall + $sum;
                                endforeach;

                                echo number_format($sumall);
                                ?>
                            </div>
                            <br><br>
                            <a href="<?= Yii::app()->createUrl('frontend/orders/show_order_list') ?>">ดูรายการสินค้า</a>
                            <a href="#" onclick="javascript:window.location.reload();" style=" float: right;"><span class="glyphicon glyphicon-refresh"></span></a>
                        </div>

                    <?php } ?>
                    <?php if (Yii::app()->session['status'] == "") { ?>
                        <a href="#" style="text-decoration:none; color:#666; text-shadow:#FFF 1px 1px;" onclick="login();">
                            <div id="member" style="width:100%; height:50px; border:#999 solid 1px; padding:5px; font-size:20px; background:url(<?php echo Yii::app()->baseUrl; ?>/images/bg_head.png)">
                                <div class="btn btn-info" style="border-radius:50px; padding:7px;"><img src="<?php echo Yii::app()->baseUrl; ?>/images/use-icon.png"/></div>สำหรับสมาชิก
                            </div>
                        </a>
                        <a href="<?= Yii::app()->createUrl('frontend/main/register') ?>" style="text-decoration:none; color:#666; text-shadow:#FFF 1px 1px;">
                            <div id="member" style="width:100%; height:50px; border:#999 solid 1px; padding:5px; font-size:20px; background:url(<?php echo Yii::app()->baseUrl; ?>/images/bg_head.png)">
                                <div class="btn btn-danger" style="border-radius:50px; padding:7px;"><img src="<?php echo Yii::app()->baseUrl; ?>/images/Register-icon.png"/></div>สมัครสมาชิก
                            </div>
                        </a>

                        <br>
                    <?php } ?>

                    <a href="<?= Yii::app()->createUrl('web_system/menager_product/from_search_product') ?>">
                        <div class="btn btn-info" style="width:100%; height:auto; font-size:20px; text-align:center;">
                            ค้นหาสินค้า<img src="<?php echo Yii::app()->baseUrl; ?>/images/search-icon.png" width="30"/></div>
                    </a>

                    <br><br>

                    <!-- List รายชื่อ สินค้า -->
                    <div class="list-group" style="z-index: 0;">
                        <a class="list-group-item active" style="z-index: 0;">
                            <font style=" font-size: 18px; color: #FFF;" id=" font-th">ประเภทสินค้า</font>
                        </a>
                        <?php
                        $product_type = $product_model->_get_product_type();
                        foreach ($product_type as $product_types):
                            ?>
                            <a href="<?php echo Yii::app()->createUrl('frontend/product/show_product_all&type_id=' . $product_types['type_id']) ?>" 
                               class="list-group-item"><span class="glyphicon glyphicon-paperclip"></span> 
                                <font id="font-th"><?= $product_types['type_name'] ?></font>
                                <span class="badge" style=" margin-top: 10px;">
                                    <?php echo $product_model->get_count_product_type($product_types['type_id']); ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- รายการจัดส่งสินค้า -->
                    <!-- List รายชื่อ สินค้า -->
                    <div class="list-group">
                        <a class="list-group-item  list-group-item-warning active" style=" z-index: 0;">รหัสส่งสินค้า</a>
                        <?php
                        $notify = $product_model->get_notify_postcode();
                        foreach ($notify as $datas):
                            ?>
                            <a class="list-group-item">
                                <span class="glyphicon glyphicon-user"></span> คุณ <?php echo $datas['name'] . ' ' . $datas['lname']; ?><br/>
                                <span class="glyphicon glyphicon-send"></span>  <?php echo $datas['postcode'] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>

                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="panel panel-default" style="overflow:auto; margin-bottom:0%; background:#FFF; border:none;">
                        <!-- Banner -->
                        <div style="margin-left:10px; margin-top: 5px; padding-bottom: 0px; margin-bottom: 0px;" id="banner_home">
                            <ul class="bxslider" style="z-index: 0;">
                                <?php
                                $images = $config->_get_banner_show();
                                foreach ($images as $img):
                                    ?>
                                    <li><img src="<?php echo Yii::app()->baseUrl; ?>/uploads/banner/<?= $img['banner_images'] ?>" /></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!--
                        # End Banner
                        -->

                        <?php if (Yii::app()->session['status'] == 'U') { ?>
                            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                            <div class="row" style=" width: 100%; margin-left: 0px; text-align: center;">
                                <div class="col-xs-6 col-md-4">
                                    <div class="alert alert-dismissable alert-danger">
                                        <strong style=" font-size: 18px;">สินค้าค้างชำระ!</strong><br/> 
                                        <a href="<?php echo Yii::app()->createUrl('web_system/menager_order/from_show_order_product'); ?>">
                                            <span class="badge" style=" font-size: 24px; padding: 5px 10px;"> 
                                                <?php //echo $this->report->get_count_order_unactive(); ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4">
                                    <div class="alert alert-dismissable alert-warning">
                                        <strong style=" font-size: 18px;">สินค้ารอการจัดส่ง</strong><br/>
                                        <a href="<?php echo Yii::app()->createUrl('web_system/menager_order/from_show_order_confrim'); ?>">
                                            <span class="badge" style=" font-size: 24px; padding: 5px 10px;"> 
                                                <?php //echo $this->report->get_count_order_active(); ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4">
                                    <div class="alert alert-dismissable alert-success">
                                        <strong style=" font-size: 18px;">สินค้าจัดส่งแล้ว</strong><br/>
                                        <a href="<?php echo Yii::app()->createUrl('web_system/menager_order/from_show_order_success'); ?>">
                                            <span class="badge" style=" font-size: 24px; padding: 5px 10px;"> 
                                                <?php //echo $this->report->get_count_order_send(); ?>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        <ol class="breadcrumb" style=" margin-bottom: 0px; margin-top: 0px;">
                            <?php if (isset($this->breadcrumbs)): ?>
                                <?php
                                $this->widget('zii.widgets.CBreadcrumbs', array(
                                    'links' => $this->breadcrumbs,
                                ));
                                ?><!-- breadcrumbs -->
                            <?php endif ?>
                        </ol>



                        <div class="panel-body" style="padding:3px 3px 50px 3px; margin-top:0px;">

                            <?PHP
                            echo $content;
                            ?>

                        </div><!-- END BODY -->
                    </div><!-- END PANAL -->

                </div>
            </div>

            <!--
            <div id="co_left" 
                 style="width:20%;height:100%; 
                 margin-bottom:5%; 
                 float:left; 
                 background:#FFF;
                 border:#FFF solid 1px; 
                 border-radius:0px; 
                 padding:5px; z-index:2;">
            </div>
            -->

            <!-- START CONTENER 
            <div class="right_box" style="width:79%;float:right; border:#FFF solid 7px; background:#f4f4f4; margin-bottom:5%; border-radius:0px; padding:0px;">
                
            </div>
            END CONTENER -->

        </div>

        <nav class="navbar navbar-default" role="navigation" style=" background:#1fbbff; color: #FFF; margin-bottom:0px;">
            <div class="container" style="padding-top:20px;">
                <div class="row" style=" margin: 0px;">
                    <div class="col-sm-4">
                        <p style=" color: #FFF; font-size: 20px; font-weight: bold;">
                            สอบถามข้อมูลได้ที่<br/>
                        </p>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/Phone-icon.png"/>
                            </div>
                            <div class="col-sm-9">
                                <p style=" color: #FFF; font-size: 24px; font-weight: bold;">
                                    080-xxxxxxx<br/>
                                    055-xxxxxx
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/Mail-icon.png"/>
                            </div>
                            <div class="col-sm-9">
                                <p style=" color: #FFF; font-size: 24px; font-weight: bold; padding-top: 10px;">
                                    xxxx_ccc@gmail.com
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">
                        <p style=" color: #FFF; font-size: 20px; font-weight: bold;">
                            เป็นเพื่อนกับเรา<br/>
                        </p>

                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/facebook-icon.png"/>
                            </div>
                            <div class="col-sm-3">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/line-icon.png"/>
                            </div>
                            <div class="col-sm-3">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/twitter-icon.png"/>
                            </div>
                        </div>

                        <br/>
                        <div class="row">
                            <p style="float:left;">&COPY; Shopping Cart เวอร์ชั่น 1.0</p> 
                        </div>

                    </div>
                </div>

            </div>
        </nav>

    </body>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.bxslider').bxSlider({
                auto: true,
                speed: 500
            });
        });
    </script>

</html>

