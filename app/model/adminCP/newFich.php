<?php
require_once LIBS . "Fiche.php";
$fiche = new Fiche();
if(isset($_POST['submit'])) {

    if($fiche->setFiche([
        "name" => $_POST['name'],
        "content" => $_POST['content'],
        "fiche" => $_FILES['fiche']
    ])){
        message("success","added width success");
        refresh("adminCP?page=newFich",1);
    }


}

