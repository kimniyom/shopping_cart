<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>
            <?php
            $product_model = new Product();
            $web = new Configweb_model();
            echo $web->get_webname();
            ?>
        </title>

        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/system.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/bootstrap-slate.css" type="text/css" media="all" />

        <script src="<?= Yii::app()->baseUrl; ?>/themes/backend/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/backend/js/bootstrap.js" type="text/javascript"></script>

        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/magnific-popup.css" type="text/css" media="all" />
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/jquery.magnific-popup.js"></script>

        <!-- Data table  -->
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/dataTables.bootstrap.css" type="text/css" media="all" />
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>


        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/css/dataTables.tableTools.css" type="text/css" media="all" />

        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.css"/>
        <!-- highcharts -->
        <script src="<?= Yii::app()->baseUrl; ?>/assets/highcharts/highcharts.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/assets/highcharts/themes/dark-unica.js"></script>

        <script type="text/javascript">

            $(document).ready(function ()
            {
                $(document).bind("contextmenu", function (e) {
                    return false;
                });
            });

            function chkNumber(ele) {
                var vchar = String.fromCharCode(event.keyCode);
                if ((vchar < '0' || vchar > '9') && (vchar != '.'))
                    return false;
                ele.onKeyPress = vchar;
            }
        </script>

    </head>

    <body style="/*background:url('<?//php echo Yii::app()->baseUrl; ?>images/line-bg-advice.png')repeat-x fixed #fdfbfc;*/">

        <!--<div class="container" style="margin-bottom:5%;">-->
        <nav class="navbar navbar-default" role="navigation" style="z-index:1; border-radius:0px; margin-bottom:0px;"></nav>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="z-index:1; border-radius:0px; margin-bottom:0px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style=" margin-top: 0px; padding-top: 5px;">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" height="32px"/>
                    </a>
                    <a class="navbar-brand" href="#" style=" font-family: Th;font-size:28px;">
                        <?php echo $web->get_webname(); ?>(Admin)
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?php echo Yii::app()->createUrl('frontend/main') ?>">
                                <span class="glyphicon glyphicon-home"></span>
                                <font id="font-th">หน้าหลัก</font></a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-signal"></span>
                                <font id="font-th">รายงาน </font><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo Yii::app()->createUrl('backend/report/mas_report_list') ?>" id="font-th"> - รายงานยอดขาย</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('backend/report/mas_report_order') ?>" id="font-th"> - รายงานการสั่งซื้อสินค้า</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('backend/report/mas_report_type') ?>" id="font-th"> - รายงานการสั่งซื้อสินค้า(แยกประเภท)</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('backend/report/mas_report_sale') ?>" id="font-th"> - รายงานรายได้</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('backend/report/mas_report_user') ?>" id="font-th"> - รายงานการเข้าเป็นสมาชิก</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?= Yii::app()->createUrl('site/logout/') ?>">
                                <span class="glyphicon glyphicon-off"></span>
                                <font id="font-th">ออกจากระบบ</font>
                            </a>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <div class="container-fluid" style="background:none; padding-top:10px; padding-bottom:5px; margin-bottom:25px;">
            <div class="row">

                <div class="col-lg-3 col-sm-12 col-md-3">

                    <!-- ###################### USER #################-->
                    <div class="panel panel-default">
                        <div class=" panel-heading">
                            <img src="<?= Yii::app()->baseUrl; ?>/images/use-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;"> ผู้ใช้งาน
                        </div>
                        <div class=" panel-body">
                            ชื่อ : <?= Yii::app()->session['username']; ?><br>
                            สถานะ : <?php echo "ผู้ดูแลระบบ"; ?><br/>

                        </div>
                        <div class="panel-footer">
                            <a href="<?= Yii::app()->createUrl('frontend/user/from_edit_register/'); ?>">ข้อมูลส่วนตัว</a>
                        </div>
                    </div>

                    <!-- ส่วนของ ผู้ดูแลระบบ -->

                    <!-- List Menu Admin-->
                    <div class="list-group">
                        <a class="list-group-item list-group-item-success active" style=" z-index: 0;">
                            <img src="<?= Yii::app()->baseUrl; ?>/images/system-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;">
                            จัดการระบบ
                        </a>
                        <a href="<?= Yii::app()->createUrl('backend/typeproduct/from_add_type') ?>"
                           class="list-group-item"><i class="fa fa-folder-open"></i> ประเภทสินค้า</a>

                        <a href="<?= Yii::app()->createUrl('backend/user/userall') ?>"
                           class="list-group-item"><i class="fa fa-group"></i>  ข้อมูลสมาชิก</a>

                        <a href="<?= Yii::app()->createUrl('web_system/menager_admin/check_order') ?>"
                           class="list-group-item">
                            <i class="fa fa-check-circle"></i>  ตรวจสอบการสั่งซื้อสินค้า
                            <span class="label label-default" style=" float: right; font-size: 16px;">
                                <?php //echo $product_model->_get_count_order(); ?>
                            </span>
                        </a>
                        <a href="<?= Yii::app()->createUrl('web_system/menager_admin/from_confrim_notify') ?>"
                           class="list-group-item"><span class="fa fa-send-o"></span>  แจ้งการส่งสินค้า</a>
                        <a href="<?= Yii::app()->createUrl('web_system/upload_images/from_show_banner') ?>"
                           class="list-group-item"><span class="fa fa-image"></span>  จัดการภาพ Slide</a>
                        <a href="<?= Yii::app()->createUrl('web_system/upload_images/from_show_logo') ?>"
                           class="list-group-item"><span class="fa fa-smile-o"></span>  จัดการ โลโก้ เว็บ</a>
                        <a href="<?= Yii::app()->createUrl('web_system/menager_admin/from_show_webname') ?>"
                           class="list-group-item"><span class="fa fa-text-height"></span>  จัดการ ชื่อเว็บ</a>
                        <a href="<?= Yii::app()->createUrl('backend/payment/view') ?>"
                           class="list-group-item"><span class="fa fa-money"></span>  ช่องทางการชำระเงิน</a>
                    </div>


                    <!-- List รายชื่อ สินค้า -->
                    <div class="list-group" style="z-index: 0;">
                        <a class="list-group-item list-group-item-danger active" style="z-index: 0;">
                            <i class="fa fa-shopping-cart fa-2x"></i> สินค้าในร้าน
                        </a>

                        <?php
                        $produce_type = $product_model->_get_product_type();
                        foreach ($produce_type as $produce_types):
                            ?>
                            <a href="<?php echo Yii::app()->createUrl('backend/product/Getproduct&type_id=' . $produce_types['type_id']) ?>"
                               class="list-group-item"><i class="fa fa-cart-plus" style="color:green;"></i>
                                   <?php echo $produce_types['type_name']; ?>
                                <span class="label label-default" style=" float: right; font-size: 16px;">
                                    <?php echo $product_model->get_count_product_type($produce_types['type_id']); ?>
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
                <div class="col-lg-9 col-sm-12 col-md-9">

                    <ol class="breadcrumb well well-sm" style=" margin-bottom: 10px; margin-top: 0px;">

                        <?php if (isset($this->breadcrumbs)): ?>
                            <?php
                            $this->widget('zii.widgets.CBreadcrumbs', array(
                                'homeLink' => CHtml::link('<i class=" glyphicon glyphicon-home"></i> หน้าหลัก', Yii::app()->createUrl('backend/backend')),
                                'links' => $this->breadcrumbs,
                            ));
                            ?><!-- breadcrumbs -->
                        <?php endif ?>
                    </ol>


                    <?php
                    echo $content;
                    ?>



                </div>
            </div>

        </div>

        <div style=" height: 40px;z-index:0; position: fixed; bottom: 0px; left: 0px; background: #FFF; width: 100%; border-top: solid 1px #f4f4f4;">
            <div class="container" style="padding:10px;">
                <p style="float:left;">&COPY; ระบบการสั่งซื้อผลิตภัณฑ์ภูมิปัญญาท้องถิ่นอำเภอบ้านตาก เวอร์ชั่น 1.0</p>
                <p style=" float: right;">
                    &nbsp; &nbsp; &nbsp;
                    <a href="http://tak.cdd.go.th/" target="_bank">
                        สำนักงานพัฒนาชุมชนจังหวัดตาก
                    </a>

                    &nbsp; &nbsp;  | &nbsp; &nbsp;
                    <a href="http://123.242.165.136/" target="_bank">
                        จังหวัดตาก
                    </a>


                </p>

            </div>
        </div>

    </body>

</html>
