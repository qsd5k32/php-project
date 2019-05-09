
<?php


class sup extends controller{


    public function index()
    {

        parent::view();
        parent::model();
        $this->view->render("pages/sup.php");
        $this->model->render("sup");

    }
}
