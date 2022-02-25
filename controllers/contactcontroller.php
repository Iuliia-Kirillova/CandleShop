<?php
 class ContactController
 {
     public $isAuthorized;
     private $cartModel;
     private $contactModel;
     public $checkAdmin;

     public function __construct()
     {

         $this->isAuthorized = (new User())->userIsAuthorized();
         $this->cartModel = new Cart();
         $this->contactModel = new Contact();
         $this->checkAdmin = (new Admin())->checkAdmin();
     }
     public function actionContact()
     {
         $title = "Контакты";
         $sum = $this->cartModel->getSumma();
         $this->contactModel->showContact();
         include_once('./views/common/contact.php');
     }
 }