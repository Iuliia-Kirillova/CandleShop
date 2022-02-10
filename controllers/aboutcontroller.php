<?php
 class AboutController
 {
     public $isAuthorized;
     private $cartModel;
     private $aboutModel;

     public function __construct()
     {

         $this->isAuthorized = (new User())->userIsAuthorized();
         $this->cartModel = new Cart();
         $this->aboutModel = new About();
     }
     public function actionAbout()
     {
         $title = "About";
         $sum = $this->cartModel->getSumma();
         $this->aboutModel->showAbout();
         include_once('./views/common/about.php');
     }
 }