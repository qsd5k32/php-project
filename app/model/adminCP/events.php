<?php
require_once LIBS . "Events.php";
$event = new Events();
if(isset($_POST['submit']))
{


       if($event->submit([
           "album"=>$_POST['album'],
           "text"=>$_POST['text'],
           "files"=>$_FILES['files']
       ])){
            message("success","added with success");
            refresh("event",1);
       }


}