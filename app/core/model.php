<?php
class model {
    public function __construct()
    {
        if(empty(session_id())){
            session_start();
        }
    }
    public function render($name,$data = true){
            if($data === true):
                require_once CONFIG."ConnectDb.php";
                require_once MODEL."$name.php";
            else:
                require_once MODEL."$name.php";
            endif;
    }

}



