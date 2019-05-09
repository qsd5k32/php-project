<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 07/06/18
 * Time: 03:09 م
 */

class Agenda
{
    public $Errors;
    public $stmt;
    public $inf;
    public function __construct()
    {
        ConnectDb::connect();
    }

    public function setDate(array $data){

        $this->inf = ConnectDb::$db->prepare("INSERT INTO `agenda`(`activite`, `date`, `lieu`, `cible`) VALUES (:activite,:date,:lieu,:cible)");
        $this->inf->bindParam(':activite',$data["activite"]);
        $this->inf->bindParam(':date',$data["date"]);
        $this->inf->bindParam(':lieu',$data["lieu"]);
        $this->inf->bindParam(':cible',$data["cible"]);
        if($this->inf->execute()){
            return true;
        }
        return false;
    }


    public function deleteDate($id){
        $id = intval($id);
        $this->inf = ConnectDb::$db->prepare("DELETE FROM `agenda` WHERE id=:id");
        $this->inf->bindParam(":id",$id);
        if($this->inf->execute()){
            return true;
        }
        return false;
    }


    public function showDate(){
        $this->inf = ConnectDb::$db->prepare("SELECT * FROM `agenda` ORDER BY date DESC");
        $this->inf->execute();
    }
}