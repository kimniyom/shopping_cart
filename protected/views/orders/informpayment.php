<style type="text/css">
    .panel-heading .accordion-toggle:after {
        /* symbol for "opening" panels */
        font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
        content: "\e114";    /* adjust as needed, taken from bootstrap.css */
        float: right;        /* adjust as needed */
        color: grey;         /* adjust as needed */
    }
    .panel-heading .accordion-toggle.collapsed:after {
        /* symbol for "collapsed" panels */
        content: "\e080";    /* adjust as needed, taken from bootstrap.css */
    }
</style>
<?php
$this->breadcrumbs = array(
    "รอชำระเงิน",
);
?>

<div class="well" style="background: none;">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-success btn-sm ">เลือกสินค้า <i class="fa fa-check"></i></button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-success btn-sm ">ตรวจสอบที่อยู่ <i class="fa fa-check"></i></button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-success btn-sm ">ยืนยันการสั่งซื้อ <i class="fa fa-check"></i></button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-warning btn-sm ">แจ้งชำระเงิน <i class="fa fa-warning"></i></button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-danger btn-sm ">ตรวจสอบ <i class="fa fa-remove"></i></button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-danger btn-sm ">ส่งของ <i class="fa fa-remove"></i></button>
        </div>
    </div><br/>

    <div style=" color: #ff3300;" id="font-rsu-18">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/payment-icon.png"/>
        * เลือกรายการที่จะชำระเงิน
    </div><br/>
    <div class="panel-group" id="accordion">

        <?php
        $web = new Configweb_model();
        $i = 0;
        foreach ($order as $rs):
            $i++;
            if ($i == '1') {
                $active = "in";
            } else {
                $active = "";
            }
            ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title" style=" color: #ff3300;">
                        <a href="<?php echo Yii::app()->createUrl('frontend/orders/confieminformpayment',array('order_id' => $rs['order_id'])) ?>">
                            <div class="btn btn-default btn-xs">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/atm-icon.png"/>
                                แจ้งชำระรายการนี้
                            </div></a>
                            <font id="font-rsu-18">
                        รหัสสั่งซื้อ <span class="badge"><?php echo $rs['order_id'] ?></span>
                        วันที่ <?php echo $web->thaidate($rs['order_date']) ?>
                        รวมสินค้า <span class="badge"><?php echo $rs['PRODUCT_TOTAL'] ?></span>
                        รวมราคา <span class="badge"><?php echo number_format($rs['PRICE_TOTAL'], 2) ?></span>

                        <div class="pull-right">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                รายการสินค้า
                            </a>
                        </div>
                    </font>
                    </h4>
                </div>
                <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo $active; ?>">

                    <table width="100%" class="table" id="font-20">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>รูป</td>
                                <td>ชื่อสินค้า</td>
                                <td style="text-align: center;">ราคา</td>
                                <td style="text-align: center;">จำนวน</td>
                                <td style="text-align: right;">ราคารวม</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalall = 0;
                            $i = 1;
                            $product_model = new Product();
                            $order = new Orders();
                            $product = $order->_get_list_order($rs['order_id']);
                            foreach ($product as $products):
                                $img = $product_model->get_last_img($products['product_id']);
                                ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td style=" width: 10%;">
                                        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $img; ?>" class="img-resize img-thumbnail" width="100%"/>
                                    </td>
                                    <td><?= $products['product_name']; ?></td>
                                    <td style=" text-align: right;"><?= number_format($products['product_price']); ?></td>
                                    <td style="text-align: center;"><?= $products['product_num']; ?></td>
                                    <td style="text-align: right;"><?= number_format(($products['product_price'] * $products['product_num']), 2); ?></td>
                                    <?php
                                    $total = (($products['product_price'] * $products['product_num']));
                                    $totalall = $totalall + $total;
                                    ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr style="color:#ff3300;">
                                <td colspan="5" align="center"><font style="text-decoration:underline;">ราคาสุทธิ </font></td>
                                <td style=" text-align: right;"><font style="text-decoration:underline;"><?= number_format($totalall, 2) ?></font> </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>


