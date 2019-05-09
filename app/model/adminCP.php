<?php
requireAll([

    LIBS . "Required",

]);
function renderCompo($name){
    requireAll([

        VIEW ."pages/adminCP/" .$name,
        MODEL ."adminCP/" .$name,
    ]);
}
$required = new Required();
if($required->admin()):

    echo "hello ,admin";

else:
    require_once CONTROLLERS."Errors.php";
    $Error = new Errors();
    $Error->page404();
    exit();
endif;