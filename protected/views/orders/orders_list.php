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

<?php
$this->breadcrumbs = array(
    "รายการสินค้า",
);
?>

<div class=" panel panel-danger">
    <div class=" panel-heading">
        <i class="fa fa-cart-plus"></i> รายการสินค้าของคุณ
    </div>
    <div class=" panel-body">
        <table width="100%" class="table table-bordered" id="font-th">
            <thead>
                <tr>
                    <td>#</td>
                    <td>รูป</td>
                    <td>ชื่อสินค้า</td>
                    <td style="text-align: center;">ราคา</td>
                    <td style="text-align: center;">จำนวน</td>
                    <td style="text-align: center;">ราคารวม</td>
                    <td style="text-align: center;">ลบ</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalall = 0;
                $i = 1;
                $product_model = new Product();
                foreach ($product as $products):
                    $img = $product_model->get_last_img($products['product_id']);
                    $link = Yii::app()->createUrl('frontend/product/detail_product&product_id=' . $products['product_id']);
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td style=" width: 10%;">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $img; ?>" class="img-resize img-thumbnail" width="100%"/>
                        </td>
                        <td>
                            <a href="<?php echo $link ?>"><?= $products['product_name']; ?></a>
                        </td>
                        <td style=" text-align: right;"><?= number_format($products['product_price']); ?></td>
                        <td style="text-align: center;"><?= $products['product_num']; ?></td>
                        <td style="text-align: right;"><?= number_format(($products['product_price'] * $products['product_num']), 2); ?></td>
                        <td style=" text-align: center;">
                            <div class="btn btn-danger btn-xs" onclick="return del_list_order('<?= $products['id'] ?>', '<?= $products['product_id'] ?>');" id="del" title="ลบสินค้าออกจากตะกร้า">
                                <i class="fa fa-remove"></i>
                            </div>
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
                    <td colspan="5" align="center"><font style="text-decoration:underline;">รวมค่าสินค้า </font></td>
                    <td style=" text-align: right;"><font style="text-decoration:underline;"><?= number_format($totalall, 2) ?></font> </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<div class="panel panel-danger">
    <div class="panel-heading">
        <i class="fa fa-train"></i>
        ข้อมูลที่อยู่จัดส่ง (กรุณาตรวจสอบความถูกต้อง) 
    </div>
    <div class="panel-body">
        <div id="address_user"></div>
    </div>
    <div class="panel-footer">
        <?php
        $user = new User();
        $confirm = $user->Check_address_true(Yii::app()->session['pid']);
        if (!empty($confirm)) {
            ?>
            <center>
                <a href="<?= Yii::app()->createUrl('frontend/orders/payments') ?>">
                    <div class="btn btn-info">ขั้นตอนถัดไป 
                        <i class="glyphicon glyphicon-share-alt"></i>    
                    </div>
                </a>
            </center>
        <?php } else { ?>
            <center>
                <i class="fa fa-warning"></i> ข้อมูลที่อยู่ไม่ครบถ้วนกรุณาตรวจสอบ
            </center>
        <?php } ?>

    </div>
</div>