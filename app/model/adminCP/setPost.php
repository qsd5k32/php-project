<?php
requireAll([

    LIBS ."Blogger",
    CONFIG ."Validation"
]);

if(isset($_POST["submit"])){
    $blogger = new Blogger();
    $setPost = $blogger->setPost([

        "title" => $_POST["title"],
        "content" => $_POST["content"],

    ]);
    if($setPost){
        message("success","added with success");
        refresh("?page=setPost",1);
    }
}