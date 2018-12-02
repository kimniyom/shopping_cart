
<script type="text/javascript">
    $(document).ready(function () {
        var style = {"height": "auto"};
        $("#box-article img").addClass("img-responsive");
        $("#box-article img").css(style);
    });
</script>
<?php
$config = new Configweb_model();
$articleModel = new Article();
$this->breadcrumbs = array(
    "บทความ / event" => array('frontend/article'),
    $result['title'],
);
?>

<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5&appId=266256337158296";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>

<br/>

<section class="boxed-sm">
    <div class="container">
        <div class="row main">
            <div class="row">
                <div class="col-md-9">
                    <article class="blog-detail">
                        <h3 class="title-blog-detail font-THK" style="font-size: 34px;"><?php echo $result['title'] ?></h3>
                        <p class="meta">
                            <span class="time">
                                <i class="fa fa-calendar"></i> <?php echo $result['create_date'] ?>
                                <i class="fa fa-user"></i> <?php echo $result['name'] . ' ' . $result['lname'] ?>
                            </span>
                            <span class="comment"><?php echo $result['countread'] ?></span>
                        </p>
                        <div class="content">
                            <img class="feature-image" src="<?= Yii::app()->baseUrl; ?>/uploads/article/870-<?php echo $result['images'] ?>" alt="feature-image">
                            <?php echo $result['detail']; ?><br/>
                            <span class="label label-danger" style=" font-size: 14px;"><i class="fa fa-tag"></i> <?php echo $result['category_name'] ?></span><br/><br/>
                        </div>
                    </article>

                    <br/>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="widget-social-color">
                                <ul>
                                    <li>
                                        <div style=" float: left; margin-top: 1px; margin-right: 10px;">Share : <i class="fa fa-facebook"></i></div><div class="fb-share-button" data-layout="button_count"></div><br/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br/>

                    <?php if (count($gallery) > 0) { ?>
                    <h4 class=" font-supermarket" style=" font-size: 24px;">Gallery</h4>
                        <br/>
                        <div class="row">
                            <?php foreach ($gallery as $gallerys): ?>
                                <div class="col-md-3 col-lg-2 col-sm-3 col-xs-3">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/uploads/article/gallery/200-<?php echo $gallerys['images'] ?>" class="img img-responsive"/>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <hr/>
                    <?php } ?>
                    <div class="row" style=" margin-bottom: 20px;">
                        <div class="col-md-12">
                            <div class="post-control">
                                <?php if ($pre['id']) { ?>
                                    <a class="prev-post" href="<?php echo Yii::app()->createUrl('frontend/article/views', array('id' => $pre['id'])) ?>">
                                        <i class="fa fa-angle-left"></i>PREVIOUSE POST
                                        <h4 class="title-next-post"><?php echo $pre['title'] ?></h4>
                                    </a>
                                <?php } else { ?>
                                    <a class="prev-post"><i class="fa fa-angle-left"></i>PREVIOUSE POST</a>
                                <?php } ?>
                                <?php if ($next['id']) { ?>
                                    <a class="next-post" href="<?php echo Yii::app()->createUrl('frontend/article/views', array('id' => $next['id'])) ?>">NEXT POST
                                        <i class="fa fa-angle-right"></i>
                                        <h4 class="title-next-post"><?php echo $next['title'] ?></h4>
                                    </a>
                                <?php } else { ?>
                                    <a class="next-post">NEXT POST<i class="fa fa-angle-right"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if (count($near) > 0) { ?>
                        <hr/>
                        <article class="blog-detail">
                            <h3 style=" text-align: center;">ที่เกี่ยวข้อง</h3><br/>
                        </article>
                        <br/>
                        <div class="row">
                            <?php foreach ($near as $nears): ?>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <img class="img img-responsive" src="<?= Yii::app()->baseUrl; ?>/uploads/article/600-<?php echo $nears['images'] ?>" alt="feature-image"><br/>
                                    <a href="<?php echo Yii::app()->createUrl('frontend/article/views', array('id' => $nears['id'])) ?>">
                                        <?php echo $config->thaidate(substr($nears['create_date'], 0, 10)) ?><br/>
                                        <?php echo $nears['title'] ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <!--
                        <div class="widget widget-search">
                            <form class="organic-form form-inline btn-add-on border no-radius">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Search..." type="text">
                                    <button class="btn btn-brand" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        -->
                        <div class="widget widget-blog-post">
                            <h4 class="title text-center font-supermarket" style=" font-size: 24px;">ล่าสุด</h4>
                            <ul class="list-blog">
                                <?php foreach ($lastblog as $lastblogs):
                                    ?>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('frontend/article/views', array('id' => $lastblogs['id'])) ?>">
                                            <div class="img-wrapper">
                                                <img class="img img-responsive" src="<?= Yii::app()->baseUrl; ?>/uploads/article/80-<?php echo $lastblogs['images'] ?>" alt="feature-image">
                                            </div>
                                            <div class="desc" style=" padding-top: 0px;">
                                                <p class="meta-time" style=" font-size: 12px"><?php echo $config->thaidate(substr($lastblogs['create_date'], 0, 10)) ?></p>
                                                <h5 class="title font-THK" style=" font-size: 22px;"><?php echo $lastblogs['title'] ?></h5>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="widget widget-categories">
                            <h4 class="title-widget text-center font-supermarket">Categories</h4>
                            <ul>
                                <?php foreach ($category as $categorys): ?>
                                    <li style=" margin-bottom: 0px; padding: 0px;">
                                        <a href="<?php echo Yii::app()->createUrl('frontend/article/index', array('category' => $categorys['id'])) ?>" class=" font-THK" style=" font-size: 22px;"><?php echo $categorys['category'] ?>
                                            <span class="badge pull-right" style=" color: #000; font-size: 18px; margin-top: 5px;"><?php echo $articleModel->CountArticleByCategory($categorys['id']) ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!--
                        <div class="widget widget-categories">
                            <h4 class="title-widget text-center">Archives</h4>
                            <ul>
                                <li>
                                    <a href="shop.html">March 2017
                                        <span>(5)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">Feberuary 2017
                                        <span>(7)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">January 2017
                                        <span>(9)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">December 2016
                                        <span>(10)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">November 2016
                                        <span>(6)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        -->
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<script>
    $(document).ready(function () {
        var screen = $(".widget-blog-post").width();
        var w = (screen - 100);
        $(".list-blog .desc").css({'width': w, 'height': '90px', 'overflow': 'hidden'});
    });

    function delete_article(id) {
        var url = "<?php echo Yii::app()->createUrl('backend/article/delete') ?>";
        var r = confirm("คุณแน่ใจหรือไม่ ...?");
        var data = {id: id};
        if (r == true) {
            $.post(url, data, function (success) {
                window.location = "<?php echo Yii::app()->createUrl('backend/article') ?>";
            });
        }
    }
</script>