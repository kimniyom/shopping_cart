<?php

class OrdersController extends Controller {

    public $layout = "webapp";

    public function actionAdd_cart() {
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $product_num = $_POST['num'];
        $product_price = $_POST['price'];
        $product_price_sum = $_POST['price_total'];
        $order = new Orders();
        $duplicate = $order->duplicate_product($order_id, $product_id); //เช็คว่ามีสินค้าตัวเดิมไหม
        if ($duplicate === 1) {
            //ถ้ามีตัวเดิมให้เพิ่ม เข้าไป
            $rs = $order->get_duplicate_product($order_id, $product_id);
            $id = $rs['id'];
            $product_num_new = ($rs['product_num'] + $product_num);
            $product_price_sum_new = ($rs['product_price_sum'] + $product_price_sum);
            $data = array(
                'product_num' => $product_num_new,
                'product_price' => $product_price,
                'product_price_sum' => $product_price_sum_new,
                'd_update' => date("Y-m-d H:i:s"),
            );
            Yii::app()->db->createCommand()
                    ->update("basket", $data, "id = '$id' ");
        } else {
            $data = array(
                'order_id' => $order_id,
                'product_num' => $product_num,
                'product_price' => $product_price,
                'product_price_sum' => $product_price_sum,
                'product_id' => $product_id,
                'd_update' => date("Y-m-d H:i:s"),
            );
            Yii::app()->db->createCommand()
                    ->insert("basket", $data);
        }
    }

    public function actionOrder_list() {
        $order_id = $_GET['order_id'];
        $order = new Orders();
        $data['product'] = $order->_get_list_order($order_id);

        $this->render("//orders/orders_list", $data);
    }

    public function actionShow_order_shout_list() {
        $order = new Orders();
        $data['product'] = $order->_get_list_order();

        $this->renderPartial("//orders/orders_shout_list", $data);
    }

    public function actionEdit_num_order() {
        $id = $_POST['id'];
        $num = $_POST['new_num'];
        $product_price_total = $_POST['price_total'];
        $data = array(
            "product_num" => $num,
            "product_price_sum" => $product_price_total
        );
        Yii::app()->db->createCommand()
                ->update("basket", $data, "id = '$id' ");
    }

    public function actionDel_list_order() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("basket", "id = '$id' ");
    }

    public function actionPayments() {
        $order_id = $_GET['order_id'];
        if ($order_id != "") {
            $data['order_id'] = $order_id;
        } else {
            $data['order_id'] = "";
        }

        $this->render("//orders/payments", $data);
    }

}
