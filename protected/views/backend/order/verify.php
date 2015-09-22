<?php
$this->breadcrumbs = array(
    "ตรวจสอบยอดเงิน"
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <font id="font-rsu-18" style="color: #ff3300">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/search-b-icon.png"/>
        รอตรวจสอบยอดเงิน</font>
    </div>
    <div class="panel-body">
        <?php
        $i = 0;
        $web = new Configweb_model();
        foreach ($order as $rs): $i++;
            ?>
            <div class="list-group" id="font-rsu-20">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading" id="font-rsu-20">
                        #<?php echo $rs['order_id']; ?>
                        วันที่ <?php echo $web->thaidate($rs['order_date']); ?>
                    </h4>
                    <p class="list-group-item-text">
                        <button type="button" class="btn btn-warning pull-right" id="font-rsu-20">ตรวจสอบรายการนี้</button>
                        ผู้สั่งซื้อ <?php echo $rs['name'] . ' ' . $rs['lname']; ?><br/>
                        จำนวน <?php echo $rs['PRODUCT_TOTAL']; ?> รายการ<br/>
                        <label class="badge" id="font-rsu-18">ราคารวม <?php echo number_format($rs['PRICE_TOTAL'], 2); ?> บาท </label><br/>
                        หลักฐาน <?php if (!empty($rs['slip'])) { ?>
                            <i class="fa fa-check" style="color: #00ff00;"></i>
                        <?php } else { ?>
                            <i class="fa fa-remove" style="color:red;"></i>
                        <?php } ?><br/>

                    </p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
