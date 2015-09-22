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

    //ดึงข้อมูลสินค้าในแต่ละการสั่งซื้อมาแสดง
    public function actionGet_detail_order() {
        $order_id = $_POST['order_id'];
        $order = new Orders();
        $data['basket']->_get_list_order($order_id);
        $data['order'] = $order->get_detail_order($order_id);

        $this->render('//backend/order/detail', $data);
    }

    //Confirem Order 
    public function actionConfirm_order() {
        $order_id = $_POST['order_id'];
        $columns = array(
            "active" => "3"
        );

        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");
    }

}
