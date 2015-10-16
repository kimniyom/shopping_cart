<?php

class Backend_article{
    function Get_article_all(){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname")
                ->from("article a")
                ->join("masuser m","a.owner = m.pid")
                ->order("a.id DESC")
                ->queryAll();
        return $result;  
    }
    
    function Get_article_limit($limit = null){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname")
                ->from("article a")
                ->join("masuser m","a.owner = m.pid")
                ->order("a.id DESC")
                ->limit("$limit")
                ->queryAll();
        return $result;  
    }
    
    function Get_article_by_id($id = null){
        $result = Yii::app()->db->createCommand()
                ->select("a.*,m.name,m.lname")
                ->from("article a")
                ->join("masuser m","a.owner = m.pid")
                ->where("a.id = '$id' ")
                ->queryRow();
        return $result;    
    }
}

