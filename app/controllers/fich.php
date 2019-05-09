
<?php


class fich extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->model->render("fich");
        $this->view->render("pages/fich.php");

    }
}
