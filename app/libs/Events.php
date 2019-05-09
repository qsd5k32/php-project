<?php
require_once( CONFIG."Validation.php");
require_once( LIBS."Upload.php");
/**
 * Created by PhpStorm.
 * User: med
 * Date: 02/06/18
 * Time: 03:57 ص
 */

class Events
{
    public $stmt;
    public $stmt2;
    public $Errors;
    public function __construct()
    {

        ConnectDb::connect();

    }

    /**
     * @param array $info
     * @return bool
     */
    protected function validInfo(array $info = []):bool
    {

        foreach ($info as $type => $value):
            if (empty($value)):
                $this->Errors[] = 'you set empty field';
            endif;
            if (validate($value, $type)):
                $this->Errors[] = "$type not match make sure you're using a valid character";
            endif;
        endforeach;
        if(!empty($this->Errors))
        {
            return false;
        }
        return true;


    }

    /**
     * @param array $data
     * @return bool
     */
    public function submit(array $data = []):bool
    {
        $upload = new Upload($data['files']);
        $info = [
            'name' => $data['album'],
            'text' => $data['text']
        ];
        if($this->validInfo($info))
        {

            if($upload->image('uploads','event'))
            {

                $this->stmt = ConnectDb::$db->prepare('INSERT INTO `event`(`album`, `text`) VALUES (:album,:text)');
                $this->stmt->bindParam(':album',$data['album']);
                $this->stmt->bindParam(':text',$data['text']);
                $sub = $this->stmt->execute();
                if($sub)
                {
                    foreach ($upload->path as $path)
                    {
                        $this->stmt2 = ConnectDb::$db->prepare('INSERT INTO `eventsImages`(`album`, `image`) VALUES (:album,:image)');
                        $this->stmt2->bindParam('album',$data['album']);
                        $this->stmt2->bindParam('image',$path);
                        $this->stmt2->execute();
                    }
                    return true;
                }
            }else{
                $this->Errors[] = $upload->Errors;
            }
        }

        return false;


    }


    public function fetchEvents()
    {

        $this->stmt = ConnectDb::$db->prepare('SELECT * FROM `event` ORDER BY `date` DESC');
        $this->stmt->execute();
    }


    public function fetchImages($album)
    {
        $this->stmt2 = ConnectDb::$db->prepare('SELECT * FROM `eventsImages` WHERE album = :album');

        if(!validate($album, "address"))
        {
            $this->stmt2->bindParam(":album",$album);
            if($this->stmt2->execute())
            {
                return true;
            }
        }
        return false;
    }


    public function addImage($album,$image)
    {
        $upload = new Upload($image);
        if(!validate($album,"address")){
            if($upload->image('uploads','event')){
                foreach ($upload->path as $path)
                {
                    $this->stmt2 = ConnectDb::$db->prepare('INSERT INTO `eventsImages`(`album`, `image`) VALUES (:album,:image)');
                    $this->stmt2->bindParam('album',$album);
                    $this->stmt2->bindParam('image',$path);
                    $this->stmt2->execute();
                }
                return true;
            }
        }
        return false;

        


    }

    public function deleteFile($file)
    {

        if(!validate($file,"url"))
        {
            if(file_exists($file))
            {
                unlink($file);
                $this->stmt = ConnectDb::$db->prepare('DELETE FROM `eventsImages` WHERE `image` = :image');
                $this->stmt->bindParam(':image',$file);
                $this->stmt->execute();
                return true;
            }
        }

        return false;

    }

    public function deleteEvent($album){
        $this->fetchImages($album);
        while ($image  = $this->stmt2->fetch(PDO::FETCH_ASSOC)){

            if(!$this->deleteFile($image['image'])){
                $this->Errors[] = "not deleted ". $image['image'];
            }

        }
        if(empty($this->Errors)){
            $this->stmt = ConnectDb::$db->prepare('DELETE FROM `event` WHERE `album` = :album');
            $this->stmt->bindParam(':album',$album);
            $this->stmt->execute();
            return true;
        }
        return false;


    }




}