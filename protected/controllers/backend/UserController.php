<?php

class UserController extends Controller {

    public $layout = "template_backend";

    public function actionUserall() {
        $use = new User();
        $data['user'] = $use->findAll();
        
        $this->render("//user/userall",$data);
    }

}
