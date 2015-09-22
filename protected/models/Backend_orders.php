<?php

class Backend_orders {

    function duplicate_product($order_id = null, $product_id = null) {
        $query = "SELECT COUNT(*) AS TOTAL 
                        FROM basket
                        WHERE order_id = '$order_id' AND product_id = '$product_id' ";
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
        $sql = "SELECT p.product_id,l.id,p.product_price,l.product_num,l.product_price_sum,p.product_name,p.product_detail
                FROM basket l INNER JOIN product p ON l.product_id = p.product_id
                WHERE order_id = '$order_id' ";

        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    //หาจำนวนเงินการสั่งซื้อในแต่ละเดือน
    function get_order_month($pid = null) {
        $query = "SELECT m.id,m.month_th,
                        IFNULL(Q1.PRICE_TOTAL,0) AS PRICE_TOTAL
                        FROM `month` m 
                        LEFT JOIN 
                        (
                        SELECT SUBSTR(o.order_date,6,2) AS id,
                                SUM(b.product_num) AS PRODUCT_TOTAL,
                                SUM(b.product_price_sum) AS PRICE_TOTAL
                        FROM orders o
                        INNER JOIN basket b ON o.order_id = b.order_id
                        WHERE o.pid = '$pid' AND LEFT(o.order_date,4) = YEAR(NOW()) AND active = '3'
                        GROUP BY SUBSTR(o.order_date,6,2)
                        ) Q1 ON m.id = Q1.id

                        ORDER BY m.id ";

        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    //หาจำนวนการสั่งซื้อในแต่ละเดือน
    function get_order_month_visit($pid = null) {
        $query = "SELECT m.id,m.month_th,
                        IFNULL(Q1.TOTAL,0) AS TOTAL
                        FROM `month` m 
                        LEFT JOIN 
                        (
                        SELECT SUBSTR(o.order_date,6,2) AS id,
                        COUNT(*) AS TOTAL
                        FROM orders o
                        WHERE o.pid = '$pid' AND LEFT(o.order_date,4) = YEAR(NOW()) AND active = '3'
                        GROUP BY SUBSTR(o.order_date,6,2)
                        ) Q1 ON m.id = Q1.id

                        ORDER BY m.id ";

        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    //หาจำนวนการสั่งซื้อในแต่ประเภท
    function get_order_type($pid = null) {
        $query = "SELECT t.type_name,IFNULL(Q1.price_total,0) AS TOTAL
                        FROM product_type t

                        LEFT JOIN 
                        (
                        SELECT p.type_id,SUM(b.product_price_sum) AS price_total
                        FROM basket b INNER JOIN product p ON b.product_id = p.product_id
                        INNER JOIN orders o ON b.order_id = o.order_id
                        WHERE o.pid = '$pid' AND  LEFT(o.order_date,4) = YEAR(NOW()) AND o.active = '3'
                        GROUP BY p.type_id
                        ) Q1 

                        ON t.type_id = Q1.type_id 
                        ORDER BY t.type_id";

        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    //หารายการสั่งซื้อที่ยังไม่โอนเงิน
    function get_order_payable($pid = null) {
        $query = "SELECT o.order_id,o.order_date,SUM(b.product_num) AS PRODUCT_TOTAL,SUM(b.product_price_sum) AS PRICE_TOTAL 
                        FROM orders o INNER JOIN basket b ON o.order_id = b.order_id
                        WHERE pid = '$pid' AND active = '1'
                        GROUP BY o.order_id  ";
        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    //หารายการรอตรวจสอบยอดเงิน
    function get_order_verify() {
        $query = "SELECT o.pid,
                        m.name,
                        m.lname,
                        o.order_id,
                        o.order_date,
                        SUM(b.product_num) AS PRODUCT_TOTAL,
                        SUM(b.product_price_sum) AS PRICE_TOTAL,
                        o.slip,
                        m.tel
                FROM orders o INNER JOIN basket b ON o.order_id = b.order_id
                INNER JOIN masuser m ON o.pid = m.pid
                WHERE active = '2'
                GROUP BY o.order_id  ";
        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    //นับจำนวนออเดอร์ที่ยังไม่ได้ชำระเงินของสมาชิกคนนั้น
    function count_informpayment() {
        $rs = Yii::app()->db->createCommand()
                ->select('COUNT(*) AS TOTAL')
                ->from('orders')
                ->where('active=:active', array(':active' => '1'))
                ->queryRow();

        return $rs['TOTAL'];
    }

    //นับจำนวนออเดอร์ที่ชำระเงินรอการตรวจสอบ
    function count_verify() {
        $rs = Yii::app()->db->createCommand()
                ->select('COUNT(*) AS TOTAL')
                ->from('orders')
                ->where('active = :active', array(':active' => '2'))
                ->queryRow();

        return $rs['TOTAL'];
    }

    //นับจำนวนออเดอร์ที่ชำระเงินตรวจสอบและรอการจัดส่ง
    function count_wait_send($pid = null) {
        $rs = Yii::app()->db->createCommand()
                ->select('COUNT(*) AS TOTAL')
                ->from('orders')
                ->where('pid=:pid AND active = 3', array(':pid' => $pid))
                ->queryRow();

        return $rs['TOTAL'];
    }

    //นับจำนวนออเดอร์ที่จัดส่งแล้ว
    function count_send($pid = null) {
        $rs = Yii::app()->db->createCommand()
                ->select('COUNT(*) AS TOTAL')
                ->from('orders')
                ->where('pid=:pid AND active = 4', array(':pid' => $pid))
                ->queryRow();

        return $rs['TOTAL'];
    }
    
    //ดึงข้อมูลการสั่งซื้อมาแสดงเพื่อเช็คจำนวนเงิน
    function get_detail_order($order_id = null) {
        $query = "SELECT o.pid,
                        m.name,
                        m.lname,
                        o.order_id,
                        o.order_date,
                        SUM(b.product_num) AS PRODUCT_TOTAL,
                        SUM(b.product_price_sum) AS PRICE_TOTAL,
                        o.slip,
                        m.tel
                FROM orders o INNER JOIN basket b ON o.order_id = b.order_id
                INNER JOIN masuser m ON o.pid = m.pid
                WHERE active = '2' AND o.order_id = '$order_id' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
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
