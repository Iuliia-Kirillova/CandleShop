<?php

class VolumeController
{
    private $volumeModel;
    public $isAuthorized;
    private $cartModel;
    public $checkAdmin;

    public function __construct()
    {
        $this->volumeModel = new Volume();
        $this->isAuthorized = (new User())->userIsAuthorized();
        $this->cartModel = new Cart();
        $this->checkAdmin = (new Admin())->checkAdmin();
    }

    public function actionIndex()
    {
        $title = 'Объемы';

        $sum = $this->cartModel->getSumma();

        $volumes = $this->volumeModel->getAll();
        include_once('./views/volume/index.php');
    }

    public function actionAdd()
    {
        $title = 'Добавить новое значение объема';
        include_once('./views/volume/form.php');

        if (isset($_POST['volume_value'])) {

            $value = htmlentities($_POST['volume_value']);

            $this->volumeModel->addVolume($value);

            header('Location: ' . FULL_SITE_ROOT . 'volumes');
        }
    }

    public function actionEdit($id)
    {

        if (!isset($id)) {
            echo "Страница не найдена";
            exit();
        }

        if (isset($_POST['volume_value'])) {

            $volume = htmlentities($_POST['volume_value']);
            $this->volumeModel->editVolume($volume, $id);
            header('Location: ' . FULL_SITE_ROOT . 'volumes');
        }

        $title = 'Редактировать объем';
        $volume = $this->volumeModel->getById($id);
        include_once('./views/volume/form.php');
    }

    public function actionDelete($id)
    {
        if (!isset($id)) {
            echo "Страница не найдена";
            exit();
        }

        $this->volumeModel->deleteVolume($id);
        header('Location: ' . FULL_SITE_ROOT . 'volumes');
    }

    public function actionView($id)
    {

    }
}