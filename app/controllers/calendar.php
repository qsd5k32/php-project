
<?php


class calendar extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->model->render("calendar");
        $this->view->render("pages/calendar.php");
    }
}
