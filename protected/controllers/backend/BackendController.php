<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BackendController extends Controller{
    public $layout = "template_backend";
    
    public function actionIndex(){
        $this->render("//backend/index");
    }

    public function actionSet_navbar(){
    	$navmenu = $_POST['id'];
    	Yii::app()->session['navmenu'] = $navmenu;
    }
}

