
<?php


class adminCP extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->model->render("adminCP");
        $this->view->render("pages/adminCP.php",0);
    }

}
