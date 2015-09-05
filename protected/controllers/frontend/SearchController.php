<?php

class SearchController extends Controller{
    public $layout = "webapp";
    public function actionSearchproduct(){
        $data['produce_type'] = $this->produce->_get_produce_type();
        $head = "ข้อมูลสินค้า";
        $page = "web_system/from_search_produce"; // โหลดไปแสดงค่าโชว์แบบ popup
        $this->output_webapp($data, $page, $head);
    }
    
    public function search_produce() {
        $type_id = $_POST['type_id'];
        $produce_name = $_POST['search_txt'];

        if ($type_id != "") {
            $w1 = " t.type_id = '$type_id' ";
        } else {
            $w1 = " 1=1 ";
        }

        if ($produce_name != "") {
            $w3 = " AND p.produce_name LIKE '%$produce_name%' ";
        } else {
            $w3 = " AND 1=1 ";
        }

        $data['produce'] = $this->produce->_get_search_produce($w1, $w3);
        $this->load->view('web_system/show_search_produce', $data);
    }
}
