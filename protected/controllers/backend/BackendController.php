<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BackendController extends Controller{
    public $layout = "template_backend";
    
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
    }
    
    public function accessRules()
	{
		return array(
            
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
            ),
            
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
    }
    
    public function actionIndex(){
        $this->render("//backend/index");
    }

    public function actionSet_navbar(){
    	$navmenu = $_POST['id'];
    	Yii::app()->session['navmenu'] = $navmenu;
    }
}

