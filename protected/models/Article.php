<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property string $images
 * @property string $owner
 * @property integer $category
 * @property string $create_date
 */
class Article 
{

    function Get_article_all(){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname")
                ->from("article a")
                ->join("masuser m","a.owner = m.id")
                ->order("a.id DESC")
                ->queryAll();
        return $result;  
    }
    
    function Get_article_limit($limit = null){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname")
                ->from("article a")
                ->join("masuser m","a.owner = m.id")
                ->order("a.id DESC")
                ->limit("$limit")
                ->queryAll();
        return $result;  
    }
    
    function Get_article_by_id($id = null){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname")
                ->from("article a")
                ->join("masuser m","a.owner = m.id")
                ->where("a.id = '$id' ")
                ->queryRow();
        return $result;    
    }
    
    function Count(){
        $query = "SELECT COUNT(*) AS TOTAL FROM article";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs['TOTAL'];
    }



}
