<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>
            <?php
            $product_model = new Backend_product();
            $order_model = new Backend_orders();
            $web = new Configweb_model();
            echo $web->get_webname();

            $privilege = Privilege::model()->find("user=:user", array(":user" => Yii::app()->user->id));
            ?>
        </title>
        <style type="text/css">
            body{
                overflow-x: hidden;
            }
        </style>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/system.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/bootstrap/css/bootstrap.css" type="text/css" media="all" />

        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/magnific-popup.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/dataTables.bootstrap.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/css/dataTables.tableTools.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-4.3.0/css/font-awesome.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/themes/backend/css/simple-sidebar.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/assets/perfect-scrollbar/css/perfect-scrollbar.css"/>
        <link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/css/card-css/card-css.css"/>
        <!-- Bootstrap CheckBox
        <link rel="stylesheet" href="<?php //echo Yii::app()->baseUrl;     ?>/css/bootstrap-checkbox/awesome-bootstrap-checkbox.css" type="text/css" media="all" />
        -->
        <script src="<?= Yii::app()->baseUrl; ?>/js/jquery.js" type="text/javascript"></script>
        <script src="<?= Yii::app()->baseUrl; ?>/themes/backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Magnific Popup core CSS file -->
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/gallery_img/dist/jquery.magnific-popup.js"></script>
        <!-- Data table -->
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" charset="utf-8"src="<?= Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <!-- highcharts -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <!--
        <script src="<?//= Yii::app()->baseUrl; ?>/assets/highcharts/themes/dark-unica.js"></script>
        -->
        <script src="<?= Yii::app()->baseUrl; ?>/assets/perfect-scrollbar/js/perfect-scrollbar.js"></script>

        <!-- Uploadify -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/assets/uploadifynews/uploadifive.css" type="text/css" media="all" />
        <script src="<?php echo Yii::app()->baseUrl; ?>/assets/uploadifynews/jquery.uploadifive.min.js" type="text/javascript"></script>

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

    <body style="/*background:url('<?//php echo Yii::app()->baseUrl; ?>images/line-bg-advice.png')repeat-x fixed #fdfbfc;*/ background:#f1f2f7;">
        <!--<div class="container" style="margin-bottom:5%;">-->
        <nav class="navbar navbar-default" role="navigation" style="z-index:1; border-radius:0px; margin-bottom:0px;"></nav>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="border-radius:0px; margin-bottom:0px; background: #FFFFFF;">
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
                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $web->get_logoweb(); ?>" height="24px"/>
                    </a>
                    <a class="navbar-brand" href="#" style=" font-family: Th;font-size:28px;">
                        <?php echo $web->get_webname(); ?>(Admin)
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('site/index') ?>">
                                <span class="glyphicon glyphicon-home"></span>
                                <font id="font-th">หน้าหลัก</font></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="fa fa-code"></span>
                                <font id="font-th">Log </font><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($privilege['log'] == '1') { ?>
                                    <li><a href="<?php echo Yii::app()->createUrl('backend/logproduct/index') ?>"> - product</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('backend/loguserlogin/index') ?>"> - userlogin</a></li>
                                <?php } else { ?>
                                    <li style=" text-align: center;">ไม่มีสิทธิ์</li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php if (!Yii::app()->user->isGuest) { ?>
                                <a href="<?= Yii::app()->createUrl('site/logout/') ?>">
                                    <span class="glyphicon glyphicon-off"></span>
                                    <font id="font-th">ออกจากระบบ</font>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <!-- ###################### USER #################-->
                <div class="panel panel-default" id="panel-head">
                    <div class=" panel-heading" id="panel">
                        <img src="<?= Yii::app()->baseUrl; ?>/images/use-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;"> ผู้ใช้งาน
                    </div>
                    <div class="panel-body">
                        ชื่อ : <?php echo Yii::app()->user->name ?><br>
                        สถานะ : <?php echo "ผู้ดูแลระบบ"; ?><br/>
                        <hr/>
                        <a href="<?php echo Yii::app()->createUrl('backend/masuser/updatepassword') ?>"><i class="fa fa-pencil"></i> แก้ไขรหัสผ่าน</a>
                    </div>
                    <div class="panel-footer" style="border-bottom:solid 1px #eeeeee; border-radius:0px;">
                        <b>MENU</b>
                    </div>
                </div>
                <!-- ส่วนของ ผู้ดูแลระบบ -->
                <!-- ตั้งค่าร้านค้า -->
                <div class="panel panel-default side1" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/company-icon.png" height="32px"
                             style="border-radius:20px; padding:2px; border:#FFF solid 2px;"/>
                        ข้อมูลร้านค้า
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <?php if ($privilege['shop'] == '1') { ?>
                        <div class="list-group" id="side1">
                            <a href="<?= Yii::app()->createUrl('backend/contact') ?>" class="list-group-item" onclick="setSideMenu('side1', 'side1')">
                                <i class="fa fa-phone-square"></i> Contact
                            </a>
                            <a href="<?= Yii::app()->createUrl('backend/about') ?>" class="list-group-item" onclick="setSideMenu('side1', 'side1')">
                                <i class="fa fa-user-secret"></i> Abount
                            </a>
                            <a href="<?= Yii::app()->createUrl('backend/banner') ?>" class="list-group-item" onclick="setSideMenu('side1', 'side1')">
                                <i class="fa fa-image"></i>  Banner
                            </a>
                            <a href="<?= Yii::app()->createUrl('backend/logo') ?>" class="list-group-item" onclick="setSideMenu('side1', 'side1')">
                                <i class="fa fa-smile-o"></i>  โลโก้
                            </a>
                            <a href="<?= Yii::app()->createUrl('backend/web') ?>" class="list-group-item" onclick="setSideMenu('side1', 'side1')">
                                <i class="fa fa-text-height"></i>  ชื่อเว็บ
                            </a>
                            <!--
                            <a href="<?php //Yii::app()->createUrl('backend/howtoorder')           ?>" class="list-group-item">
                                <i class="fa fa-book"></i>  วิธีการสั่งซื้อ
                            </a>
                            -->
                        </div>
                    <?php } else { ?>
                        <center>ไม่มีสิทธิ์</center>
                    <?php } ?>
                </div>

                <!-- List Menu Admin-->
                <div class="panel panel-default side2" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?= Yii::app()->baseUrl; ?>/images/system-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;">
                        ตั้งค่าระบบ
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <?php if ($privilege['setting'] == '1') { ?>
                        <div class="list-group" id="side2">
                            <a href="<?php echo Yii::app()->createUrl('backend/masuser/admin') ?>"
                               class="list-group-item" onclick="setSideMenu('side2', 'side2')"><i class="fa fa-group"></i> ผู้ใช้งาน</a>
                            <a href="<?php echo Yii::app()->createUrl('backend/masuser/create') ?>"
                               class="list-group-item" onclick="setSideMenu('side2', 'side2')"><i class="fa fa-plus"></i> เพิ่มผู้ใช้งาน</a>

                            <!--
                            <a href="<?php //echo Yii::app()->createUrl('backend/user/userall')         ?>"
                               class="list-group-item"><i class="fa fa-group"></i>  ข้อมูลสมาชิก</a>
                            <a href="<?php //echo Yii::app()->createUrl('backend/payment/view')         ?>"
                               class="list-group-item"><span class="fa fa-money"></span>  ช่องทางการชำระเงิน</a>
                            <a href="<?php //echo Yii::app()->createUrl('backend/period')         ?>"
                               class="list-group-item"><span class="fa fa-calendar"></span>  ระยะเวลาจองสินค้า</a>
                            <a href="<?php //echo Yii::app()->createUrl('backend/transport')         ?>"
                               class="list-group-item"><span class="fa fa-truck"></span>  ช่องทางการจัดส่ง</a>
                            -->
                        </div>
                    <?php } else { ?>
                        <center>ไม่มีสิทธิ์</center>
                    <?php } ?>
                </div>

                <!-- List รายชื่อ สินค้า -->

                <div class="panel panel-default side3" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/shipping-box-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px;">
                        สินค้า
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <?php if ($privilege['product'] == '1') { ?>
                        <div class="list-group" id="side3">
                            <a href="<?= Yii::app()->createUrl('backend/category/admin') ?>"
                               class="list-group-item" onclick="setSideMenu('side3', 'side3')"><i class="fa fa-folder-open"></i> Category</a>
                            <a href="<?= Yii::app()->createUrl('backend/typeproduct/from_add_type') ?>"
                               class="list-group-item" onclick="setSideMenu('side3', 'side3')"><i class="fa fa-folder-open"></i> Types</a>
                            <a href="<?= Yii::app()->createUrl('backend/brand/admin') ?>"
                               class="list-group-item" onclick="setSideMenu('side3', 'side3')"><i class="fa fa-folder-open"></i> Brands</a>
                            <a href="<?= Yii::app()->createUrl('backend/product/index') ?>"
                               class="list-group-item" onclick="setSideMenu('side3', 'side3')"><i class="fa fa-folder-open"></i> Products</a>
                        </div>
                    <?php } else { ?>
                        <center>ไม่มีสิทธิ์</center>
                    <?php } ?>
                </div>

                <!-- List รายชื่อ สินค้า -->
                <div class="panel panel-default side4" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?= Yii::app()->baseUrl; ?>/images/blog-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px; width: 32px;">
                        บทความ / event
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <?php if ($privilege['article'] == '1') { ?>
                        <div class="list-group" id="side4">
                            <a href="<?php echo Yii::app()->createUrl('backend/articlecategory/admin') ?>" class="list-group-item" onclick="setSideMenu('side4', 'side4')">
                                <i class="fa fa-folder"></i> Category
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('backend/article/create') ?>" class="list-group-item" onclick="setSideMenu('side4', 'side4')">
                                <i class="fa fa-plus"></i> สร้างบทความ / event
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('backend/article') ?>" class="list-group-item" onclick="setSideMenu('side4', 'side4')">
                                <i class="fa fa-newspaper-o"></i> บทความ / event ทั้งหมด
                            </a>
                        </div>
                    <?php } else { ?>
                        <center>ไม่มีสิทธิ์</center>
                    <?php } ?>
                </div>

                <div class="panel panel-default side5" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?= Yii::app()->baseUrl; ?>/images/Contacts-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px; width: 32px;">
                        ติดต่อจากลูกค้า
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <?php if ($privilege['contact'] == '1') { ?>
                        <div class="list-group" id="side5">
                            <a href="<?php echo Yii::app()->createUrl('backend/contactuser/noread') ?>" class="list-group-item" onclick="setSideMenu('side5', 'side5')">
                                <i class="fa fa-folder"></i> ยังไม่อ่าน
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('backend/contactuser/read') ?>" class="list-group-item" onclick="setSideMenu('side5', 'side5')">
                                <i class="fa fa-folder-open"></i> อ่านแล้ว
                            </a>
                            <a href="<?php echo Yii::app()->createUrl('backend/contactuser/contact') ?>" class="list-group-item" onclick="setSideMenu('side5', 'side5')">
                                <i class="fa fa-newspaper-o"></i> ทั้งหมด
                            </a>
                        </div>
                    <?php } else { ?>
                        <center>ไม่มีสิทธิ์</center>
                    <?php } ?>
                </div>

                <!-- รายการจัดส่งสินค้า -->
                <!-- List รายชื่อ สินค้า -->
                <!--
                <div class="panel panel-default side5" id="panel-head">
                    <div class="panel-heading" id="panel">
                        <img src="<?php //echo Yii::app()->baseUrl;            ?>/images/front-icon.png" style="border-radius:20px; padding:2px; border:#FFF solid 2px; width: 32px;">
                        รหัสส่งสินค้า
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-down"></i></span>
                    </div>
                    <div class="list-group" id="side5">
                <?php
                //$notify = $product_model->get_notify_postcode();
                //foreach ($notify as $datas):
                ?>
                            <a class="list-group-item">
                                <span class="glyphicon glyphicon-user"></span> คุณ <?php //echo $datas['name'] . ' ' . $datas['lname'];            ?><br/>
                                <span class="glyphicon glyphicon-send"></span>  <?php //echo $datas['postcode']            ?>
                            </a>
                <?php //endforeach; ?>
                    </div>
                </div>
                -->
                <br/><br/>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper" style="padding:0px;">
                <!--
                <nav class="navbar navbar-default" role="navigation" style="margin-bottom:10px; border-radius: 0px; padding-top: 3px;">
                    <ul class="nav nav-pills pull-right" style="margin:5px;">
                        <li><a href="<?php //echo Yii::app()->createUrl('backend/orders/verify')       ?>"><i class="fa fa-check-circle"></i> ตรวจสอบการชำระเงิน <span class="badge"><?php echo $order_model->count_verify(); ?> </span></a></li>
                        <li><a href="<?php //echo Yii::app()->createUrl('backend/orders/pendingshipment')       ?>"><i class="fa fa-paper-plane-o"></i> รอจัดส่ง(แพ็กลงกล่อง) <span class="badge"><?php echo $order_model->count_wait_send(); ?> </span></a></li>
                        <li><a href="<?php //echo Yii::app()->createUrl('backend/orders/notification')       ?>"><i class="fa fa-send"></i> แจ้งการส่งสินค้า <span class="badge"><?php echo $order_model->count_wait_inform(); ?> </span></a></li>
                    </ul>
                </nav>
                -->
                <ol class="breadcrumb well well-sm" style=" margin-bottom: 10px; margin-top: 0px; border-radius: 0px; background: #FFFFFF; box-shadow: none;">

                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'homeLink' => CHtml::link('<i class=" glyphicon glyphicon-home"></i> หน้าหลัก', Yii::app()->createUrl('backend/backend')),
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

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

            function set_navbar(id) {
                var url = "<?php echo Yii::app()->createUrl('backend/backend/set_navbar') ?>"
                var data = {id: id};
                $.post(url, data, function (success) {
                    //window.location.reload();
                });
            }

            function setSideMenu(group, menu) {
                var url = "<?php echo Yii::app()->createUrl('backend/menubackend/setactive') ?>"
                var data = {group: group, menu: menu};
                $.post(url, data, function (success) {
                    //window.location.reload();
                });
            }

            $(function () {
                var sideMenus = "<?php echo Yii::app()->session['groupmenu'] ?>";
                var sideMenu;
                if (sideMenus != "") {
                    sideMenu = sideMenus;
                } else {
                    sideMenu = "side1";
                }
                var menuId = "#" + sideMenu;
                var menuClass = "." + sideMenu;
                $('.panel').find(menuId).show();
                $(menuClass + ' span.clickable').find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');

                $(".dropdown").hover(
                        function () {
                            $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                            $(this).toggleClass('open');
                            $('b', this).toggleClass("caret caret-up");
                        },
                        function () {
                            $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                            $(this).toggleClass('open');
                            $('b', this).toggleClass("caret caret-up");
                        });
            });

            $(document).on('click', '.panel-heading span.clickable', function (e) {
                var $this = $(this);
                if (!$this.hasClass('panel-collapsed')) {
                    $this.parents('.panel').find('.list-group').slideDown();
                    $this.addClass('panel-collapsed');
                    $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                } else {
                    $this.parents('.panel').find('.list-group').slideUp();
                    $this.removeClass('panel-collapsed');
                    $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
                }
            });
        </script>
    </body>
</html>
