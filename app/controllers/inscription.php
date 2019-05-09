
<?php


class inscription extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->view->render("pages/inscription.php");
        $this->model->render("inscription");
    }
}
