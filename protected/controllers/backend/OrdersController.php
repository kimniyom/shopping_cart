<?php

class OrdersController extends Controller {

    public $layout = "template_backend";

    public function actionGet_list_basket() {
        $order_id = $_POST['order_id'];
        $order = new Orders();
        $data['basket'] = $order->_get_list_order($order_id);

        $this->renderPartial('//backend/order/basket', $data);
    }

    //รายการรอการตรวจสอบ
    public function actionVerify() {
        $order = new Backend_orders();

        $data['order'] = $order->get_order_verify();
        $this->render('//backend/order/verify', $data);
    }

}
