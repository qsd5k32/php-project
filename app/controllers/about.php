
<?php


class about extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->view->render("pages/about.php");

    }
}
