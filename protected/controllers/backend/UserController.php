<?php

class UserController extends Controller {

    public $layout = "template_backend";

    public function actionUserall() {
        $use = new User();
        $data['user'] = $use->findAll();

        $this->render("//backend/user/userall", $data);
    }

    public function actionDetail() {
        $use = new User();
        $order = new Orders();
        $pid = $_GET['pid'];
        $data['user'] = $use->Get_detail($pid);
        $data['order'] = $order->get_order_user($pid);
        
        $this->render("//backend/user/detail", $data);
    }

}
