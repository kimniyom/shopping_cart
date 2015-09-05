<style type="text/css">
    #del{ cursor:pointer;}
</style>
<script>
    $(document).ready(function () {
        load_address();
    });

    function load_address() {
        var url = "<?php echo Yii::app()->createUrl('frontend/user/address') ?>";
        var pid = "<?php echo Yii::app()->session['pid'] ?>";
        var data = {pid: pid};
        $.post(url, data, function (result) {
            $("#address_user").html(result);
        });
    }
</script>

<script type="text/javascript">
    function del_list_order(id, product_id) {
        var url = "<?php echo Yii::app()->createUrl('frontend/orders/del_list_order') ?>";
        var data = {id: id, product_id: product_id};

        $.post(url, data,
                function (success) {
                    alert('ลบสินค้าออกจากตะกร้าแล้ว');
                    window.location.reload();
                }
        );// endpost
    }
</script>
<div class="well" style="padding:3px; background:#FFF; margin-top:2px;">
    <table width="100%" class="table" id="order_list_use">
        <thead>
            <tr>
                <td id="td_h">#</td>
                <td id="td_h">ชื่อสินค้า</td>
                <td id="td_h">รายละเอียด</td>
                <td id="td_h">ราคา</td>
                <td id="td_h">จำนวน</td>
                <td id="td_h">ราคารวม</td>
                <td id="td_h"></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalall = 0;
            $i = 1;
            foreach ($product as $products):
                ?>
                <tr class="success" id="tr_b">
                    <td id="td_b"><?= $i++ ?></td>
                    <td id="td_b"><?= $products['product_name']; ?></td>
                    <td id="td_b"><?= $products['product_detail']; ?></td>
                    <td id="td_b"><?= number_format($products['product_price']); ?></td>
                    <td id="td_b"><?= $products['product_num']; ?></td>
                    <td id="td_b"><?= number_format(($products['product_price'] * $products['product_num']), 2); ?></td>
                    <td id="td_b">
                        <img src="<?php echo Yii::app()->baseUrl; ?>/images/error.png" onclick="return del_list_order('<?= $products['id'] ?>', '<?= $products['product_id'] ?>');" id="del" title="ลบสินค้าออกจากตะกร้า"/>
                    </td>
                    <?php
                    $total = (($products['product_price'] * $products['product_num']));
                    $totalall = $totalall + $total;
                    ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" id="td_b2" align="center"><font style="text-decoration:underline;">รวมค่าสินค้า </font></td>
                <td id="td_b2"><font style="text-decoration:underline;"><?= number_format($totalall, 2) ?></font> </td>
                <td id="td_b2"></td>
            </tr>
        </tfoot>
    </table>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-train"></i>
        ข้อมูลที่อยู่จัดส่ง (กรุณาตรวจสอบความถูกต้อง) 
    </div>
    <div class="panel-body">
        <div id="address_user"></div>
    </div>
    <div class="panel-footer">
        <?php if ($totalall != '0') { ?>
            <center>
                <a href="<?= Yii::app()->createUrl('frontend/orders/payments') ?>">
                    <div class="btn btn-info">ขั้นตอนถัดไป 
                        <i class="glyphicon glyphicon-share-alt"></i>    
                    </div>
                </a>
            </center>
        <?php } else { ?>
            <center>
                <div class="btn btn-info disabled">ขั้นตอนถัดไป <i class="glyphicon glyphicon-share-alt"></i>
                </div>
            </center>
        <?php } ?>

    </div>
</div>