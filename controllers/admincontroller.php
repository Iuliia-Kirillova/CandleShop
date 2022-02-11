<?php

class AdminController
{

    public $isAuthorized;
    public $checkAdmin;



    public function __construct()
    {

        $this->isAuthorized = (new User())->userIsAuthorized();
        $this->checkAdmin = (new Admin())->checkAdmin();
    }


    public function actionAdmin()
    {
        $title = "AdminPanel";

        if (!$this->checkAdmin) {
            echo "Sorry";
            header('Location: ' . FULL_SITE_ROOT . 'candles');
        }
        include_once('./views/admin/adminpanel.php');
        return true;
    }


}