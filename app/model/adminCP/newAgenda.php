<?php
require_once LIBS . "Agenda.php";
$agenda = new Agenda();


if(isset($_POST['submit'])){

    if($agenda->setDate(
        ['activite' => $_POST['activite'],
        'date' => $_POST['date'],
        'lieu' => $_POST['lieu'],
        'cible' => $_POST['cible'],]))
    {
        message("success","added with success");
        refresh("?page=newAgenda",1);
    }

}