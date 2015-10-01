
<?php
$this->breadcrumbs = array(
    "สินค้ารอการจัดส่ง"
);
?>

<p style="color:red;">
    *<i class="fa fa-warning"></i>โปรดตรวจเช็คสินค้าให้ครบถ้วนก่อนบรรจุของ
</p>
<div class="panel panel-default">
    <div class="panel-heading">
        <font id="font-rsu-18" style="color: #ff3300">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/transport-icon.png"/>
        สินค้ารอการจัดส่ง</font>
    </div>
    <div class="panel-body">
        <?php
        $i = 0;
        $web = new Configweb_model();
        foreach ($order as $rs): $i++;
            ?>
            <div class="list-group">
                <div class="list-group-item active">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="list-group-item-heading" id="font-rsu-20">
                                #<?php echo $rs['order_id']; ?>
                                สั่งซื้อวันที่ <?php echo $web->thaidate($rs['order_date']); ?>
                            </h4>
                            
                                ผู้สั่งซื้อ <?php echo $rs['name'] . ' ' . $rs['lname']; ?><br/>
                                จำนวน <?php echo $rs['PRODUCT_TOTAL']; ?> รายการ<br/><br/>
                                <label class="badge" id="font-rsu-18">
                                    ราคารวม <?php echo number_format($rs['PRICE_TOTAL'], 2); ?> บาท 
                                </label><br/>
                   
                            </div>
                            <div class="col-lg-6">
                                <a href="#" class="pull-right" style="color:yellow;"><i class="fa fa-print"></i> พิมพ์</a>
                                <h4>ที่อยู่จัดส่ง</h4><br/>
                                &nbsp;&nbsp;คุณ <?php echo $rs['name'] . ' ' . $rs['lname']; ?><br/>
                                <ul style=" padding-top: 5px;">
                                    <?php
                                    echo "<li>เลขที่ ";
                                    if (isset($rs['number'])) {
                                        echo ($rs['number']);
                                    } else {
                                        echo "-";
                                    } "</li>";
                                    echo "<li>อาคาร ";
                                    if (isset($rs['building'])) {
                                        echo ($rs['building']);
                                    } else {
                                        echo "-";
                                    } "</li>";
                                    echo "<li>ชั้น ";
                                    if (isset($rs['class'])) {
                                        echo ($rs['class']);
                                    } else {
                                        echo "-";
                                    }
                                    echo " ห้อง ";
                                    if (isset($rs['room'])) {
                                        echo ($rs['room']);
                                    } else {
                                        echo "-";
                                    } "</li>";
                                    echo "<li>ต. ";
                                    if (isset($rs['tambon_name'])) {
                                        echo ($rs['tambon_name']);
                                    } else {
                                        echo "-";
                                    }
                                    echo " &nbsp;&nbsp;อ. ";
                                    if (isset($rs['ampur_name'])) {
                                        echo ($rs['ampur_name']);
                                    } else {
                                        echo "-";
                                    }
                                    echo " &nbsp;&nbsp;จ. ";
                                    if (isset($rs['changwat_name'])) {
                                        echo ($rs['changwat_name']);
                                    } else {
                                        echo "-";
                                    } "</li>";
                                    echo "<li>รหัสไปรษณีย์ ";
                                    if (isset($rs['zipcode'])) {
                                        echo ($rs['zipcode']);
                                    } else {
                                        echo "-";
                                    } "</li>";
                                    ?>
                                    
                                </ul>
                                &nbsp;&nbsp;ข้อความ <?php echo $rs['msg'] ?>
                            </div>
                        </div>
                        <h4>รายการสั่งซื้อ</h4>
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>รูป</td>
                                    <td>ชื่อสินค้า</td>
                                    <td style="text-align: right;">ราคา</td>
                                    <td style="text-align: center;">จำนวน</td>
                                    <td style="text-align: right;">ราคารวม</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalall = 0;
                                $i = 1;
                                $basket = $order_model->_get_list_order($rs['order_id']);
                                foreach ($basket as $products):
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
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <center>
                            <button class="btn btn-success" onclick="pack_order('<?php echo $rs['order_id']?>')">
                                <img src="<?php echo Yii::app()->baseUrl;?>/images/delivery-box-icon.png"/>
                                บรรจุของเรียบร้อย
                            </button>
                        </center>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script type="text/javascript">
    function pack_order(order_id){
        var url = "<?php echo Yii::app()->createUrl('backend/orders/packs_product')?>";
        var data = {order_id: order_id};

        $.post(url,data,function(success){
            alert("นำส่งของเสร็จแล้วนำเลขการจัดส่งมาแจ้งที่เมนู 'แจ้งการส่งสินค้า' ");
            window.location.reload();
        });
    }
</script>
