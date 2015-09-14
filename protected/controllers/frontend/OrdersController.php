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
        $data['order_id'] = $_GET['order_id'];
        $this->render("//orders/orders_list", $data);
    }

    public function actionOrder_list_load() {
        $order = new Orders();
        $order_id = $_POST['order_id'];
        $data['product'] = $order->_get_list_order($order_id);
        $this->renderPartial("//orders/orders_list_load", $data);
    }

    public function actionShow_order_short_list() {
        $order = new Orders();
        $order_id = $_POST['order_id'];
        $data['product'] = $order->_get_list_order($order_id);

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

    public function actionLoad_box_cart() {
        $order_id = $_POST['order_id'];
        $product_model = new Product();
        $data['result'] = $product_model->_get_cart_sum($order_id);
        $data['count'] = $product_model->_get_cart_count($order_id);

        $this->renderPartial('//orders/box_cart', $data);
    }

    public function actionLoad_inbox_cart() {
        $order_id = $_POST['order_id'];
        $product = new Product();
        $count = $product->_get_cart_count($order_id);
        if (isset($count)) {
            echo $count;
        } else {
            echo "0";
        }
    }

    public function actionPayments() {
        $order_id = $_GET['order_id'];
        $pid = Yii::app()->session['pid'];
        $order = new Orders();
        $user = new User();

        //CheckOut Order 
        $columns = array("active" => '1');
        Yii::app()->db->createCommand()
                ->update("orders", $columns, "order_id = '$order_id' ");

        //News Order
        $max_order_id = $order->Get_status_last_order($pid);
        Yii::app()->session['order_id'] = $max_order_id;

        $payment = new Payment();
        $data['product'] = $order->_get_list_order($order_id);
        $data['address'] = $user->Get_address($pid);
        $data['payment'] = $payment->Get_patment();
        $this->render("//orders/payments", $data);
    }

    //รายการสั่งซื้อรอการชำระเงิน
    public function actionInformpayment() {
        $pid = Yii::app()->session['pid'];
        $order = new Orders();
        $data['order'] = $order->get_order_payable($pid);

        $this->render("//orders/informpayment", $data);
    }

    public function actionConfieminformpayment() {
        $data['order_id'] = $_GET['order_id'];
        $payment = new Payment();
        $data['bank'] = $payment->Get_patment();

        $this->render("//orders/confieminformpayment", $data);
    }

}
