<?php
//ini_set("error_reporting", E_ALL);
//ini_set("display_errors", 1);
//ini_set("display_startup_errors", 1);
class CandleController
{
    private $candleModel;
    private $volumeModel;
    private $userModel;
    private $connection;
    public $isAuthorized;

    public function __construct()
    {
        $this->candleModel = new Candle();
        $this->volumeModel = new Volume();
        $this->userModel = new User();
        $this->connection = DB::getConnection();
        $this->isAuthorized = (new User())->userIsAuthorized();
    }

    public function actionIndex($page = 1)
    {
        $title = 'Каталог свечей';
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

            $img = htmlentities($_POST['candle_img']);
            $img = mysqli_real_escape_string($this->connection, $img);

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
                    'img' => $img,
                    'volume' => $volume,
                    'smell' => $smell,
                    'description' => $description,
                    'price' => $price
                ));
            }
            header('Location: ' . FULL_SITE_ROOT . 'candles');
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

        $img = htmlentities($_POST['candle_img']);
        $img = mysqli_real_escape_string($this->connection, $img);

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
                'img' => $img,
                'volume' => $volume,
                'smell' => $smell,
                'description' => $description,
                'price' => $price
            ), $id);
            header('Location: ' . FULL_SITE_ROOT . 'candles');
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
        $candle = $this->candleModel->getById($id);
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