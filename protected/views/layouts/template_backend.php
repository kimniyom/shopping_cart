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
            $order_model = new Backend_orders();
            $web = new Configweb_model();
            echo $web->get_webname();
            ?>
        </title>
        <style type="text/css">
            body{
                overflow-x: hidden;
            }

        </style>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/system.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/bootstrap-slate.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/magnific-popup.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/dataTables.bootstrap.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/css/dataTables.tableTools.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/simple-sidebar.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/perfect-scrollbar/css/perfect-scrollbar.css"/>
        <!-- Bootstrap CheckBox -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-checkbox/awesome-bootstrap-checkbox.css" type="text/css" media="all" />

        <script src="<?= Yii::app()->baseUrl; ?>/themes/backend/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/backend/js/bootstrap.js" type="text/javascript"></script>
        <!-- Magnific Popup core CSS file -->
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/jquery.magnific-popup.js"></script>
        <!-- Data table  -->
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <!-- highcharts -->
        <script src="<?= Yii::app()->baseUrl; ?>/assets/highcharts/highcharts.js"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/assets/highcharts/themes/dark-unica.js"></script>

        <script src="<?= Yii::app()->baseUrl; ?>/assets/perfect-scrollbar/js/perfect-scrollbar.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                Ps.initialize(document.getElementById('sidebar-wrapper'));
                $(document).bind("contextmenu", function (e) {
                    return false;
                });
            });

            function chkNumber(ele) {
                var vchar = String.fromCharCode(event.keyCode);
                if ((vchar < '0' || vchar > '9') && (vchar != '.'))
                    return false;
                //ele.onKeyPress = vchar;
            }
        </script>

    </head>

    <body style="/*background:url('<?//php echo Yii::app()->baseUrl; ?>images/line-bg-advice.png')repeat-x fixed #fdfbfc;*/">
        <!--<div class="container" style="margin-bottom:5%;">-->
        <nav class="navbar navbar-default" role="navigation" style="z-index:1; border-radius:0px; margin-bottom:0px;"></nav>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="border-radius:0px; margin-bottom:0px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#menu-toggle" class="navbar-brand" id="menu-toggle"><i class="fa fa-bars"></i></a>
                    <a class="navbar-brand" style=" margin-top: 0px; padding-top: 10px;">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" height="32px"/>
                    </a>
                    <a class="navbar-brand" href="#" style=" font-family: Th;font-size:28px;">
                        <?php echo $web->get_webname(); ?>(Admin)
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li <?php if(Yii::app()->session['navmenu'] == '1'){ echo "class='active'";}?> onclick="set_navbar('1')">
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
                        <li <?php if(Yii::app()->session['navmenu'] == '2'){ echo "class='active'";}?> onclick="set_navbar('2')">
                            <a href="<?php echo Yii::app()->createUrl('frontend/main') ?>">
                                <span class="glyphicon glyphicon-book"></span>
                                <font id="font-th">คู่มือการใช้งาน</font></a>
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

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <!-- ###################### USER #################-->
                <div class="panel panel-primary" id="panel">
                    <div class=" panel-heading" id="panel">
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
                <!-- ตั้งค่าร้านค้า -->
                <div class="panel panel-primary" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>"
                            height="32px"
                            style="border-radius:20px; padding:2px; border:#FFF solid 2px;"/>
                            ข้อมูลร้านค้า
                    </div>
                        <a href="<?= Yii::app()->createUrl('backend/contact')?>" class="list-group-item">
                            <i class="fa fa-phone-square"></i> ข้อมูลติดต่อ
                        </a>
                        <a href="<?= Yii::app()->createUrl('backend/about') ?>" class="list-group-item">
                            <i class="fa fa-user-secret"></i> เกี่ยวกับเรา
                        </a>
                        <a href="<?= Yii::app()->createUrl('backend/banner') ?>" class="list-group-item">
                            <i class="fa fa-image"></i>  จัดการภาพ Banner
                        </a>
                        <a href="<?= Yii::app()->createUrl('backend/logo') ?>" class="list-group-item">
                            <i class="fa fa-smile-o"></i>  จัดการ โลโก้ เว็บ
                        </a>
                        <a href="<?= Yii::app()->createUrl('backend/web') ?>" class="list-group-item">
                            <i class="fa fa-text-height"></i>  จัดการ ชื่อเว็บ
                        </a>
                    </div>
                <!-- List Menu Admin-->
                <div class="panel panel-primary" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?= Yii::app()->baseUrl; ?>/images/system-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;">
                        ตั้งค่าระบบ
                    </div>
                    <a href="<?= Yii::app()->createUrl('backend/typeproduct/from_add_type') ?>"
                       class="list-group-item"><i class="fa fa-folder-open"></i> ประเภทสินค้า</a>
                    <a href="<?= Yii::app()->createUrl('backend/user/userall') ?>"
                       class="list-group-item"><i class="fa fa-group"></i>  ข้อมูลสมาชิก</a>
                    <a href="<?= Yii::app()->createUrl('backend/payment/view') ?>"
                       class="list-group-item"><span class="fa fa-money"></span>  ช่องทางการชำระเงิน</a>
                    <a href="<?= Yii::app()->createUrl('backend/period') ?>"
                       class="list-group-item"><span class="fa fa-calendar"></span>  ระยะเวลาจองสินค้า</a>
                    <a href="<?= Yii::app()->createUrl('backend/transport') ?>"
                          class="list-group-item"><span class="fa fa-truck"></span>  ช่องทางการจัดส่ง</a>
                </div>

                <!-- List รายชื่อ สินค้า -->
                <div class="panel panel-primary" id="panel-head">
                    <div class="panel-heading" id="panel-head">
                        <img src="<?= Yii::app()->baseUrl; ?>/images/shipping-box-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;">
                        จัดการสินค้าในร้าน
                    </div>
                    <?php
                    $produce_type = $product_model->_get_product_type();
                    foreach ($produce_type as $produce_types):
                        ?>
                        <a href="<?php echo Yii::app()->createUrl('backend/product/Getproduct/type_id/' . $produce_types['type_id']) ?>"
                           class="list-group-item"><i class="fa fa-cart-plus"></i>
                               <?php echo $produce_types['type_name']; ?>
                            <span class="label label-default" style=" float: right; font-size: 16px;">
                                <?php echo $product_model->get_count_product_type($produce_types['type_id']); ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- รายการจัดส่งสินค้า -->
                <!-- List รายชื่อ สินค้า -->
                <div class="panel panel-primary" id="panel-head">
                    <div class="panel-heading" id="panel-head">รหัสส่งสินค้า</div>
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
                <br/><br/>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                          <nav class="navbar navbar-default" role="navigation" style="margin-bottom:10px;">
                            <ul class="nav nav-pills pull-right" style="margin:5px;">
                              <li><a href="<?php echo Yii::app()->createUrl('backend/orders/verify') ?>"><i class="fa fa-check-circle"></i> ตรวจสอบการชำระเงิน <span class="badge"><?php echo $order_model->count_verify(); ?> </span></a></li>
                              <li><a href="<?php echo Yii::app()->createUrl('backend/orders/pendingshipment') ?>"><i class="fa fa-paper-plane-o"></i> รอจัดส่ง(แพ็กลงกล่อง) <span class="badge"><?php echo $order_model->count_wait_send(); ?> </span></a></li>
                              <li><a href="<?php echo Yii::app()->createUrl('backend/orders/notification') ?>"><i class="fa fa-send"></i> แจ้งการส่งสินค้า <span class="badge"><?php echo $order_model->count_wait_inform(); ?> </span></a></li>
                            </ul>
                            </nav>
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
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- popup -->
        <div id="overlay_popup">
            <center>
                <div id="show_slip"></div><br/>
            </center>
        </div>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            function set_navbar(id){
                var url = "<?php echo Yii::app()->createUrl('backend/backend/set_navbar')?>"
                var data = {id:id};
                $.post(url,data,function(success){
                    //window.location.reload();
                });
            }
        </script>

    </body>
</html>
