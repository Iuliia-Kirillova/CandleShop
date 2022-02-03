<?php



class errorController {

    public $isAuthorized;

    public function actionError()
    {
        $title = 'Ooops...';
        header("HTTP/1.0 404 Not Found");
        include_once('./views/common/error.php');
    }
}



//include_once('./views/candle/index.php');