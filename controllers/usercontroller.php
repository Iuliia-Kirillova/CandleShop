<?php

class UserController
{
    private $userModel;
    private $connection;

    public function __construct()
    {
        $this->userModel = new User();
        $this->connection = DB::getConnection();
    }

    public function actionReg()
    {
        $title = "Регистрация";
        $errors = [];

        if (isset($_POST['user_login'])) {

            $login = htmlentities($_POST['user_login']);
            $login = mysqli_real_escape_string($this->connection, $login);
            if (!$login) {$errors[] = 'Введите логин!';}
            if (preg_match("/^[a-z0-9_-]{2,20}$/i", $login)) {
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
                $countRows = $this->userModel->checkIfLoginExists($login);
                if ($countRows == 1) {
                    $errors[] = 'Пользователь с таким логином уже есть';
                }

                $countRows = $this->userModel->checkIfEmailExists($email);
                if ($countRows == 1) {
                    $errors[] = 'Пользователь с таким email уже есть';
                }

                if (empty($errors)) {
                    $password = md5($password);
                    $userId =  $this->userModel->register($login, $email, $password);
                    $this->userModel->auth($userId);
                    header('Location: ' . FULL_SITE_ROOT . 'candles');
                }
            }
        }

        require_once('./views/user/reg.php');
    }

    public function actionAuth()
    {
        $title = "Авторизация";
        $errors = [];

        if (isset($_POST['user_login'])) {

            $login = htmlentities($_POST['user_login']);
            $login = mysqli_real_escape_string($this->connection, $login);

            $password = htmlentities($_POST['user_password']);
            $password = mysqli_real_escape_string($this->connection, $password);
            $password = md5($password);

            $userId = $this->userModel->checkUserByLoginAndPassword($login, $password);
            if ($userId > 0) {
                $this->userModel->auth($userId);
                header('Location: ' . FULL_SITE_ROOT . 'candles');
            } else {
                $errors[] = 'Такой связки логин/пароль не найдено!';
            }


        }
        require_once('./views/user/auth.php');
    }

    public function actionLogout() {
        $this->userModel->logout();
        header('Location: ' . FULL_SITE_ROOT . 'candles');
    }

}