<?php
/**
 * Created by PhpStorm.
 * User: med
 * Date: 28/05/18
 * Time: 04:16 م
 */

class Upload
{
    public $path;
    public $tmpPath;
    public $Errors;
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    // check if file is image
    protected function imageCheck($i = 0)
    {

        if(getimagesize($this->file['tmp_name'][$i]))
        {
            return true;
        }
        else
            {
            $this->Errors = "You can upload just images : ".$this->file['name']."this file format not accepted";
            return false;
        }

    }


    //upload pdf files
    public function pdf($dir,$prefix){
        $this->tmpPath = "$dir/$prefix".time().".pdf";
        if($this->file['type'] == "application/pdf"){
            if (move_uploaded_file($this->file['tmp_name'], $this->tmpPath)) {
                $this->path = $this->tmpPath;
                return true;
            }else {
                $this->Errors = "can't upload now pleas try again";
            }

        }
        return false;


    }

    // upload file
    public function image($dir,$prefix)
    {
        foreach ($this->file['error'] as $i => $j)
        {
            $this->tmpPath = "$dir/$prefix".time().$i.".png";
            if ($this->imageCheck($i)) {
                if (move_uploaded_file($this->file['tmp_name'][$i], $this->tmpPath)) {

                    $this->path[] = $this->tmpPath;

                } else {
                    $this->Errors = "can't upload now pleas try again";
                }

            }
        }
        if(!empty($this->path && empty($this->Errors))){
            return true;
        }else{
            return false;
        }
    }





}