<!doctype html>
<html lang=ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= CSS . 'style.css'; ?>">
    <link rel="stylesheet" href="<?= LIBS . 'bootstrap/css/bootstrap.css'; ?>">
    <link rel="stylesheet" href="<?= LIBS . 'fontawesome/css/all.css'; ?>">
    <script src="<?= LIBS . 'bootstrap/js/bootstrap.js'; ?>"></script>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="<?= FULL_SITE_ROOT . 'candles' ?>"
           class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img
                    src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-candles-buddhism-icongeek26-outline-icongeek26.png"/>
            </svg>
        </a>
        <a type="button" class="btn btn-outline-primary me-2"
           href="<?= FULL_SITE_ROOT . 'logout'; ?>">Exit</a>
    </header>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Добрый день, администратор!</h4>

            <br/>

            <p>Вам доступны такие возможности:</p>

            <br/>

            <ul>
                <li><a href="">Управление товарами</a></li>

                <li><a href="">Управление заказами</a></li>
            </ul>

        </div>
    </div>
</section>


<?php include_once('./views/common/footer.php'); ?>