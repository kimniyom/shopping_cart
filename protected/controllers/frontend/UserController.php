<?php

class UserController extends Controller {

    public $layout = "webapp";

    public function actionAddress() {
        $pid = $_POST['pid'];
        $user = new User();
        $data['changwat'] = $user->Get_changwat();
        $data['address'] = $user->Get_address($pid);
        $this->renderPartial("//user/address_user",$data);
    }

    public function actionEdit_address() {
        $pid = $_POST['pid'];
        Yii::app()->session['new_address'] = $_POST['address'];
        $data = array(
            'address' => $_POST['address'],
            'tel' => $_POST['tel']
        );

        Yii::app()->db->createCommand()
                ->update("masuser", $data, "pid = '$pid' ");
    }

}
