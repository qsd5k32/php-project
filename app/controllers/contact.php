
<?php


class contact extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->view->render("pages/contact.php");
        $this->model->render("contact",0);
    }
}
