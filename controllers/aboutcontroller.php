<?php
 class AboutController
 {
     public $isAuthorized;
     private $cartModel;
     private $aboutModel;
     public $checkAdmin;

     public function __construct()
     {
         $this->isAuthorized = (new User())->userIsAuthorized();
         $this->cartModel = new Cart();
         $this->aboutModel = new About();
         $this->checkAdmin = (new Admin())->checkAdmin();
     }
     public function actionAbout()
     {
         $title = "About";
         $sum = $this->cartModel->getSumma();
         $this->aboutModel->showAbout();
         include_once('./views/common/about.php');
     }
 }