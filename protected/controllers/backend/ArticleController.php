<?php

class ArticleController extends Controller {

    public $layout = "template_backend";

    public function actionIndex() {
        $art = new Backend_article();
        $data['article'] = $art->Get_article_all();
        $this->render("//backend/article/index", $data);
    }

    public function actionCreate() {
        $sql = "SELECT MAX(id) AS id FROM article ";
        $rs = Yii::app()->db->createCommand($sql)->queryRow();
        $data['category'] = Articlecategory::model()->findAll("active=:active", array(":active" => '1'));
        $data['id'] = ($rs['id'] + 1);
        $this->render("//backend/article/create", $data);
    }

    public function actionSave() {
        $columns = array(
            "title" => $_POST['title'],
            "detail" => $_POST['msg'],
            "category" => $_POST['category'],
            "owner" => Yii::app()->user->id,
            "create_date" => date("Y-m-d H:i:s")
        );
        Yii::app()->db->createCommand()
                ->insert("article", $columns);
    }

    public function actionUploads($id = null) {

        //Check File 
        $art = new Backend_article();
        $rs = $art->Get_article_by_id($id);
        if (!empty($rs['images'])) {
            $filename = './uploads/article/' . $rs['images'];
            if (file_exists($filename)) {
                unlink($filename);
            }
        }

        $targetFolder = Yii::app()->baseUrl . '/uploads/article'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //สั่งอัพเดท
                $columns = array(
                    "images" => $FileName
                );

                Yii::app()->db->createCommand()
                        ->update("article", $columns, "id = '$id' ");
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    function Randstrgen() {
        $len = 30;
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }

    public function actionUpload($id = null) {
        //Check File 
        $art = new Backend_article();
        $rs = $art->Get_article_by_id($id);
        if (!empty($rs['images'])) {
            $filename = './uploads/article/' . $rs['images'];
            if (file_exists($filename)) {
                unlink($filename);
            }
        }

        $targetFolder = Yii::app()->baseUrl . '/uploads/article'; // Relative to the root
        if (!empty($_FILES)) {

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FULLNAME = $_FILES['Filedata']['name'];
            $type = substr($FULLNAME, -3);
            $Name = "img_" . $this->Randstrgen() . "." . $type;
            $targetFile = $targetPath . '/' . $Name;


            $fileTypes = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {

                //สั่งอัพเดท
                $columns = array(
                    "images" => $Name
                );

                Yii::app()->db->createCommand()
                        ->update("article", $columns, "id = '$id' ");

                $width = 1280; //*** Fix Width & Heigh (Autu caculate) ***//
                //$new_images = "Thumbnails_".$_FILES["Filedata"]["name"];
                $size = getimagesize($_FILES['Filedata']['tmp_name']);
                $height = round($width * $size[1] / $size[0]);
                $images_orig = imagecreatefromjpeg($tempFile);
                $photoX = imagesx($images_orig);
                $photoY = imagesy($images_orig);
                $images_fin = imagecreatetruecolor($width, $height);
                imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
                imagejpeg($images_fin, "uploads/article/" . $Name);
                imagedestroy($images_orig);
                imagedestroy($images_fin);

                //$this->ThumbnailDefault($Name,$size,$tempFile,200);
                //$this->Thumbnail($Name,$size,$tempFile,480);
                $this->Thumbnail($Name, $size, $tempFile, 600);
                //$this->Thumbnail($Name,$size,$tempFile,100);
                //move_uploaded_file($tempFile, $targetFile); เก่า
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function Thumbnail($Name, $size, $tempFile, $width) {

        //$new_images = "Thumbnails_".$_FILES["Filedata"]["name"];
        //$image = new ImageResize();

        $height = round($width * $size[1] / $size[0]);
        $images_orig = imagecreatefromjpeg($tempFile);
        $photoX = imagesx($images_orig);
        $photoY = imagesy($images_orig);
        $images_fin = imagecreatetruecolor($width, $height);

        $image = new ImageResize("uploads/article/" . $Name);
        $image->quality_jpg = 100;
        $image->crop($width, "486", true, ImageResize::CROPCENTER);
        $image->save("uploads/article/" . $width . '-' . $Name);
    }

    public function actionUpdate($id = null) {
        $art = new Backend_article();
        $data['rs'] = $art->Get_article_by_id($id);
        $data['category'] = Articlecategory::model()->findAll("active=:active", array(":active" => '1'));
        $this->render("//backend/article/update", $data);
    }

    public function actionSave_update() {
        $id = $_POST['id'];
        $columns = array(
            "title" => $_POST['title'],
            "detail" => $_POST['msg'],
            "category" => $_POST['category'],
            "owner" => Yii::app()->user->id
        );
        Yii::app()->db->createCommand()
                ->update("article", $columns, "id = '$id'");
    }

    public function actionView($id = null) {
        //$id = $_GET['id'];
        $article = new Backend_article();
        $data['result'] = $article->Get_article_by_id($id);
        $this->render("//backend/article/view", $data);
    }

    public function actionDelete() {
        //Check File 
        $id = $_POST['id'];
        $art = new Backend_article();
        $rs = $art->Get_article_by_id($id);
        if (!empty($rs['images'])) {
            $filename = './uploads/article/' . $rs['images'];

            if (file_exists($filename)) {
                unlink($filename);
            }
        }

        Yii::app()->db->createCommand()
                ->delete("article", "id = '$id' ");
    }

}
