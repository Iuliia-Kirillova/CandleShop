<?php



class errorController {

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


    public function actionError()
    {
        $title = 'Ooops...';

        $sum = $this->cartModel->getSumma();

        header("HTTP/1.0 404 Not Found");
        include_once('./views/common/error.php');
    }
}



