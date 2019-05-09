<?php
class view{
    public function render($path,$components = true){

        if($components){
            require_once VIEW."/components/head.php";
            require_once VIEW."/components/navbar.php";
            require_once VIEW."$path";
            require_once VIEW."/components/footer.php";
        }else{
            require_once VIEW."$path";
        }

    }
}
