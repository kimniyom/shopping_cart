<?php

class User extends CActiveRecord {

    public function tableName() {
        return "masuser";
    }

    public function Get_address($pid = null) {
        $sql = "SELECT a.*,m.name,m.lname,m.tel,m.email "
                . "FROM address a RIGHT JOIN masuser m ON m.pid = a.pid "
                . "WHERE m.pid = '$pid' ";
        $result = Yii::app()->db->createCommand($sql)->queryRow();

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
