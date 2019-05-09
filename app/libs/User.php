<?php
require( CONFIG."Validation.php");
class User {
    private $inf;
    public $Errors;
    public $stmt;
    /** connect to database */
    public function __construct(){
        ConnectDb::connect();
    }
    protected function inUse($mail,$user = ""){
        $this->inf = ConnectDb::$db->prepare('SELECT email ,userName, password FROM Users WHERE email=:email or userName = :userName');
        $this->inf->bindParam(':email',$mail);
        $this->inf->bindParam(':userName',$user);
        $this->inf->execute();
        return $this->inf->rowCount();
    }

    protected function validInfo($info = []):bool{
        foreach ($info as $type => $value):
            if (empty($value)):
                $this->Errors[] = 'you set empty field';
            endif;
            if (validate($value, $type)):
                $this->Errors[] = "$type not match make sure you're using a valid character";
            endif;
        endforeach;
        if($this->inUse($info['email']) == 0):
            $this->Errors[] = 'Email or password it not valid';
        endif;
        if(empty($this->Errors))
        {
            return true;
        }else{
            return false;
        }
    }


    /**
     * @param string $userMail
     * @param string $password
     * @return bool|null|string
     */
    public function signIn($email, $password) {
        $info = array(
            'email' => $email,
            'password' => $password);

        if ($this->validInfo($info)):
            if($this->inUse($email) == 1):
                $usr = $this->inf->fetchObject();
                if($usr->email == $email and password_verify($password,$usr->password)):
                    return true;
                else:
                    $this->Errors[] = "Email or password it not valid";
                    return false;
                endif;
            endif;
        else:
            return false;
        endif;
    }
}