<?php
/* @var $this ArticlecategoryController */
/* @var $model Articlecategory */

$this->breadcrumbs=array(
	'Articlecategories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Articlecategory', 'url'=>array('index')),
	array('label'=>'Create Articlecategory', 'url'=>array('create')),
	array('label'=>'View Articlecategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Articlecategory', 'url'=>array('admin')),
);
?>

<h1>Update Articlecategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>