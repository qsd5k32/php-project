<?php
$agenda = new Agenda();
$rid = $_GET['rid'] ?? 0;

if($rid){
    if($agenda->deleteDate($rid)){
        message("success","removed");
        refresh("?page=editAgenda",1);
    }
}