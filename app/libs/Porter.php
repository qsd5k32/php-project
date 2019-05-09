<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 27/05/18
 * Time: 11:32 م
 */
require( CONFIG."Validation.php");

class Porter
{
    private $inf;
    public $Errors;
    public $stmt;

    /** connect to database */
    public function __construct(){

        ConnectDb::connect();

    }


    protected function inUse($mail,$phone){
        $this->inf = ConnectDb::$db->prepare('SELECT * FROM `porter` WHERE Email=:email or Phone = :phone');
        $this->inf->bindParam(':email',$mail);
        $this->inf->bindParam(':phone',$phone);
        $this->inf->execute();
        return $this->inf->rowCount();
    }
    /**
        check if the user set valid information
     */
    protected function validInfo(array $info = [],array $checks = []):bool
    {
        // check if the date set match type
        foreach($info as $type => $value):
            if (strlen($value) <= 1):
                $this->Errors[] = 'you can\'t set empty value' . $type;
                echo "i check".$value ."type :".$type;
            elseif (validate($value, $type)):
                $this->Errors[] =  "$type  not match make sure you're using a valid character";
            endif;
        endforeach;
        // check if checks value are 1 or 0
        foreach($checks as $value):
            if (!empty($value)):
                if(validate($value,"check")){
                    $this->Errors[] =  ":D i don't forget this ;) !!!";
                }
            endif;
        endforeach;
        // check if user already sign in
        if($this->inUse($info['email'],$info['phone']) > 0):
            $usr = $this->inf->fetchObject();
            if($usr->userName == $info['phone']):
                $this->Errors[] = 'this User name '.$info['phone'].' is already in use';
            elseif ($usr->email == $info['email']):
                $this->Errors[] = 'this email '.$info['email'].' is already in use';
            endif;
        endif;
        // check if there is some errors
        if(empty($this->Errors)):
            return true;
        else:
            return false;
        endif;

    }

    /*
    * insert information to database
    * */
    public function signUp(array $data = [])
    {

        $info = array(
            'name'=> $data['name'],
            'idea'=> $data['idea'],
            'phone'=> $data['phone'],
            'email'=> $data['email'],
            'text' => $data['host']);
        $checks = array(
            $data["files"],
            $data['dev'],
            $data['accompa'],
            $data['coach'],
            $data['formation']);

        if($this->validInfo($info,$checks)):
            try {

                $this->stmt = ConnectDb::$db->prepare('INSERT INTO `porter`
                (`Name`, `Idea`, `Phone`, `Email`, `Files`, `Development`, `Hosting`, `Accompa`, `Coach`, `Formation`) 
                VALUES 
                (:name, :idea, :phone, :email, :files, :dev, :host, :accompa, :coach, :formation)');
                $this->stmt->bindParam(':name', $data['name']);
                $this->stmt->bindParam(':idea', $data['idea']);
                $this->stmt->bindParam(':phone', $data['phone']);
                $this->stmt->bindParam(':email', $data['email']);
                $this->stmt->bindParam(':files', $data['files']);
                $this->stmt->bindParam(':dev', $data['dev']);
                $this->stmt->bindParam(':host', $data['host']);
                $this->stmt->bindParam(':accompa', $data['accompa']);
                $this->stmt->bindParam(':coach', $data['coach']);
                $this->stmt->bindParam(':formation', $data['formation']);
                $this->stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        // if there is some errors return false
        else :
            return false;
        endif;
    }
}