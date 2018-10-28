<?php
/* @var $this ArticlecategoryController */
/* @var $model Articlecategory */

$this->breadcrumbs=array(
	'Articlecategories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Articlecategory', 'url'=>array('index')),
	array('label'=>'Manage Articlecategory', 'url'=>array('admin')),
);
?>

<h1>Create Articlecategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>