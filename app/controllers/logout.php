
<?php


class logout extends controller{

    public function index()
    {
        parent::view();
        parent::model();
        $this->model->render("logout",0);
    }
}
