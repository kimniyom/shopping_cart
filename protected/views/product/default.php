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

<h4 class="font-supermarket" style="color: #9d1419; font-size: 20px;">จำนวนที่พบ <?php echo $count ?> รายการ</h4><br/>
<div class="row product-grid-equal-height-wrapper product-equal-height-4-columns flex multi-row" id="results"></div>

<div align="center">
    <button class="load_more btn btn-default" id="load_more_button">
        LOAD MORE <i class="fa fa-angle-down"></i>
    </button>
    <div class="animation_image" style="display:none;">
        <img src="<?php echo Yii::app()->baseUrl; ?>/images/ajax-loader.gif"> Loading...
    </div>
</div><br/>

<script type="text/javascript">
    $(document).ready(function () {
        var track_click = 0; //track user click on "load more" button, righ now it is 0 click
        var total_pages = "<?php echo $count ?>";
        var category = $("#categoryfilter").val();
        var brand = $("#brandfilter").val();
        var data = {page: track_click, category: category, brand: brand};
        $('#results').load("<?php echo Yii::app()->createUrl('frontend/product/pagesall') ?>", data, function () {
            track_click = 1;
        });
        //fetch_pages.php
        $(".load_more").click(function (e) { //user clicks on button

            //var track_click = $("#track_click").val()

            var category = $("#categoryfilter").val();
            var brand = $("#brandfilter").val();
            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image

            if (track_click <= total_pages) //make sure user clicks are still less than total pages
            {
                //post page number and load returned data into result element
                $.post('<?php echo Yii::app()->createUrl('frontend/product/pagesall') ?>',
                        {'page': track_click, category: category, brand: brand},
                        function (data) {
                            if (data == 0) {
                                $('.animation_image').hide();
                                $(".load_more").attr("disabled", "disabled");
                                $('.animation_image').hide(); //hide loading image once data is received
                                return false;
                            }
                            $(".load_more").show(); //bring back load more button
                            $("#results").append(data); //append data received from server
                            //scroll page to button element
                            //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                            //hide loading image
                            $('.animation_image').hide(); //hide loading image once data is received

                            track_click++; //user click increment on load button
                            //$("#track_click").val(track_click);
                        }).fail(function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError); //alert any HTTP error
                    $(".load_more").show(); //bring back load more button
                    $('.animation_image').hide(); //hide loading image once data is received
                });

                //total_pages - 1

                if ((track_click * 12) <= (total_pages - 1)) {
                    //$(".load_more").attr("disabled", "disabled");
                }
            } else {
                $('.animation_image').hide(); //show loading image
            }
        });
    });
</script>

