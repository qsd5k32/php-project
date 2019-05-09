<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 30/05/18
 * Time: 12:21 ص
 */

class Required
{
    public function __construct()
    {
        error_reporting(0);
    }

    // check login
    public function login(){

        if($_SESSION['login']){

            return true;

        }else{

            return false;

        }
    }

    // check admin
    public function admin(){

        if($_SESSION['admin'] == "123"){

            return true;

        }else{

            return false;

        }

    }

}