<?php

$fiche = new Fiche();
$rid = $_GET['rid'] ?? 0;

if($rid){

    if($fiche->removeFiche($rid)){
        message("success","removed with success");
        refresh("adminCP?page=editFich",1);
    }

}