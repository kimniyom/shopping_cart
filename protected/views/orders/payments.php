<div class="well" id="font-20">
    ระบบจะทำการล๊อคสินค้าไว้ให้ท่านเป็นเวลา 3 วัน<br/>
    หากท่านไม่ชำระเงินภายในระยะเวลาที่กำหนดระบบจะทำการลบรายการสั่งซื้อของท่าน<br/><br/>
    ท่านสามารถแจ้งการชำระเงินได้ที่เมนู "แจ้งชำระเงิน" หรือคลิกที่นี้
    <div class="btn btn-success btn-sm">แจ้งการชำระเงินที่นี้</div>
</div>
<div class="well" style=" background: #FFF;" id="font-18">
    <label>
        คุณ <?php echo $address['name'] . ' ' . $address['lname'] ?>
    </label>
    <br/><br/>
    <label>เลขที่</label> <?php echo $address['number'] ?>
    <label>อาคาร</label> <?php echo $address['building'] ?>
    <label>ชั้น</label> <?php echo $address['class'] ?>
    <label>ห้อง</label> <?php echo $address['room'] ?><br/>
    <label>ตำบล</label>  <?php echo $address['tambon_name'] ?><br/>
    <label>อำเภอ</label>  <?php echo $address['ampur_name'] ?><br/>
    <label>จังหวัด</label>  <?php echo $address['changwat_name'] ?><br/>
    <label>รหัสไปรษณีย์</label>  <?php echo $address['zipcode'] ?>
    <br/><br/>
    <label>Tel </label> <?php echo $address['tel'] ?><br/>
    <label>Email </label> <?php echo $address['email'] ?>
</div>

<table width="100%" class="table table-bordered" id="font-18">
    <thead>
        <tr>
            <td>#</td>
            <td>รูป</td>
            <td>ชื่อสินค้า</td>
            <td style="text-align: center;">ราคา</td>
            <td style="text-align: center;">จำนวน</td>
            <td style="text-align: center;">ราคารวม</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalall = 0;
        $i = 1;
        $product_model = new Product();
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
            <td colspan="5" align="center"><font style="text-decoration:underline;">รวมค่าสินค้า </font></td>
            <td style=" text-align: right;"><font style="text-decoration:underline;"><?= number_format($totalall, 2) ?></font> </td>
        </tr>
    </tfoot>
</table>


