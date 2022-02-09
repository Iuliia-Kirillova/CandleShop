<?php

class CartController
{
    private $cartModel;
    private $candleModel;
    private $userModel;
    public $isAuthorized;

    public function __construct()
    {
        $this->candleModel = new Candle();
        $this->cartModel = new Cart;
        $this->userModel = new User();
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

    public function actionCheckOut()
    {
        $title = "Оформление заказа";
        $sum = $this->cartModel->getSumma();
        $result = 0;
        $errors = [];

        if (isset($_POST['submit'])) {   //Форма отправлена? - Да
            // Считываем данные формы
            $name = htmlentities($_POST['user_name']);
            $name = mysqli_real_escape_string($this->connection, $name);
            if (!$name) {
                $errors[] = 'Введите логин!';
            }
            if (preg_match("/^[а-яА-Яa-z0-9_-]{2,20}$/i", $name)) {
            } else {
                $errors[] = 'В логине допускаются только латинские буквы, цифры, - и _';
            }

            $phone = htmlentities($_POST['user_phone']);
            $phone = mysqli_real_escape_string($this->connection, $phone);
            if (!$phone) {
                $errors[] = 'Введите phone!';
            }
            if (preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $phone)) {
            } else {
                $errors[] = 'Введите корректный телефон!';
            }

            $comment = htmlentities($_POST['user_comment']);

            if (empty($errors)) {
                $candlesInCart = $this->cartModel->getCandlesInCart();
                if ($this->userModel->userIsAuthorized()) {
                    $userId = $_COOKIE['uid'];
                } else {
                    $userId = false;
                }

                $result = $this->orderModel->save();

                if ($result) {
                    $adminEmail = 'yvkirillova@yandex.ru';
                    $message = '...';
                    $subject = 'New order!';
                    mail($adminEmail, $subject, $message);
                    $this->cartModel->clear();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $candleInCart = $this->cartModel->getCandlesInCart();
                $candlesIds = array_keys($candleInCart);
                $candles = $this->candleModel->getByIds($candlesIds);
                $totalPrice = $this->cartModel->getTotalPrice();
                $totalQuantity = $this->cartModel->getSumma();
            }

        } else {
            // Форма отправлена? - Нет
            // Получием данные из корзины
            $candleInCart = $this->cartModel->getCandlesInCart();

            // В корзине есть товары?
            if ($candleInCart == false) {
                // В корзине есть товары? - Нет
                // Отправляем пользователя на главную искать товары
                header('Location: ' . FULL_SITE_ROOT . 'candles');
            } else {
                $candlesIds = array_keys($candleInCart);
                $candles = $this->candleModel->getByIds($candlesIds);
                $totalPrice = $this->cartModel->getTotalPrice($candles);
                $totalQuantity = $this->cartModel->getSumma();

                $name = false;
                $phone = false;
                $comment = false;

                if ($this->userModel->userIsAuthorized()) {
                    // Да, авторизирован
                    // Получаем информацию о пользователе из БД по id
                    $userId = $_COOKIE['uid'];
                    $user = $this->userModel->getUserById($userId);
                    // Подставляем в форму
                    $user = $user['user_name'];
//                    $phone = $user['user_phone'];
                } else {
                    // Нет
                    // Значения для формы пустые
                }
            }
        }
        include_once('./views/basket/checkout.php');

        return true;
    }
}
