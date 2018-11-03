<?php

class Backend_article{
    function Get_article_all(){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname,c.category as categoryname")
                ->from("article a")
                ->join("masuser m","a.owner = m.id")
                ->join("articlecategory c","a.category = c.id")
                ->order("a.id DESC")
                ->queryAll();
        return $result;  
    }
    
    function Get_article_limit($limit){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname,c.category as categoryname")
                ->from("article a")
                ->join("masuser m","a.owner = m.id")
                ->join("articlecategory c","a.category = c.id")
                ->order("a.id DESC")
                ->limit("$limit")
                ->queryAll();
        return $result;  
    }
    
    function Get_article_by_id($id){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname,c.category as categoryname")
                ->from("article a")
                ->join("masuser m","a.owner = m.id")
                ->join("articlecategory c","a.category = c.id")
                ->where("a.id = '$id' ")
                ->queryRow();
        return $result;    
    }
}

