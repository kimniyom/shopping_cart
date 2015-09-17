
<table width="100%" class="table table-bordered" id="font-20">
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
            $link = Yii::app()->createUrl('frontend/product/detail_product',array('product_id' => $products['product_id']));
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
                    <div class="btn btn-danger btn-xs" onclick="del_list_order('<?= $products['id'] ?>');" id="del" title="ลบสินค้าออกจากตะกร้า">
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
        <tr style="color:#ff3300;">
            <td colspan="5" align="center"><font style="text-decoration:underline;">รวมค่าสินค้า </font></td>
            <td style=" text-align: right;"><font style="text-decoration:underline;"><?= number_format($totalall, 2) ?></font> </td>
            <td></td>
        </tr>
    </tfoot>
</table>
