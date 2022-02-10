<?php
 class ContactController
 {
     public $isAuthorized;
     private $cartModel;
     private $contactModel;

     public function __construct()
     {

         $this->isAuthorized = (new User())->userIsAuthorized();
         $this->cartModel = new Cart();
         $this->contactModel = new Contact();
     }
     public function actionContact()
     {
         $title = "Contact";
         $sum = $this->cartModel->getSumma();
         $this->contactModel->showContact();
         include_once('./views/common/contact.php');
     }
 }