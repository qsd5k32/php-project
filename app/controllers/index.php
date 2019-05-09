
<?php


class index extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->view->render("pages/index.php");
        $this->model->render("index",0);
    }
}
