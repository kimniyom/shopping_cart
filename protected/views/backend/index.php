<script>
    $(document).ready(function () {
        $(".breadcrumb").hide();
    });
</script>

<?php $config = new Configweb_model(); ?>

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div id="viewcategory"></div>
    </div>
    <div class="col-md-6 col-lg-6">
        <div id="viewbrand"></div>
    </div>
</div>
<div id="containers"></div>
<center>
    <h1>Welcome To Backend V.1</h1><br/>
    <h2>Administrator</h2><br/>
</center>
<br/><br/>
<div class="row" style="margin:0px; text-align: center;">
    <div class="col-lg-12 col-md-12" style=" text-align: center;">
        <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/logo/<?php echo $config->get_logoweb(); ?>" style="max-height: 300px; margin-bottom: 5px;"/>
        <?php echo $config->get_webname(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        Highcharts.chart('containers', {

            title: {
                text: 'จำนวนการเข้าดูสินค้าในแต่ละเดือน'
            },

            subtitle: {
                text: 'เข้าดูสินค้ามากสุดในเดือน'
            },

            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: 'จำนวนการเข้าดู'
                }
            },
            xAxis: {
                categories: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน(IHIFI H6 1969)', 'ธันวาคม']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    //pointStart: 2010
                }
            },

            series: [{
                    color: 'red',
                    name: ['จำนวน'],
                    data: [<?php echo $val ?>]
                }],

            responsive: {
                rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
            }

        });

        Highcharts.chart('viewcategory', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'การดู<br>สินค้า<br/>แต่ละหมวด',
                align: 'center',
                verticalAlign: 'middle',
                y: 40
            },
            tooltip: {
                //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                pointFormat: '{series.name}: <b>{point.y} ครั้ง</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                    type: 'pie',
                    name: 'จำนวนการดู',
                    innerSize: '50%',
                    data: [<?php echo $viewcategory ?>]
                }]
        });


        Highcharts.chart('viewbrand', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'จำนวนการเข้าดูสินค้า'
            },

            subtitle: {
                text: 'แต่ละ brand'
            },

            credits: {
                enabled: false
            },

            yAxis: {
                title: {
                    text: 'จำนวนการเข้าดู'
                }
            },
            xAxis: {
                categories: [<?php echo $brandcat ?>]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    //pointStart: 2010
                }
            },

            series: [{
                    colorByPoint: true,
                    name: ['จำนวน'],
                    data: [<?php echo $brandval ?>]
                }],

            responsive: {
                rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
            }

        });
    });

</script>