<?php

class CartController
{
    private $cartModel;
    private $candleModel;
    public $isAuthorized;

    public function __construct()
{
    $this->candleModel = new Candle();
    $this->cartModel = new Cart;
    $this->isAuthorized = (new User())->userIsAuthorized();
}

    public function actionAdd($id)
    {
        $this->cartModel->addCandle($id);
        header('Location: ' . FULL_SITE_ROOT . 'candles');
    }

    public function actionAddAjax($id)
    {
        echo $this->cartModel->addCandle($id);
        return true;
    }

    public function actionBasket()
    {
        $title = "Basket";
        $candleInCard = false;

        $candleInCart = $this->cartModel->getCandlesInCart();
        $sum = $this->cartModel->getSumma();

        if ($candleInCart) {
            $candelesId = array_keys($candleInCart);
            $candles = $this->candleModel->getByIds($candelesId);

            $totalPrice = $this->cartModel->getTotalPrice($candles);


        }
        include_once('./views/basket/basket.php');
        include_once('./views/common/header.php');

        return true;
    }
}