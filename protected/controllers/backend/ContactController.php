<?php


class ContactController extends Controller{
    public $layout = "template_backend";
    
    public function actionIndex(){
    	$rs = Yii::app()->db->createCommand()
			->select('*')
			->from('contact')
			->queryRow();

		$data['socail'] = $rs;
        $this->render("//backend/contact/view",$data);
    }

    public function actionCreate(){
    	$contact = new Contact();

    	$data['social'] = $contact->get_social_media();
		$data['massocial'] = $contact->mas_social();	
    	$this->render("//backend/contact/create",$data);
    }

    public function actionSave(){
		$columns = array("about" => $_POST['about']);
		Yii::app()->db->createCommand()
			->update("about",$columns,'1=1');
	}

}
