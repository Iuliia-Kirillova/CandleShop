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
        $this->historyModel = new History;
        $this->candleModel = new Candle();
        $this->orderModel = new Order();
        $this->cartModel = new Cart();
    }


    public function actionAdmin()
    {
        $title = "Здравствуйте, Администратор!";

        if (!$this->checkAdmin) {
            echo "Sorry";
            header('Location: ' . FULL_SITE_ROOT . 'candles');
        }
        include_once('./views/admin/adminpanel.php');
        return true;
    }

    public function actionHistories()
    {
        $title = "История заказов";

        $orders = $this->historyModel->getHistory();

        include_once('./views/admin/histories.php');
    }

    public function actionHistory($id)
    {
        $title = "Подробности заказа";

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