<?php
/*
 * info validation
 *
 * */
function validate($var,$type){
    if ($type == "name"){
        if (preg_match("/[^a-z-A-Z ]/i", $var)){
            return $var;
        }
        return false;
    }
    if ($type == "idea"){
        if (preg_match("/[^a-z-A-Z0-9]/i", $var)) {
            return $var;
        }
        return false;
    }
    if ($type == "password"){
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}$/",$var)){
            return $var;
        }
        return false;
    }
    if ($type == "url"){
        if (preg_match("/[^A-Za-z0-9\s]+$/",$var)){
            return $var;
        }
        return false;
    }
    if ($type == "email"){
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$var)){
            return $var;
        }
        return false;
    }
    if ($type == "address"){
        if (preg_match("/[^a-z-A-Z\ 0-9]/i", $var)) {
            return $var;
        }
        return false;
    }
    if ($type == "message"){
        if (preg_match("/[^a-z-A-Z\ 0-9_-]/i", $var)) {
            return $var;
        }
        return false;
    }
    if ($type == "text"){
        if (preg_match("/[^a-z-A-Z\ 0-9_@.].{2,20}$/i", $var)) {
            return $var;
        }
        return false;
    }
    if ($type == "phone"){
        if (preg_match("/[^0-9]/i", $var)) {
            return $var;
        }
        return false;
    }
    if($type == "check"){
        if (preg_match("/[^a-z-A-Z0-9]/i", $var)) {
            return $var;
        }
        return false;
    }
    return null;
}
/**
 *
 */