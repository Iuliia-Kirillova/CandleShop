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

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary"></a>
            </li>
            <li><a href="<?= FULL_SITE_ROOT . 'candles'; ?>"
                   class="nav-link px-2 link-dark <?= $title === 'Каталог свечей' ? 'active' : ''; ?>">Каталог
                    свечей</a></li>
            <li><a href="<?= FULL_SITE_ROOT . 'about'; ?>" class="nav-link px-2 link-dark">Про нас</a></li>
            <li><a href="<?= FULL_SITE_ROOT . 'contact'; ?>" class="nav-link px-2 link-dark">Контакты</a></li>
        </ul>

        <div class="col-md-3 text-center">

            <a type="button" class="btn btn-primary"
               href="<?= FULL_SITE_ROOT . 'basket'; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4"
                     viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                (<span id="cart_count"><?php echo $sum ?></span>)</a>


            <?php if (!$this->isAuthorized): ?>

                <a type="button"
                   class="btn btn-outline-primary <?= $title === 'Авторизация' ? 'active' : ''; ?>"
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