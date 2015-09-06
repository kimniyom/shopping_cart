<?php

class User extends CActiveRecord {

    public function tableName() {
        return "masuser";
    }

    public function Get_address($pid = null) {
        $sql = "SELECT a.number,
                    a.building,
                    a.class,
                    a.room,
                    a.changwat,
                    a.ampur,
                    a.tambon,
                    changwat_name,
                    ampur_name,
                    tambon_name,
                    m.name,
                    m.lname,
                    m.tel,
                    m.email,
                    a.zipcode
                FROM address a RIGHT JOIN masuser m ON m.pid = a.pid 
                INNER JOIN changwat c ON a.changwat = c.changwat_id
                INNER JOIN ampur ap ON a.ampur = ap.ampur_id 
                INNER JOIN tambon t ON a.tambon = t.tambon_id
                WHERE m.pid = '$pid' ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();

        return $result;
    }

    public function Check_address_true($pid = null) {
        $query = "SELECT *
                        FROM address 
                        WHERE pid = '$pid' 
                        AND number != '' 
                        AND changwat != '' 
                        AND ampur != '' 
                        AND tambon != '' 
                        AND zipcode != '' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result;
    }

    public function Get_changwat() {
        $query = "SELECT * FROM changwat";
        $result = Yii::app()->db->createCommand($query)->queryAll();
        return $result;
    }

    public function Check_address($pid = null) {
        $query = "SELECT COUNT(*) AS TOTAL FROM address WHERE pid = '$pid' ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result['TOTAL'];
    }

}
