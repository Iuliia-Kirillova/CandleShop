<?php

class AdminController
{

    public $isAuthorized;
    public $checkAdmin;
    private $historyModel;
    private $candleModel;

    public function __construct()
    {

        $this->isAuthorized = (new User())->userIsAuthorized();
        $this->checkAdmin = (new Admin())->checkAdmin();
        $this->historyModel = new History;
        $this->candleModel = new Candle();
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

    public function actionHistory()
    {
        $title = "История заказов";

        $orders = $this->historyModel->getHistory();
        print_r($orders);

//        $candlesQuantity = json_decode($orders['order_candles'], true);
//        $candlesIds = array_keys($candlesQuantity);
//        $candles = $this->candleModel->getById($candlesIds);

        include_once('./views/admin/history.php');

    }
}