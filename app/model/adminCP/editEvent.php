<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 02/06/18
 * Time: 10:39 م
 */
$event = new Events();
$album = $_GET['album'];
$rid = $_GET['rid'] ?? 0;
$erid = $_GET['erid'] ?? 0;
if($erid){
    if($event->deleteEvent($erid)){
        message("success","Removed");
        refresh("?page=editEvent",1);
    }
}
if(isset($_POST['add']))
{


    if($event->addImage($album,$_FILES['files'])){
        message("success","added with success");
        refresh("?page=editEvent",1);
    }


}
if($rid){

    $event->deleteFile($rid);
    message("success","removed");
    refresh("?page=editEvent",1);


}