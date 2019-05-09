<?php




define("SP" , DIRECTORY_SEPARATOR);
define("APP", "..".SP."app".SP);
define("PUBLIC_DIR", APP."public".SP);
define("CONFIG",APP."config".SP);
define("LIBS",APP."libs".SP);
define("MODEL",APP."model".SP);
define("CONTROLLERS",APP."controllers".SP);
define("VIEW",APP."view".SP);
define("CORE",APP."core".SP);



function requireAll($data = [],$html = false){
    if($html === false){
        foreach ($data as $file){
            require_once $file . ".php";
        }
    }else{
        foreach ($data as $file){
            require_once $file . ".html";
        }
    }
}
function refresh($to,$sec){
    echo "<meta http-equiv='refresh' content='$sec;$to'>";
}
function message($type,$content){
    echo"<div class='alert alert-$type w-100 text-center'>$content</div>";
}