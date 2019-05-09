<?php

$bio = new Biographie();
$rid = $_GET['rid'] ?? 0;

if($rid){

    if($bio->removeBio($rid)){
        message("success","removed with success");
        refresh("adminCP?page=editBio",1);
    }

}