<?php
$this->breadcrumbs = array(
    "รอตรวจสอบ"
);
?>

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
        <button type="button" class="btn btn-success btn-sm ">แจ้งชำระเงิน <i class="fa fa-check"></i></button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-warning btn-sm ">ตรวจสอบ <i class="fa fa-warning"></i></button>
    </div>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-danger btn-sm ">ส่งของ <i class="fa fa-remove"></i></button>
    </div>
</div><br/>

<div class="panel panel-default">
    <div class="panel-heading">
        <font id="font-rsu-18" style="color: #ff3300">
        <img src="<?php echo Yii::app()->baseUrl;?>/images/search-b-icon.png"/>
         รอตรวจสอบยอดเงิน</font>
    </div>
    <table class="table table-striped" id="font-20">
        <thead>
            <tr style=" background: #cccccc;">
                <th>#</th>
                <th>รหัส</th>
                <th style="text-align: center;">วันที่</th>
                <th style="text-align: center;">จำนวน</th>
                <th style="text-align: right;">ราคา</th>
                <th style="text-align: center;">สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $web = new Configweb_model();
            foreach ($order as $rs): $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs['order_id']; ?></td>
                    <td style="text-align: center;"><?php echo $web->thaidate($rs['order_date']); ?></td>
                    <td style="text-align: center;"><?php echo $rs['PRODUCT_TOTAL']; ?></td>
                    <td style="text-align: right;"><?php echo number_format($rs['PRICE_TOTAL'],2); ?></td>
                    <td style="text-align: center; color: #ff6600;"><i class="fa fa-info-circle"></i> รอตรวจสอบยอดเงิน</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
