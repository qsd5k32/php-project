<?php
require_once LIBS . "Biographie.php";
$bio = new Biographie();
if(isset($_POST['submit'])) {

    if($bio->setBio([
        "name" => $_POST['name'],
        "content" => $_POST['content'],
        "image" => $_FILES['image']
    ])){
        message("success","added width success");
        refresh("adminCP?page=newBio",1);
    }


}

