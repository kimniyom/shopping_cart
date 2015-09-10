<script>
    $(function () {
        $('#chart-month').highcharts({
            chart: {
                //type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
            },
            series: [{
                type: 'column',
                colorByPoint: true,
                name: 'ราคา(บาท)',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            },{
            type: 'spline',
            name: 'จำนวน(ชิ้น)',
            data: [40, 71, 90.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 101, 95.6, 54.4],
            marker: {
                lineWidth: 2,
                lineColor: 'red',
                fillColor: 'white'
            }
        }]
        });
    });
</script>

<?php
$this->breadcrumbs = array(
    'สมาชิก' => Yii::app()->createUrl('backend/user/userall'),
    $user['name'] . ' ' . $user['lname']
);
$config = new Configweb_model();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-user"></i> ID <?php echo $user['pid'] ?>
    </div>
    <div class="row" id="font-th">
        <div class="col-md-3 col-lg-3" style="text-align: center;">
            
            <?php 
            if(isset($rs['images'])){
                $img_profile = "profile/".$rs['images'];
            } else {
                if($user['sex'] == 'ชาย'){
                    $img_profile = "images/Big-user-icon.png";
                } else if($user['sex'] == 'ชาย'){
                    $img_profile = "images/Big-user-icon-female.png";
                } else {
                    $img_profile = "images/Big-user.png";
                }
            }
        ?>
            <br/>
            <img src="<?php echo Yii::app()->baseUrl;?>/<?php echo $img_profile;?>"/><br/>
            <?php echo $user['alias']; ?><br/>
            เป็นสมาชิกเมื่อ <br/><?php echo $user['create_date']; ?>
        </div>
        <div class="col-md-9 col-lg-9">
            <div class="well" style=" margin: 5px;">
                ชื่อ - สกุล <p class="label" id="font-18"><?php echo $user['name'] . ' ' . $user['lname'] ?></p><br/>
                นามแฝง <p class="label" id="font-18"><?php if(isset($user['alias'])){ echo  $user['alias']; } else { echo "-";}?></p><br/>
                เพศ <p class="label" id="font-18"><?php if(isset($user['sex'])){ echo  $user['sex']; } else { echo "-";}?></p><br/>
                อายุ <p class="label" id="font-18"><?php if(isset($user['birth'])){ echo  $config->get_age($user['birth']); } else { echo "-";}?></p> ปี<br/><br/>
                ที่อยู่ <br/>
                <ul style=" color: #FFF; padding-top: 5px;">
                    <?php 
                   echo "<li>เลขที่ "; if(isset($user['number'])){ echo ($user['number']); } else { echo "-";} "</li>";
                   echo "<li>อาคาร "; if(isset($user['building'])){ echo  ($user['building']); } else { echo "-";} "</li>";
                   echo "<li>ชั้น "; if(isset($user['class'])){ echo ($user['class']); } else { echo "-";}
                   echo " ห้อง "; if(isset($user['room'])){ echo ($user['room']); } else { echo "-";} "</li>";
                   echo "<li>ต. "; if(isset($user['tambon_name'])){ echo ($user['tambon_name']); } else { echo "-";}
                   echo " &nbsp;&nbsp;อ. "; if(isset($user['ampur_name'])){ echo ($user['ampur_name']); } else { echo "-";}
                   echo " &nbsp;&nbsp;จ. "; if(isset($user['changwat_name'])){ echo ($user['changwat_name']); } else { echo "-";} "</li>";
                   echo "<li>รหัสไปรษณีย์ "; if(isset($user['zipcode'])){ echo ($user['zipcode']); } else { echo "-";} "</li>";
                    ?>
                </ul>
            </div>
        </div>
      
    </div>
    
    <div class="panel panel-default" style=" margin: 5px;">
        <div class="panel-heading">
            <i class="fa fa-list-alt"></i> ประวัติการซื้อสินค้า
        </div>
        <?php if(!empty($order)){ ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รหัสการสั่ง</th>
                    <th style="text-align: center;">วันที่</th>
                    <th style="text-align: center;">จำนวน</th>
                    <th style="text-align: right;">ราคารวม</th>
                    <th style="text-align: center;">ดูสินค้า</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 0; 
                $sumprice = 0;
                foreach($order as $orders): 
                    $i++;
                    $sumprice = $sumprice + $orders['price_total'];
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $orders['order_id']; ?></td>
                    <td style="text-align: center;"><?php echo $orders['order_date']; ?></td>
                    <td style="text-align: center;"><?php echo $orders['product_total']; ?></td>
                    <td style="text-align: right;"><?php echo number_format($orders['price_total'],2); ?></td>
                    <td style=" text-align: center;">
                        <div class="btn btn-info btn-xs"><i class="fa fa-eye"></i></div>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="4" style="text-align:center;"><label>รวม</label></td>
                    <td style="text-align:right;"><label><?php echo number_format($sumprice,2); ?></label></td>
                    <td></td>
                </tr>
            </tfooter>
        </table>
        <?php } else { ?>
        <center>ยังไม่มีการสั่งซื้อ</center>
        <?php } ?>
    </div>
    
    <div class="panel panel-default" style=" margin: 5px;">
        <div class="panel-heading"><i class="fa fa-bars"></i> การซื้อในแต่ละเดือนที่ผ่านมา</div>
        <div id="chart-month"></div>
    </div>
    
</div>