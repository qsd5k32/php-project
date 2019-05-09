<?php

class Blogger{

    public $inf;
    public $stmt;



    public function __construct()
    {
        ConnectDb::connect();
    }

    // editor and admin post
    public function setPost(array $data){

        $this->inf = ConnectDb::$db->prepare("INSERT INTO `Posts`
                                              (`title`, `content`) 
                                              VALUES 
                                              (:title,:content)");
        $this->inf->bindParam(':title',$data["title"]);
        $this->inf->bindParam(':content',$data["content"]);
        if($this->inf->execute()){
            return true;
        }else{
            return false;
        }

    }


    public function updatePost($id,array $data):bool{
        $this->inf = ConnectDb::$db->prepare("UPDATE `Posts` SET `title`=:title,`content`=:content WHERE id = $id");
        $this->inf->bindParam(':title',$data["title"]);
        $this->inf->bindParam(':content',$data["content"]);
        if($this->inf->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function removePost($id){
        $this->inf = ConnectDb::$db->prepare("DELETE FROM `Posts` WHERE id=$id");
        if($this->inf->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function countPosts():int{


        $this->inf = ConnectDb::$db->query('SELECT COUNT(*) AS total FROM Posts');
        return $this->inf->fetch(PDO::FETCH_ASSOC)['total'];

    }
    // show all Posts
    public function showPosts($limit) {

        $this->stmt = ConnectDb::$db->prepare("SELECT * FROM Posts ORDER BY id DESC $limit");
        $this->stmt->execute();



    }
    public function showPost($id){

        $this->stmt = ConnectDb::$db->prepare("SELECT * FROM Posts WHERE id = $id");
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

}