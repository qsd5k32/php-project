
<?php


class services extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->view->render("pages/services.php");

    }
}
