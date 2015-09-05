<?php foreach ($images as $rs): 
    $id = $rs['id'];
    $images = $rs['images'];
    ?>
    <div class="col-xs-6 col-md-6 col-lg-3 col-sm-6">
        <div class="thumbnail" style=" text-align: center;" id="">
            <img src="<?php echo Yii::app()->baseUrl; ?>/uploads/<?php echo $rs['images']; ?>" class="img-responsive" style="min-height:150px; max-height: 150px;"/>
            <div class="caption">
                <a href="javascript:delete_images('<?php echo $id?>','<?php echo $images?>')">
                    <div class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</div>
                </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>