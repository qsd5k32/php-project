<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 07/06/18
 * Time: 02:27 ص
 */
require_once LIBS."Upload.php";
class Biographie
{

    public $inf;
    public $stmt;



    public function __construct()
    {
        ConnectDb::connect();
    }

    // editor and admin post
    public function setBio(array $data){
        $upload = new Upload($data['image']);
        if($upload->image('uploads','Bio')){

            $this->inf = ConnectDb::$db->prepare("INSERT INTO `biographie`(`name`, `text`, `photo`) VALUES (:title,:content,:image)");
            $this->inf->bindParam(':title',$data["name"]);
            $this->inf->bindParam(':content',$data["content"]);
            $this->inf->bindParam(':image',$upload->path[0]);
            if($this->inf->execute()){
                return true;
            }
        }
        return false;


    }



    public function removeBio($id){
        $id = intval($id);
        $this->showBiographie($id);
        $file = $this->stmt->fetch(PDO::FETCH_ASSOC)['photo'];
        if(file_exists($file)){
            unlink($file);
            $this->inf = ConnectDb::$db->prepare("DELETE FROM `biographie` WHERE id=$id");
            if($this->inf->execute()){
                return true;
            }
        }
        return false;

    }


    public function countBio():int{


        $this->inf = ConnectDb::$db->query('SELECT COUNT(*) AS total FROM `biographie`');
        return $this->inf->fetch(PDO::FETCH_ASSOC)['total'];

    }

    // show all Posts
    public function showBio($limit = "") {

        $this->stmt = ConnectDb::$db->prepare("SELECT * FROM `biographie` ORDER BY id DESC $limit");
        $this->stmt->execute();


    }
    public function showBiographie($id) {
        $id = intval($id);
        $this->stmt = ConnectDb::$db->prepare("SELECT * FROM `biographie` WHERE id = :id");
        $this->stmt->bindParam(":id",$id);
        $this->stmt->execute();


    }
}