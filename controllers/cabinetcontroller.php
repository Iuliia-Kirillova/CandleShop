<?php

class CabinetController
{
    public $isAuthorized;
    private $connection;
    private $userModel;
    private $cartModel;
    public $checkAdmin;
    private $orderModel;

    public function __construct()
    {
        $this->isAuthorized = (new User())->userIsAuthorized();
        $this->userModel = new User();
        $this->connection = DB::getConnection();
        $this->cartModel = new Cart();
        $this->checkAdmin = (new Admin())->checkAdmin();
        $this->orderModel = new Order();
    }

    public function actionCabinet() {

        $title = 'Личный кабинет';
        $sum = $this->cartModel->getSumma();

        $user = $this->userModel->getUserById();

        include_once('./views/cabinet/cabinet.php');
    }

    public function actionEdit() {

        $title = 'Редактирование данных';
        $sum = $this->cartModel->getSumma();
        $errors = [];
        $user = $this->userModel->getUserById();
        $userId = $user['user_id'];

        $result = false;

        if (isset($_POST['user_name'])) {

            $name = htmlentities($_POST['user_name']);
            $name = mysqli_real_escape_string($this->connection, $name);
            if (!$name) {$errors[] = 'Введите логин!';}
            if (preg_match("/^[а-яА-Яa-z0-9_-]{2,20}$/i", $name)) {
            } else {
                $errors[] = 'В логине допускаются только латинские буквы, цифры, - и _';
            }

            $email = htmlentities($_POST['user_email']);
            $email = mysqli_real_escape_string($this->connection, $email);
            if (!$email) {$errors[] = 'Введите email!';}
            if (preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $email)) {
            } else {
                $errors[] = 'Введите корректный email!';
            }

            $phone = htmlentities($_POST['user_phone']);
            $phone = mysqli_real_escape_string($this->connection, $phone);
            if (!$phone) {$errors[] = 'Введите phone!';}
            if (preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $email)) {
            } else {
                $errors[] = 'Введите корректный телефон!';
            }

            $password = htmlentities($_POST['user_password']);
            $password = mysqli_real_escape_string($this->connection, $password);
            if (!$password) {$errors[] = 'Введите пароль!';}
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,12}$/", $password)) {
            } else {
                $errors[] = 'Пароль должен быть от 6 до 15 символов и содержать как минимум одну загланую букву и цифру!';
            }
            $repeatPassword = htmlentities($_POST['user_repeat_password']);
            $repeatPassword = mysqli_real_escape_string($this->connection, $repeatPassword);
            if ($password !== $repeatPassword) {
                $errors[] = 'Пароли не совпадают';
            }

            if (empty($errors)) {
//                $countRows = $this->userModel->checkIfLoginExists($login);
//                if ($countRows == 1) {
//                    $errors[] = 'Пользователь с таким логином уже есть';
//                }
//
//                $countRows = $this->userModel->checkIfEmailExists($email);
//                if ($countRows == 1) {
//                    $errors[] = 'Пользователь с таким email уже есть';
//                }

                if (empty($errors)) {
                    $this->userModel->editUser(array(
                        'name' => $name,
                        'password' => $password,
                        'phone' => $phone,
                        'email' => $email
                    ), $userId);
                    header('Location: ' . FULL_SITE_ROOT . 'profile');
                }
            }
        }
        include_once('./views/cabinet/edit.php');
    }

    public function actionHistory($id) {

        $title = "Ваши заказы";
        $sum = $this->cartModel->getSumma();

        $orders = $this->orderModel->getByUserId($id);
        print_r($orders);

        include_once('./views/cabinet/history.php');
        return true;
    }
}

