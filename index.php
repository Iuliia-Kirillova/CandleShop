<?php

//echo "Hello World";

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);


include_once('./components/autoload.php');
include_once('./config/constants.php');

//require_once('./views/common/header.php');
//require_once('./views/common/main.php');
//require_once('./views/common/footer.php');


$router = new Router();
$router->run();
