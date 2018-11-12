<?php

class ArticleController extends Controller {

    public $layout = "template_backend";

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(
                    'index', 'create', 'update', 'checkproduct', 'delet', 'view', 'delete',
                    'save', 'upload', 'save_update'
                ),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

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
            "id" => $_POST['id'],
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

            if (file_exists('./uploads/article/200-' . $rs['images'])) {
                unlink('./uploads/article/200-' . $rs['images']);
            }

            if (file_exists('./uploads/article/600-' . $rs['images'])) {
                unlink('./uploads/article/600-' . $rs['images']);
            }

            if (file_exists('./uploads/article/870-' . $rs['images'])) {
                unlink('./uploads/article/870-' . $rs['images']);
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


            $fileTypes = array('jpg', 'jpeg', 'JPG', 'JPEG', 'png', 'PNG'); // File extensions
            $JpegType = array('jpg', 'jpeg', 'JPG', 'JPEG');
            $PngType = array('png', 'PNG');
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
                if (in_array($fileParts['extension'], $JpegType)) {
                    $images_orig = imagecreatefromjpeg($tempFile);
                }

                if (in_array($fileParts['extension'], $PngType)) {
                    $images_orig = imagecreatefrompng($tempFile);
                }
                $photoX = imagesx($images_orig);
                $photoY = imagesy($images_orig);

                $images_fin = imagecreatetruecolor($width, $height);
                imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
                if (in_array($fileParts['extension'], $JpegType)) {
                    imagejpeg($images_fin, "uploads/article/" . $Name);
                }
                if (in_array($fileParts['extension'], $PngType)) {
// integer representation of the color black (rgb: 0,0,0)
                    $background = imagecolorallocate($images_fin, 255, 255, 255);
// removing the black from the placeholder
                    imagecolortransparent($images_fin, $background);

// turning off alpha blending (to ensure alpha channel information is preserved, rather than removed (blending with the rest of the image in the form of black))
                    imagesavealpha($images_fin, true);
                    imagealphablending($images_fin, false);
                    $transparentColor = imagecolorallocatealpha($images_fin, 255, 255, 255, 127);
                    imagefill($images_fin, 0, 0, $transparentColor);
// turning on alpha channel information saving (to ensure the full range of transparency is preserved)

                    header('Content-Type: image/png');
                    imagepng($images_fin, "uploads/article/" . $Name, 0, NULL);
                }

                imagedestroy($images_orig);
                imagedestroy($images_fin);
                /*
                  $this->Thumbnail($Name, 600, 486);
                  $this->Thumbnail($Name, 200, 200);
                  $this->Thumbnail($Name, 870, 500);
                 */
                $this->Thumbnailpng($Name, 600, 486);
                $this->Thumbnailpng($Name, 200, 200);
                $this->Thumbnailpng($Name, 870, 500);
                echo $id;
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function Thumbnailpng($Name, $width, $height) {
        $image = new ImageResize("uploads/article/" . $Name);
        //$image->quality_jpg = 100;
        //$image->crop($width, $height, $allow_enlarge, $position)
        $image->crop($width, $height, false, ImageResize::CROPCENTER);
        $image->save("uploads/article/" . $width . '-' . $Name, IMAGETYPE_PNG);
    }

    public function Thumbnail($Name, $width, $height) {
        $image = new ImageResize("uploads/article/" . $Name);
        $image->quality_jpg = 100;
        $image->crop($width, $height, true, ImageResize::CROPCENTER);
        $image->save("uploads/article/" . $width . '-' . $Name);
    }

    public function actionUpdate($id = null) {
        $art = new Backend_article();
        $data['rs'] = $art->Get_article_by_id($id);
        $data['category'] = Articlecategory::model()->findAll("active=:active", array(":active" => '1'));
        $data['id'] = $id;
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

            if (file_exists('./uploads/article/600-' . $rs['images'])) {
                unlink('./uploads/article/600-' . $rs['images']);
            }

            if (file_exists('./uploads/article/870-' . $rs['images'])) {
                unlink('./uploads/article/870-' . $rs['images']);
            }

            if (file_exists('./uploads/article/200-' . $rs['images'])) {
                unlink('./uploads/article/200-' . $rs['images']);
            }
        }

        Yii::app()->db->createCommand()
                ->delete("article", "id = '$id' ");
    }

}
