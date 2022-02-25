<?php

class AdminController
{

    public $isAuthorized;
    public $checkAdmin;
    private $historyModel;
    private $candleModel;
    private $orderModel;
    private $cartModel;

    public function __construct()
    {

        $this->isAuthorized = (new User())->userIsAuthorized();
        $this->checkAdmin = (new Admin())->checkAdmin();
//        $this->historyModel = new History;
        $this->candleModel = new Candle();
        $this->orderModel = new Order();
        $this->cartModel = new Cart();
    }


    public function actionAdmin()
    {
        $title = "Здравствуйте, Администратор!";
        $user = $_COOKIE['uid'];

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

        $orders = $this->orderModel->getHistory();

        include_once('./views/admin/history.php');
    }

    public function actionView($id)
    {
        $title = "Подробности заказа";

        $sum = $this->cartModel->getSumma();
        $total = 0;
        $order = $this->orderModel->getById($id);
        $candlesQuantity = json_decode($order['order_candles'], true);
        $candlesIds = array_keys($candlesQuantity);
        $candles = $this->candleModel->getByIds($candlesIds);

        foreach ($candles as $candle) {
            $total += $candle['candle_price'] * $candlesQuantity[$candle['candle_id']];
        };

        include_once('./views/admin/view.php');
        return true;
    }

}