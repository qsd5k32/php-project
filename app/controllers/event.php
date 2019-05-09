
<?php


class event extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->model->render("event");
        $this->view->render("pages/event.php");

    }
}
