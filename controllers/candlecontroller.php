<?php

class CandleController
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

    public function actionIndex($page = 1)
    {
        $title = 'Каталог свечей';
        $sum = $this->cartModel->getSumma();
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $candlesInfo = $this->candleModel->getList($offset, $limit);
        $candles = $candlesInfo['candles'];
        $count = $candlesInfo['count'];
        $pagination = new Pagination($count, $page, $limit, 'page=');

        include_once('./views/candle/index.php');
    }

    public function actionAdd()
    {
        $title = 'Добавить свечу';
        $errors = [];

        if (isset($_POST['candle_name'])) {

            $name = htmlentities($_POST['candle_name']);
            $name = mysqli_real_escape_string($this->connection, $name);

            $volume = $_POST['candle_volume'];

            $smell = htmlentities($_POST['candle_smell']);
            $smell = mysqli_real_escape_string($this->connection, $smell);

            $description = htmlentities($_POST['candle_description']);
            $description = mysqli_real_escape_string($this->connection, $description);

            $price = htmlentities($_POST['candle_price']);
            $price = mysqli_real_escape_string($this->connection, $price);

            if (empty($errors)) {
                $this->candleModel->addCandle(array(
                    'name' => $name,
                    'volume' => $volume,
                    'smell' => $smell,
                    'description' => $description,
                    'price' => $price
                ));
            }

            $id = $this->candleModel->getId();
            if (is_uploaded_file($_FILES['candle_img']['tmp_name'])) {
                move_uploaded_file($_FILES['candle_img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/oop_CS/assets/images/{$id}.jpg");}

            header('Location: ' . FULL_SITE_ROOT . 'candle/view/' . $id);
        }

        $volumes = $this->volumeModel->getAll();
        include_once('./views/candle/form.php');
    }

    public function actionEdit($id)
    {

        if (!isset($id)) {
            echo "Страница не найдена";
            exit();
        }

        $title = 'Редактировать';
        $errors = [];
        $candle = $this->candleModel->getById($id);

        if (isset($_POST['candle_name'])) {
        $name = htmlentities($_POST['candle_name']);
        $name = mysqli_real_escape_string($this->connection, $name);

        $smell = htmlentities($_POST['candle_smell']);
        $smell = mysqli_real_escape_string($this->connection, $smell);

        $description = htmlentities($_POST['candle_description']);
        $description = mysqli_real_escape_string($this->connection, $description);

        $price = htmlentities($_POST['candle_price']);
        $price = mysqli_real_escape_string($this->connection, $price);

        $volume = htmlentities($_POST['candle_volume']);

        if (empty($errors)) {
            $this->candleModel->editCandle(array(
                'name' => $name,
                'images' => $img,
                'volume' => $volume,
                'smell' => $smell,
                'description' => $description,
                'price' => $price
            ), $id);

            if (is_uploaded_file($_FILES['candle_img']['tmp_name'])) {
                move_uploaded_file($_FILES['candle_img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/oop_CS/assets/images/{$id}.jpg");}

            header('Location: ' . FULL_SITE_ROOT . 'candle/view/' . $id);
        }
    }
        $volumes = $this->volumeModel->getAll();
        include_once('./views/candle/form.php');
    }

    public function actionDelete($id)
    {
        if (!isset($id)) {
            echo "Страница не найдена";
            exit();
        }

        $this->candleModel->deleteCandle($id);
        header('Location: ' . FULL_SITE_ROOT . 'candles');
        include_once('./views/candle/form.php');
    }

    public function actionView($id)
    {
        $title = "Описание свечи";
        $sum = $this->cartModel->getSumma();
        $candle = $this->candleModel->getById($id);
        $volumes = $this->volumeModel->getByIdCandle($id);
        $userIsAlreadyVoted = $this->userModel->userAlreadyVoted($id);

        include_once('./views/candle/view.php');
    }

    public function actionMark($candleId, $value)
    {
        if (!$this->isAuthorized) {
            echo "Авторизируйтесь!";
            return;
        }
        $userId = $_COOKIE['uid'];
        if ($this->candleModel->mark($userId, $candleId, $value)) {
            echo 0;
        } else {
            echo "Не удалось добавить оценку";
        }
    }
}