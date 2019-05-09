<?php

$blogger = new Blogger();
$id = $_GET['id'] ?? false;
$id = intval($id);
if($id){
    $remove = $blogger->removePost($id);
    if($remove){

        message("success","removed");
        refresh("?page=removePost",1);

    }
}





