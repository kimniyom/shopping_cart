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

<script type="text/javascript">
    $(document).ready(function () {

        var track_click = 0; //track user click on "load more" button, righ now it is 0 click
        //fetch_pages.php
        var total_pages = <?php echo $count_product_type; ?>;
        var type_id = "<?php echo $type_id; ?>";
        $('#results').load("<?php echo Yii::app()->createUrl('frontend/product/pages') ?>", {'page': track_click, type_id: type_id}, function () {
            track_click++;
        }); //initial data to load

        $(".load_more").click(function (e) { //user clicks on button

            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image

            if (track_click <= total_pages) //make sure user clicks are still less than total pages
            {
                //post page number and load returned data into result element
                $.post('<?php echo Yii::app()->createUrl('frontend/product/pages') ?>', {'page': track_click, type_id: type_id}, function (data) {

                    $(".load_more").show(); //bring back load more button

                    $("#results").append(data); //append data received from server

                    //scroll page to button element
                    $("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);

                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received

                    track_click++; //user click increment on load button

                }).fail(function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError); //alert any HTTP error
                    $(".load_more").show(); //bring back load more button
                    $('.animation_image').hide(); //hide loading image once data is received
                });

                //total_pages - 1
                if (track_click >= total_pages - 1)
                {
                    //reached end of the page yet? disable load button
                    $(".load_more").attr("disabled", "disabled");
                }
            }

        });
    });
</script>

<?php
$this->breadcrumbs = array(
    $type_name,
);
?>
    <br/>  
    <div id="font-rsu-20" style="margin-left:15px; color:red;">
        สินค้าประเภท <?php echo $type_name ?> จำนวนทั้งหมด 
        <?php echo $count_product_type; ?>
    </div>
    <br/>
    <div id="results"></div><br/>
    <div align="center">
        <button class="load_more btn btn-success" id="load_more_button">
            <i class="glyphicon glyphicon-th"></i>สินค้าทั้งหมด
        </button>
        <div class="animation_image" style="display:none;">
            <img src="<?php echo Yii::app()->baseUrl; ?>/images/ajax-loader.gif"> Loading...
        </div>
    </div>
