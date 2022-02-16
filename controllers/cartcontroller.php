<?php

class CartController
{
    private $cartModel;
    private $candleModel;
    private $userModel;
    private $connection;
    private $orderModel;
    public $isAuthorized;
    public $checkAdmin;

    public function __construct()
    {
        $this->candleModel = new Candle();
        $this->cartModel = new Cart;
        $this->userModel = new User();
        $this->orderModel = new Order();
        $this->connection = DB::getConnection();
        $this->isAuthorized = (new User())->userIsAuthorized();
    }

    public function actionAdd($id)
    {
        echo $this->cartModel->addCandle($id);
        return true;
    }

    public function actionCart()
    {
        $title = "Cart";
        $candleInCard = false;

        $candleInCart = $this->cartModel->getCandlesInCart();
        $sum = $this->cartModel->getSumma();

        if ($candleInCart) {
            $candelesId = array_keys($candleInCart);
            $candles = $this->candleModel->getByIds($candelesId);

            $totalPrice = $this->cartModel->getTotalPrice($candles);

        }
        include_once('./views/cart/cart.php');
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
            if (preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $phone)) {
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

                $result = $this->orderModel->save($name, $phone, $comment, $userId, $candlesInCart);

                if ($result) {
                    $adminEmail = 'yvkirillova@yandex.ru';
                    $message = '...';
                    $subject = 'New order!';
                    // TODO: отправка заказа на электронную почту
                    $this->cartModel->clear();
                    $this->cartModel->getSumma();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $candleInCart = $this->cartModel->getCandlesInCart();
                $candlesIds = array_keys($candleInCart);
                $candles = $this->candleModel->getByIds($candlesIds);
                $totalPrice = $this->cartModel->getTotalPrice($candles);
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
//                    $userId = $_COOKIE['uid'];
                    $user = $this->userModel->getUserById();
                    // Подставляем в форму
                    $name = $user['user_name'];
                    $phone = $user['user_phone'];
                } else {
                    // Значения для формы пустые
                }
            }
        }
        include_once('./views/cart/checkout.php');

        return true;
    }

    public function actionDelete($id)
    {
        if (!isset($id)) {
            echo "Страница не найдена";
            exit();
        }

        header('Location: ' . FULL_SITE_ROOT . 'cart');
    }
}
