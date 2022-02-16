<?php

class MainController
{
    private $candleModel;
    private $volumeModel;
    private $userModel;
    private $connection;
    public $isAuthorized;
    public $checkAdmin;
    private $cartModel;

    public function __construct()
    {
        $this->candleModel = new Candle();
        $this->volumeModel = new Volume();
        $this->userModel = new User();
        $this->connection = DB::getConnection();
        $this->isAuthorized = (new User())->userIsAuthorized();
        $this->checkAdmin = (new Admin())->checkAdmin();
        $this->cartModel = new Cart();
    }

    public function actionMain()
    {
        $title = "";
        include_once('./views/common/main.php');
    }
}