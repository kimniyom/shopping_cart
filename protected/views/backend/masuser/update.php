<?php
/* @var $this MasuserController */
/* @var $model Masuser */

$this->breadcrumbs=array(
	'Masusers'=>array('index'),
	$model->name=>array('view','id'=>$model->pid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Masuser', 'url'=>array('index')),
	array('label'=>'Create Masuser', 'url'=>array('create')),
	array('label'=>'View Masuser', 'url'=>array('view', 'id'=>$model->pid)),
	array('label'=>'Manage Masuser', 'url'=>array('admin')),
);
?>

<h1>Update Masuser <?php echo $model->pid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>