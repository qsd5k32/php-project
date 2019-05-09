<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 07/06/18
 * Time: 07:14 م
 */
require_once LIBS ."Upload.php";
class Fiche
{

    public $inf;
    public $stmt;



    public function __construct()
    {
        ConnectDb::connect();
    }

    // editor and admin post
    public function setFiche(array $data){
        $upload = new Upload($data['fiche']);
        if($upload->pdf('uploads','Fiche')){

            $this->inf = ConnectDb::$db->prepare("INSERT INTO `fiche`( `name`, `text`, `url`) VALUES (:name,:text,:url)");
            $this->inf->bindParam(':name',$data["name"]);
            $this->inf->bindParam(':text',$data["content"]);
            $this->inf->bindParam(':url',$upload->path);
            if($this->inf->execute()){
                return true;
            }
        }
        return false;


    }



    public function removeFiche($id){
        $id = intval($id);
        $this->showFiche($id);
        $file = $this->stmt->fetch(PDO::FETCH_ASSOC)['url'];
        if(file_exists($file)){
            unlink($file);
            $this->inf = ConnectDb::$db->prepare("DELETE FROM `fiche` WHERE id=$id");
            if($this->inf->execute()){
                return true;
            }
        }
        return false;

    }


    public function countBio():int{


        $this->inf = ConnectDb::$db->query('SELECT COUNT(*) AS total FROM `fiche`');
        return $this->inf->fetch(PDO::FETCH_ASSOC)['total'];

    }

    // show all Posts
    public function showFiches($limit = "") {

        $this->stmt = ConnectDb::$db->prepare("SELECT * FROM `fiche` ORDER BY id DESC $limit");
        $this->stmt->execute();


    }
    public function showFiche($id) {
        $id = intval($id);
        $this->stmt = ConnectDb::$db->prepare("SELECT * FROM `fiche` WHERE id = :id");
        $this->stmt->bindParam(":id",$id);
        $this->stmt->execute();


    }

}