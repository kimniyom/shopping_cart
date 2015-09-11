<?php

class OrdersController extends Controller {

    public function actionGet_list_basket() {
        $order_id = $_POST['order_id'];
        $order = new Orders();
        $data['basket'] = $order->_get_list_order($order_id);

        $this->renderPartial('//backend/order/basket', $data);
    }

}
