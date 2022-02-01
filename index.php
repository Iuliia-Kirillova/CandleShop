<?php

//echo "Hello World";


include_once('./components/autoload.php');
include_once('./config/constants.php');

//require_once('./views/common/header.php');
//require_once('./views/common/bg.php');
//require_once('./views/common/footer.php');


$router = new Router();
$router->run();
