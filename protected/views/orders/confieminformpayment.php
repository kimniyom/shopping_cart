<script type="text/javascript">
    $(function () {
        $('#file_upload').uploadify({
            'swf ': '<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.swf',
            'uploader': '<?php echo Yii::app()->createUrl('frontend/orders/uploadslip&order_id=' . $order_id) ?>',
            'auto': false,
            'fileSizeLimit': '1024KB',
            'fileTypeExts': ' *.jpg; *.png',
            'uploadLimit': 1,
            'onSelect': function (file) {
                $("#slip").val(file.name);
                //alert('The file ' + file.name + ' was added to the queue.');
            },
            'onCancel': function (file) {
                $("#slip").val("");
            }
        });
    });

    function set_bank(bank_id) {
        $("#bank_id").val(bank_id);
    }

    function check_form() {
        var bank_id = $("#bank_id").val();
        var date_informpayment = $("#date_informpayment").val();
        var hour = $("#hour").val();
        var minute = $("#minute").val();
        var money = $("#money").val();
        var slip = $("#slip").val();
        if (bank_id == '' || date_informpayment == '' || hour == '' || minute == '' || money == '' || slip == '') {
            alert("กรอกข้อมูลไม่ครบ");
            return false();
        }
    }
</script>

<table class="table table-striped">
    <tr>
        <td style=" width: 30%;">บัญชีที่โอน</td>
        <td>
            <input type="hidden" id="bank_id" name="bank_id"/>
            <table class="table table-bordered" id="font-18" style=" background: none; margin-bottom: 0px;">
                <tbody>
                    <?php
                    foreach ($bank as $banks):
                        ?>
                        <tr>
                            <td style="text-align: center;">
                                <div class="radio radio-warning" style=" margin: 0px;">
                                    <input id="bank" name="bank" class="styled" type="radio"  onclick="set_bank('<?php echo $banks['id'] ?>');">
                                    <label for="radio"></label>
                                </div>  
                            </td>
                            <td style=" width: 8%;">
                                <img src="<?php echo Yii::app()->baseUrl; ?>/images/<?php echo $banks['bank_img']; ?>" class="img-resize img-thumbnail" width="100%"/>
                            </td>
                            <td><?= $banks['bank_name']; ?></td>
                            <td style="text-align: center;"><?= $banks['bookbank_number']; ?></td>
                            <td>สาขา <?= $banks['bank_branch']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>วันที่ชำระเงิน</td>
        <td>
            <div class="col-lg-4" style=" margin-left: 0px; padding-left: 0px;">
                <select id="day" name="day" class="form-control input-sm">
                    <?php
                    $daynow = date("d");
                    for ($i = 1; $i <= 31; $i++):
                        if (strlen($i) < 2) {
                            $day = "0" . $i;
                        } else {
                            $day = $i;
                        }
                        ?>
                        <option value="<?php echo $day; ?>" <?php
                        if ((int) $day == (int) $daynow) {
                            echo "selected";
                        }
                        ?>>
                                    <?php echo $day; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-lg-4">
                <select id="month" name="month" class="form-control input-sm">
                    <?php
                    $web = new Configweb_model();
                    $monthname = $web->MonthFullArray();
                    $monthnow = date("m");
                    for ($i = 1; $i <= 12; $i++):
                        if (strlen($i) < 2) {
                            $month = "0" . $i;
                        } else {
                            $month = $i;
                        }
                        ?>
                        <option value="<?php echo $month; ?>" <?php
                        if ((int) $month == (int) $monthnow) {
                            echo "selected";
                        }
                        ?>>
                                    <?php echo $monthname[$i]; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-lg-4">
                <select id="month" name="month" class="form-control input-sm">
                    <?php
                    $Yearnow = date("Y");
                    for ($i = $Yearnow; $i >= $Yearnow - 0; $i--):
                        ?>
                        <option value="<?php echo $i; ?>" <?php
                        if ($i == $Yearnow) {
                            echo "selected";
                        }
                        ?>>
                                    <?php echo ($i + 543); ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </td>
    </tr>
    <tr>
        <td>เวลา(โดยประมาณ)</td>
        <td>

            <div class="col-lg-4" style=" margin-left: 0px; padding-left: 0px;">
                <select id="hour" name="hour" class="form-control input-sm">
                    <option value="">== ชั่วโมง ==</option>
                    <?php
                    $Hnow = date("H");
                    for ($i = 0; $i <= 24; $i++):
                        if (strlen($i) < 2) {
                            $H = "0" . $i;
                        } else {
                            $H = $i;
                        }
                        ?>
                        <option value="<?php echo $H; ?>">
                            <?php echo $H; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-lg-4">
                <select id="minute" name="minute" class="form-control input-sm">
                    <option value="">== นาที ==</option>
                    <?php
                    $Minitnow = date("i");
                    for ($i = 0; $i <= 59; $i++):
                        if (strlen($i) < 2) {
                            $Minit = "0" . $i;
                        } else {
                            $Minit = $i;
                        }
                        ?>
                        <option value="<?php echo $Minit; ?>">
                            <?php echo $Minit; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-lg-4"></div>

        </td>
    </tr>
    <tr>
        <td>จำนวนเงิน</td>
        <td>
            <div class="col-lg-6" style=" margin-left: 0px; padding-left: 0px;">
                <input type="text" id="money" name="money" class="form-control input-sm" onkeypress="return chkNumber();"/>
            </div>
        </td>
    </tr>
    <tr>
        <td>หลักฐานการโอน</td>
        <td>
            <input type="hidden" id="slip" name="slip" />
            <div class="col-lg-6" style=" margin-left: 0px; padding-left: 0px;">
                <input type="file" name="file_upload" id="file_upload" />
                (ไฟล์นามสกุล jpg,png ไม่เกิน 1MB)
            </div>
        </td>
    </tr>
</table>

<div class="btn btn-success" onclick="check_form()">SAVE</div>


