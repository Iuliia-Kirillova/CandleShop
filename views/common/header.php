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
        <a href="<?= FULL_SITE_ROOT . 'candles' ?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img
                    src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-candles-buddhism-icongeek26-outline-icongeek26.png"/>
            </svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary"></a>
            </li>
            <li><a href="<?= FULL_SITE_ROOT . 'candles'; ?>"
                   class="nav-link px-2 link-dark <?= $title === 'Каталог свечей' ? 'active' : ''; ?>">Каталог
                    свечей</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Про нас</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Контакты</a></li>
        </ul>

        <div class="col-md-3 text-end">

            <?php if (!$this->isAuthorized): ?>

                <a type="button"
                   class="btn btn-outline-primary me-2 <?= $title === 'Авторизация' ? 'active' : ''; ?>"
                   href="<?= FULL_SITE_ROOT . 'auth'; ?>">Login</a>
                <a type="button" class="btn btn-primary <?= $title === 'Регистрация' ? 'active' : ''; ?>"
                   href="<?= FULL_SITE_ROOT . 'reg'; ?>">Sign-up</a>

            <?php else: ?>

                <a type="button" class="btn btn-primary"
                   href="<?= FULL_SITE_ROOT . 'profile'; ?>">Profile</a>
                <a type="button" class="btn btn-outline-primary me-2"
                   href="<?= FULL_SITE_ROOT . 'logout'; ?>">Exit</a>

            <?php endif; ?>

        </div>
    </header>
</div>

<h1 style="text-align:center"> <?= $title; ?> </h1>