
<?php


class bio extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->model->render("bio");
        $this->view->render("pages/bio.php");

    }
}
