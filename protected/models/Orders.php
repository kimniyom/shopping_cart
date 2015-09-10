<?php

class Orders {

    function Get_last_order($user_id = null) {
        $sql = "SELECT MAX(id) AS id FROM orders WHERE pid = '$user_id' ";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        return $rs['id'];
    }

    function Get_status_last_order($user_id = null) {
        $id = $this->Get_last_order($user_id);
        $sql = "SELECT order_id,active FROM orders WHERE id = '$id' ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        if ($result['active'] == '1' || empty($result)) {
            $order_id = $this->autoId("orders", 'order_id', '7');
            $columns = array(
                "order_id" => $order_id,
                "pid" => $user_id,
                "order_date" => date("Y-m-d")
            );
            Yii::app()->db->createCommand()
                    ->insert("orders", $columns);
        } else {
            $order_id = $result['order_id'];
        }

        return $order_id;
    }

    function duplicate_product($order_id = null, $product_id = null) {
        $query = "SELECT COUNT(*) AS TOTAL FROM basket WHERE order_id = '$order_id' AND product_id = '$product_id' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();

        if ($rs['TOTAL'] > 0) {
            $product = 1;
        } else {
            $product = 0;
        }

        return $product;
    }

    function get_duplicate_product($order_id = null, $product_id = null) {
        $query = "SELECT id,product_num,product_price,product_price_sum
                  FROM basket 
                  WHERE order_id = '$order_id' AND product_id = '$product_id' ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }

    function _get_list_order($order_id = null) {
        $sql = "SELECT p.product_id,l.id,p.product_price,l.product_num,p.product_name,p.product_detail
                FROM basket l INNER JOIN product p ON l.product_id = p.product_id
                WHERE order_id = '$order_id' ";

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    function get_order_user($pid = null) {
        $query = "SELECT o.order_id,SUM(b.product_num) AS product_total,SUM(b.product_price_sum) AS price_total,o.order_date
                        FROM orders o INNER JOIN basket b ON o.order_id = b.order_id
                        WHERE pid = '$pid'
                        GROUP BY o.order_id";
        
        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    function autoId($table, $value, $number) {
        $rs = Yii::app()->db->createCommand("Select Max($value)+1 as MaxID from  $table")->queryRow(); //เลือกเอาค่า id ที่มากที่สุดในฐานข้อมูลและบวก 1 เข้าไปด้วยเลย
        $new_id = $rs['MaxID'];
        if ($new_id == '') { // ถ้าได้เป็นค่าว่าง หรือ null ก็แสดงว่ายังไม่มีข้อมูลในฐานข้อมูล
            $std_id = sprintf("%0" . $number . "d", 1); //ถ้าไม่ใช่ค่าว่าง
        } else {
            $std_id = sprintf("%0" . $number . "d", $new_id); //ถ้าไม่ใช่ค่าว่าง
        }

        return $std_id;
    }

}
