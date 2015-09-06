<script type="text/javascript">
    $(document).ready(function () {
        $("#p_product").dataTable({
            //"sPaginationType": "full_numbers", // แสดงตัวแบ่งหน้า
            "bLengthChange": false, // แสดงจำนวน record ที่จะแสดงในตาราง
            "iDisplayLength": 20, // กำหนดค่า default ของจำนวน record 
            "bFilter": true // แสดง search box
            //"sScrollY": "400px", // กำหนดความสูงของ ตาราง

        });
    });
</script>

<?php
$this->breadcrumbs = array(
    $type_name,
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="badge" style=" padding-top: 5px;">
            <?php echo $type_name ?> จำนวนทั้งหมด 
            <?php echo $count_product_type; ?>
        </span>
        <div class="pull-right">
            <a href="<?php echo Yii::app()->createUrl('backend/product/create&type_id=' . $type_id) ?>">
                <div class="btn btn-success btn-xs"><i class="fa fa-plus"></i> เพิ่มสินค้า</div></a>
        </div>
    </div>
    <div class="panel-body" style=" padding: 5px;">
        <table class="table table-striped table-bordered" id="p_product">
            <thead>
                <tr>
                    <th>รูป</th>
                    <th>รหัส</th>
                    <th>ชื่อสินค้า</th>
                    <th style="text-align: center;">ราคา</th>
                    <th style="text-align: center;">จำนวน</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $product_model = new Product();
                foreach ($product as $last):
                    $img = $product_model->get_last_img($last['product_id']);
                    $link = Yii::app()->createUrl('backend/product/detail_product&product_id=' . $last['product_id']);
                    ?>
                    <tr>
                        <td style=" width: 10%;">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $img; ?>" class="img-resize img-thumbnail" width="100%"/>
                        </td>
                        <td><?php echo $last['product_id']; ?></td>
                        <td><?php echo $last['product_name']; ?></td>
                        <td style=" text-align: center; font-weight: bold;">
                            <?php echo number_format($last['product_price'], 2); ?>
                        </td>
                        <td style=" text-align: center; font-weight: bold;"><?php echo $last['product_num']; ?></td>
                        <td style=" text-align: center;">
                            <div class="dropdown">
                                <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    จัดการ
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="<?php echo $link; ?>"><i class="fa fa-eye"></i> รายละเอียด</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('backend/product/update', array('type_id' => $last['type_id'], 'product_id' => $last['product_id'])); ?>"><i class="fa fa-edit"></i> แก้ไข</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('backend/product/images', array('product_id' => $last['product_id'])); ?>"><i class="fa fa-picture-o"></i> รูปภาพ</a></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> ลบ</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>