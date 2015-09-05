<?php

class UserController extends Controller {

    public $layout = "webapp";

    public function actionAddress() {
        $pid = $_POST['pid'];
        $user = new User();
        $data['changwat'] = $user->Get_changwat();
        $data['address'] = $user->Get_address($pid);
        $this->renderPartial("//user/address_user", $data);
    }

    public function actionGet_combobox() {
        $type = $_POST['type'];
        $value = $_POST['value'];
        $active = $_POST['active'];
        if ($type === "ampur") {
            $sql = "SELECT * FROM ampur WHERE changwat_id = '$value' ";
            $result = Yii::app()->db->createCommand($sql)->queryAll();
            echo $str = "<option value=''>เลือกอำเภอ</option>";
            foreach ($result as $rs):
                $str = "<option value='" . $rs['ampur_id'] . "'";
                if ($rs['ampur_id'] == $active) {
                    $str .= "selected";
                }
                $str .= ">" . $rs['ampur_name'] . "</option>";
                echo $str;
            endforeach;
        } else if ($type === "tambon") {
            $sql = "SELECT * FROM tambon WHERE ampur_id = '$value' ";
            $result = Yii::app()->db->createCommand($sql)->queryAll();
            echo $str = "<option value=''>เลือกตำบล</option>";
            foreach ($result as $rs):
                $str = "<option value='" . $rs['tambon_id'] . "'";
                if ($rs['tambon_id'] == $active) {
                    $str .= "selected";
                }
                $str .= ">" . $rs['tambon_name'] . "</option>";

                echo $str;
            endforeach;
        }
    }

    public function actionGet_address() {
        $pid = $_POST['pid'];
        $user = new User();
        $data['changwat'] = $user->Get_changwat();
        $data['address'] = $user->Get_address($pid);
        $this->renderPartial("//user/edit_address", $data);
    }

    public function actionSave_address() {
        $pid = $_POST['pid'];
        $user = new User();

        $columns_user = array(
            "name" => $_POST['name'],
            "lname" => $_POST['lname']
        );

        $columns = array(
            "pid" => $_POST['pid'],
            "number" => $_POST['number'],
            "building" => $_POST['building'],
            "class" => $_POST['_class'],
            "room" => $_POST['room'],
            "changwat" => $_POST['changwat'],
            "ampur" => $_POST['ampur'],
            "tambon" => $_POST['tambon'],
            "zipcode" => $_POST['zipcode']
        );
        $check = $user->Check_address($pid);
        if ($check > 0) {
            Yii::app()->db->createCommand()
                    ->update("address", $columns, "pid = '$pid' ");
        } else {
            Yii::app()->db->createCommand()
                    ->insert("address", $columns);
        }

        Yii::app()->db->createCommand()
                ->update("masuser", $columns_user, "pid = '$pid' ");
    }

}
