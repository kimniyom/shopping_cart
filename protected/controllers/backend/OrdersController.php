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
        $order = new Backend_orders();
        $data['basket'] = $order->_get_list_order($order_id);
        $data['order'] = $order->get_detail_order($order_id);

        $this->renderPartial('//backend/order/detail', $data);
    }

    public function actionPendingshipment(){
        $order = new Backend_orders();
        $product_model = new Product();
        $data['product_model'] = $product_model;
        $data['order_model'] = $order;
        $data['order'] = $order->get_pending_shipment();
        $this->render('//backend/order/pending_shipment', $data);
    }

    //Confirem Order //ตรวจสอบยอดเงินสำเร็จ
    public function actionConfirm_order() {
        $order_id = $_POST['order_id'];
        $columns = array(
            "active" => "3"
        );

        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");
    }

    //บรรจุของพร้อมนำไปส่งให้ลูกค้า
    public function actionPacks_product(){
        $order_id = $_POST['order_id'];
        $columns = array(
            "active" => "4"
        );

        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");
    }

    //แจ้งหมายเลขพัสดุ
    public function actionNotification(){
        $order = new Backend_orders();
        $data['order'] = $order->list_order_inform();

        $this->render('//backend/order/notification',$data);
    }

    public function actionView_order(){
        $order_id = $_POST['order_id'];
        $order = new Backend_orders();
        $data['basket'] = $order->_get_list_order($order_id);
        $data['order'] = $order->get_detail_order($order_id);

        $this->renderPartial('//backend/order/view_order', $data);
    }

    //แจ้งรหัสพัสดุ
    public function actionOrder_success(){
        $order_id = $_POST['order_id'];
        $columns = array(
            "postcode" => $_POST['post'],
            "active" => "5",
            "date_send" => date("Y-m-d")
        );

        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");
    }
    
}
