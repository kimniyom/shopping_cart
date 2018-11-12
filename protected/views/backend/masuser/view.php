<?php
/* @var $this MasuserController */
/* @var $model Masuser */

$this->breadcrumbs=array(
	'Masusers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Masuser', 'url'=>array('index')),
	array('label'=>'Create Masuser', 'url'=>array('create')),
	array('label'=>'Update Masuser', 'url'=>array('update', 'id'=>$model->pid)),
	array('label'=>'Delete Masuser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Masuser', 'url'=>array('admin')),
);
?>

<h1>View Masuser #<?php echo $model->pid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'oid',
		'pid',
		'name',
		'lname',
		'alias',
		'password',
		'email',
		'tel',
		'sex',
		'birth',
		'status',
		'd_update',
		'create_date',
		'images',
		'username',
	),
)); ?>
