<?php

class ProductController extends Controller {

    public $layout = "template_backend";

    public function actionGetproduct() {
        $type_id = $_GET['type_id'];

        $prodult = new Product();

        $data['type_id'] = $type_id;
        $data['type_name'] = $prodult->get_type_name($type_id);
        $data['product'] = $prodult->get_product_all($type_id);

        $data['count_product_type'] = $prodult->get_count_product_type($type_id);

        $this->render("//backend/product/show_product_all", $data);
    }

    public function actionCreate() {
        $type_id = $_GET['type_id'];
        $prodult = new Product();

        $data['product_id'] = "P" . date("YmdHis");
        $data['type_id'] = $type_id;
        $data['type_name'] = $prodult->get_type_name($type_id);

        $this->render("//backend/product/create", $data);
    }

    public function actionSave_product() {
        $data = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_detail' => $_POST['product_detail'],
            'product_price' => $_POST['product_price'],
            'product_num' => $_POST['product_num'],
            'type_id' => $_POST['type_id'],
            'd_update' => date('Y-m-d H:i:s')
        );

        Yii::app()->db->createCommand()
                ->insert('product', $data);

        //echo $this->redirect(array('backend/product/detail_product&product_id=' . $_POST['product_id']));
    }

    public function actionUpdate() {
        $type_id = $_GET['type_id'];
        $product_id = $_GET['product_id'];
        $product = new Product();

        $data['product'] = $product->_get_detail_product($product_id);
        $data['type_id'] = $type_id;
        $data['type_name'] = $product->get_type_name($type_id);

        $this->render("//backend/product/update", $data);
    }

    public function actionSave_update() {
        $product_id = $_POST['product_id'];
        $data = array(
            'product_name' => $_POST['product_name'],
            'product_detail' => $_POST['product_detail'],
            'product_price' => $_POST['product_price'],
            'product_num' => $_POST['product_num'],
            'd_update' => date('Y-m-d H:i:s')
        );

        Yii::app()->db->createCommand()
                ->update('product', $data, "product_id = '$product_id'");
    }

    public function actionDetail_product() {
        $product_id = $_GET['product_id'];

        $product = new Product();

        $data['images'] = $product->get_images_product($product_id);
        $data['product'] = $product->_get_detail_product($product_id);

        $data['near'] = $product->get_product_near($product_id);

        $this->render("//backend/product/detail_product", $data);
    }

    public function actionImages() {
        $product_id = $_GET['product_id'];

        $product = new Product();
        $data['product'] = $product->_get_detail_product($product_id);

        $this->render("//backend/product/images", $data);
    }

    public function actionGet_images() {
        $product_id = $_POST['product_id'];
        $product = new Product();
        $data['images'] = $product->get_images_product($product_id);
        $this->renderPartial("//backend/product/getimages", $data);
    }

    public function actionUpload() {
        // Define a destination
        $product_id = $_GET['product_id'];
        $targetFolder = Yii::app()->baseUrl . '/uploads'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //สั่งอัพเดท
                $columns = array(
                    "product_id" => $product_id,
                    "images" => $FileName
                );

                Yii::app()->db->createCommand()
                        ->insert("product_images", $columns);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionDelete_images() {
        $id = $_POST['id'];
        $images = $_POST['images'];
        if (isset($images)) {
            $filename = './uploads/' . $images;

            if (file_exists($filename)) {
                unlink($filename);
            }
        }

        Yii::app()->db->createCommand()
                ->delete('product_images', "id = '$id' ");
    }

}
