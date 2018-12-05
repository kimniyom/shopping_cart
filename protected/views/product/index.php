<style>
    .styled-input-single {
        position: relative;
        padding: 5px 0 0px 40px;
        text-align: left;
    }
    .styled-input-single label {
        cursor: pointer;
        color: #9d1419;
    }
    .styled-input-single label:before, .styled-input-single label:after {
        content: '';
        position: absolute;
        top: 50%;
        border-radius: 50%;
    }
    .styled-input-single label:before {
        left: 0;
        width: 30px;
        height: 30px;
        margin: -15px 0 0;
        background: #f7f7f7;
        box-shadow: 0 0 1px grey;
    }
    .styled-input-single label:after {
        left: 5px;
        width: 20px;
        height: 20px;
        margin: -10px 0 0;
        opacity: 0;
        background: #37b2b2;
        -webkit-transform: translate3d(-40px, 0, 0) scale(0.5);
        transform: translate3d(-40px, 0, 0) scale(0.5);
        transition: opacity 0.25s ease-in-out, -webkit-transform 0.25s ease-in-out;
        transition: opacity 0.25s ease-in-out, transform 0.25s ease-in-out;
        transition: opacity 0.25s ease-in-out, transform 0.25s ease-in-out, -webkit-transform 0.25s ease-in-out;
    }
    .styled-input-single input[type="radio"],
    .styled-input-single input[type="checkbox"] {
        position: absolute;
        top: 0;
        left: -9999px;
        visibility: hidden;
    }
    .styled-input-single input[type="radio"]:checked + label:after,
    .styled-input-single input[type="checkbox"]:checked + label:after {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        opacity: 1;
    }

    .styled-input--square label:before, .styled-input--square label:after {
        border-radius: 0;
    }

    .styled-input--rounded label:before {
        border-radius: 10px;
    }
    .styled-input--rounded label:after {
        border-radius: 6px;
    }

    .styled-input--diamond .styled-input-single {
        padding-left: 45px;
    }
    .styled-input--diamond label:before, .styled-input--diamond label:after {
        border-radius: 0;
    }
    .styled-input--diamond label:before {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .styled-input--diamond input[type="radio"]:checked + label:after,
    .styled-input--diamond input[type="checkbox"]:checked + label:after {
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        opacity: 1;
    }


</style>
<script type="text/javascript">
    $(document).ready(function () {
        var width = $(window).width();
        if (width >= 768) {
            var styles = {
                "white-space": "nowrap",
                "width": "220px",
                "overflow": "hidden",
                "text - overflow": "ellipsis"
            };
            $(".caption").css(styles);
            //$(".box_product").css("height", "350px");
        }
    });
</script>

<?php
$this->breadcrumbs = array(
    "SHOP",
);
?>

<div class="container" style=" padding: 30px;">
    <div class="row">
        <div class="col-lg-3 col-md-3">



            <h4 class="font-supermarket" style="color: #9d1419; font-size: 20px;">Category</h4><br/>
            <ul class="list-group" id="category">
                <?php foreach ($categorys as $category): ?>
                    <li class="list-group-item">
                        <div class="styled-input-single">
                            <input type="checkbox" id="checkbox-example-<?php echo $category['id'] ?>" name="options[]" value="<?php echo $category['id'] ?>" checked="checked" style=" margin-top: 10px;" onclick="Getpage()"/>
                            <label for="checkbox-example-<?php echo $category['id'] ?>"><?php echo $category['categoryname'] ?></label>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <input type="hidden" id="categoryfilter" />
            <hr/>
            <h4 class="font-supermarket" style="color: #9d1419; font-size: 20px;">Brands</h4><br/>
            <ul class="list-group" id="brands">
                <?php foreach ($brands as $brand): ?>
                    <li class="list-group-item">
                        <div class="styled-input-single">
                            <input type="checkbox" id="checkbox-examples-<?php echo $brand['id'] ?>" name="brands[]" value="<?php echo $brand['id'] ?>" checked="checked" style=" margin-top: 10px;" onclick="Getpage()"/>
                            <label for="checkbox-examples-<?php echo $brand['id'] ?>"><?php echo $brand['brandname'] ?></label>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <input type="hidden" id="brandfilter" />

        </div>
        <div class="col-lg-9 col-md-9">
            <!--
            <h4 class="font-supermarket" style="color: #9d1419; font-size: 20px;">จำนวนที่พบ <?php //echo $count              ?> รายการ</h4><br/>
            <div class="row product-grid-equal-height-wrapper product-equal-height-4-columns flex multi-row" id="results"></div>
            -->

            <div id="defaultpage"></div>
        </div>
    </div>
</div>



<script type="text/javascript">
    category();
    brands();
    Getpage();
    function category() {
        var arr = $.map($('#category input:checkbox:checked'), function (e, i) {
            return +e.value;
        });
        $('#categoryfilter').val(arr.join(','));
    }

    $('#category').delegate('input:checkbox', 'click', category);

    function brands() {
        var arr = $.map($('#brands input:checkbox:checked'), function (e, i) {
            return +e.value;
        });
        $('#brandfilter').val(arr.join(','));
    }

    $('#brands').delegate('input:checkbox', 'click', brands);

    function Getpage() {
        this.category();
        this.brands();
        var url = "<?php echo Yii::app()->createUrl('frontend/product/defaultpage') ?>";
        var category = $("#categoryfilter").val();
        var brand = $("#brandfilter").val();
        var data = {category: category, brand: brand};
        $.post(url, data, function (datas) {
            $("#defaultpage").html(datas);
        });
    }
</script>

