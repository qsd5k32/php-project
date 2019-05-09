<?php

if(isset($_POST['update'])){
$blogger = new Blogger();
$id = $_GET['id'] ?? false;
$id = intval($id);
if($id){
   $update = $blogger->updatePost($id,[
        "title"=>$_POST['title'],
        "content"=>$_POST['content'],
    ]);
   if($update){

       message("success","post update with success");
       refresh("?page=editPost",1);

   }else{

       message("warning","post not updated pleas try again");
       refresh("?page=editPost",1);
   }
}



}