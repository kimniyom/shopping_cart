<script type="text/javascript">
    $(document).ready(function () {
        $("#user").dataTable();
    });
</script>

<?php
$this->breadcrumbs = array(
    'สมาชิก'
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        สมาชิก
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="user" style=" width: 100%; margin: 0px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รหัส</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ชื่อใช้แสดง</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th style=" text-align: center;">สถานะ</th>
                    <th style="text-align: center;">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($user as $rs): $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rs['pid']; ?></td>
                        <td><?php echo $rs['name'] . ' ' . $rs['lname']; ?></td>
                        <td><?php echo $rs['alias']; ?></td>
                        <td><?php echo $rs['tel']; ?></td>
                        <td style="text-align: center;">
                            
                        </td>
                        <td style="text-align: center;">
                            <!-- Small button group -->
                            <div class="btn-group">
                                <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ตัวเลือก <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href=""><i class="fa fa-list"></i> ดูแบบระเอียด</a></li>
                                    <li><a href=""><i class="fa fa-pencil"></i> แก้ไข</a></li>
                                    <li><a href=""><i class="fa fa-trash"></i> ลบ</a></li>
                                    <li><a href=""><i class="fa fa-ban"></i> แบน</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

