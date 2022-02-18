<!doctype html>
<html lang=ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $title; ?></title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= IMG . 'favicons/apple-touch-icon.png' ?>"/>
    <link rel="icon" type="image/png" sizes="32x32" href="<?= IMG . 'favicons/favicon-32x32.png' ?>"/>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= IMG . 'favicons/favicon-16x16.png' ?>"/>
    <link rel="manifest" href="<?= IMG . 'favicons/site.webmanifest' ?>"/>
    <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers"/>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Abril+Fatface&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet"/>


    <link rel="stylesheet" href="<?= ASSETS . 'vendors/bootstrap/bootstrap.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/bootstrap-select/bootstrap-select.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/animate/animate.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/fontawesome/css/all.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/jarallax/jarallax.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/organik-icon/organik-icons.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/jquery-magnific-popup/jquery.magnific-popup.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/nouislider/nouislider.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/nouislider/nouislider.pips.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/odometer/odometer.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/swiper/swiper.min.css'; ?>"/>
    <link rel="stylesheet" href="<?= ASSETS . 'vendors/tiny-slider/tiny-slider.min.css'; ?>"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <!-- template styles -->
    <link rel="stylesheet" href="<?= CSS . 'organik.css'; ?>">
    <link rel="stylesheet" href="<?= CSS . 'style.css'; ?>">
</head>
<body>


<header class="main-header">
    <div class="topbar">
        <div class="container">
            <div class="main-logo">
                <a href="<?= FULL_SITE_ROOT . 'main'; ?>" class="logo">
                    <img src="<?= IMG . 'candles (1).png' ?>" width="105" alt="">
                </a>
                <div class="mobile-nav__buttons">
                    <?php if ($this->checkAdmin): ?>
                        <a href="<?= FULL_SITE_ROOT . 'admin'; ?>"
                        <i class="bi bi-controller"></i>
                        </a>
                    <?php else: ?>
                    <?php if ($this->isAuthorized): ?>
                        <a href="<?= FULL_SITE_ROOT . 'cabinet'; ?>">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    <?php endif; ?>

                    <a href="<?= FULL_SITE_ROOT . 'cart'; ?>">
                        <i class="bi bi-cart2"></i></a>
                    <?php endif; ?>
                </div><!-- /.mobile__buttons -->

                <span class="fa fa-bars mobile-nav__toggler"></span>
            </div><!-- /.main-logo -->

            <div class="topbar__left">
                <div class="topbar__social">
                    <a href="#" class="fab fa-whatsapp" style="text-decoration: none"></a>
                    <a href="#" class="fab fa-facebook-square" style="text-decoration: none"></a>
                    <a href="#" class="fab fa-instagram" style="text-decoration: none"></a>
                </div><!-- /.topbar__social -->
                <div class="topbar__info">
                    <i class="organik-icon-email"></i>
                    <p>Email <a href="mailto:info@organik.com">info@candleshop.com</a></p>
                </div><!-- /.topbar__info -->
            </div><!-- /.topbar__left -->
            <div class="topbar__right">
                <div class="topbar__info">
                    <i class="organik-icon-calling"></i>
                    <p>Phone<a href="tel:+92-666-888-0000">+7(921)123-45-67</a></p>
                </div><!-- /.topbar__info -->
                <div class="topbar__buttons">
                <?php if ($this->checkAdmin): ?>
                    <a href="<?= FULL_SITE_ROOT . 'admin'; ?>"
                    <i class="bi bi-controller"></i>
                    </a>
                    <?php else: ?>

                    <?php if ($this->isAuthorized): ?>
                    <div class="topbar__buttons">
                        <a href="<?= FULL_SITE_ROOT . 'cabinet'; ?>">
                            <i class="bi bi-person-circle"></i></a>
                        <?php endif; ?>
                        <a href="<?= FULL_SITE_ROOT . 'cart'; ?>" style="text-decoration: none">
                            <i class="bi bi-cart2"></i>
                            (<span id="cart_count"><?php echo $sum ?></span>)</a>
                    <?php endif; ?>

                    </div><!-- /.topbar__buttons -->
                </div><!-- /.topbar__left -->

            </div><!-- /.container -->
        </div><!-- /.topbar -->
        <nav class="main-menu">
            <div class="container">
                <div class="main-menu__login">
                    <?php if (!$this->isAuthorized): ?>
                        <a href="<?= FULL_SITE_ROOT . 'auth'; ?>"><i class="organik-icon-user"></i>Login / Register</a>
                    <?php else: ?>
                        <a href="<?= FULL_SITE_ROOT . 'logout'; ?>"><i class="organik-icon-user"></i>Logout</a>
                    <?php endif; ?>
                </div><!-- /.main-menu__login -->
                <ul class="main-menu__list">
                    <li>
                        <a href="<?= FULL_SITE_ROOT . 'main'; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?= FULL_SITE_ROOT . 'about'; ?>">About</a>
                    </li>
                    <li>
                        <a href="<?= FULL_SITE_ROOT . 'candles'; ?>">Shop</a>
                    </li>
                    <li><a href="<?= FULL_SITE_ROOT . 'contact'; ?>">Contact</a></li>
                </ul>

            </div><!-- /.container -->
        </nav>
        <!-- /.main-menu -->
</header><!-- /.main-header -->

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="organik-icon-close"></i></span>

        <div class="logo-box">
            <a href="index.html" aria-label="logo image"><img src="<?= IMG . 'candles.png' ?>" width="155"
                                                              alt=""/></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="organik-icon-email"></i>
                <a href="mailto:needhelp@organik.com">needhelp@organik.com</a>
            </li>
            <li>
                <i class="organik-icon-calling"></i>
                <a href="tel:666-888-0000">666 888 0000</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <!-- /.mobile-nav__language -->
            <div class="main-menu__login">
                <?php if (!$this->isAuthorized): ?>
                    <a href="<?= FULL_SITE_ROOT . 'auth'; ?>"><i class="organik-icon-user"></i>Login / Register</a>
                <?php else: ?>
                    <a href="<?= FULL_SITE_ROOT . 'logout'; ?>"><i class="organik-icon-user"></i>Logout</a>
                <?php endif; ?>
            </div><!-- /.main-menu__login -->
        </div><!-- /.mobile-nav__top -->


    </div>
    <!-- /.mobile-nav__content -->
</div>

<section class="page-header">
    <div class="page-header__bg" style="background-image: url(<?= IMG . 'backgrounds/1.jpg' ?>);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <h2><?= $title ?></h2>

    </div><!-- /.container -->
</section><!-- /.page-header -->

<!--<div class="m>

<h1 style="text-align:center"> <?= $title; ?> </h1>







<?php //if ($this->checkAdmin): ?>
<!---->
<!--<div class="container">-->
<!---->
<!--    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">-->
<!--        <a href="--><?php //= FULL_SITE_ROOT . 'candles' ?><!--"-->
<!--           class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">-->
<!--            <img-->
<!--                    src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-candles-buddhism-icongeek26-outline-icongeek26.png"/>-->
<!--            </svg>-->
<!--        </a>-->
<!--        <div>-->
<!--            <a type="button" class="btn btn-primary"-->
<!--               href="--><?php //= FULL_SITE_ROOT . 'admin'; ?><!--">AdminPanel</a>-->
<!--            <a type="button" class="btn btn-outline-primary me-2"-->
<!--               href="--><?php //= FULL_SITE_ROOT . 'logout'; ?><!--">Exit</a>-->
<!--        </div>-->
<!---->
<!--    </header>-->
<!---->
<!--    --><?php //else: ?>
<!---->
<!--        <div class="container">-->
<!--            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">-->
<!--                <a href="--><?php //= FULL_SITE_ROOT . 'main' ?><!--"-->
<!--                   class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">-->
<!--                    <img-->
<!--                            src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/000000/external-candles-buddhism-icongeek26-outline-icongeek26.png"/>-->
<!--                    </svg>-->
<!--                </a>-->
<!---->
<!--                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">-->
<!--                    <li><a href="#" class="nav-link px-2 link-secondary"></a>-->
<!--                    </li>-->
<!--                    <li><a href="--><?php //= FULL_SITE_ROOT . 'candles'; ?><!--"-->
<!--                           class="nav-link px-2 link-dark -->
<?php //= $title === 'Каталог свечей' ? 'active' : ''; ?><!--">Каталог-->
<!--                            свечей</a></li>-->
<!--                    <li><a href="-->
<?php //= FULL_SITE_ROOT . 'about'; ?><!--" class="nav-link px-2 link-dark">Про нас</a></li>-->
<!--                    <li><a href="-->
<?php //= FULL_SITE_ROOT . 'contact'; ?><!--" class="nav-link px-2 link-dark">Контакты</a></li>-->
<!--                </ul>-->
<!---->
<!--                <div class="col-md-3 text-center">-->
<!---->
<!--                    <a type="button" class="btn btn-primary"-->
<!--                       href="--><?php //= FULL_SITE_ROOT . 'cart'; ?><!--">-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
<!--                             class="bi bi-cart4"-->
<!--                             viewBox="0 0 16 16">-->
<!--                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>-->
<!--                        </svg>-->
<!--                        (<span id="cart_count">--><?php //echo $sum ?><!--</span>)</a>-->
<!---->
<!--                    --><?php //if (!$this->isAuthorized): ?>
<!---->
<!--                        <a type="button"-->
<!--                           class="btn btn-outline-primary -->
<?php //= $title === 'Авторизация' ? 'active' : ''; ?><!--"-->
<!--                           href="--><?php //= FULL_SITE_ROOT . 'auth'; ?><!--">Login</a>-->
<!--                        <a type="button" class="btn btn-primary -->
<?php //= $title === 'Регистрация' ? 'active' : ''; ?><!--"-->
<!--                           href="--><?php //= FULL_SITE_ROOT . 'reg'; ?><!--">Sign-up</a>-->
<!---->
<!--                    --><?php //else: ?>
<!--                        --><?php //if (!$this->checkAdmin): ?>
<!--                            <a type="button" class="btn btn-primary"-->
<!--                               href="--><?php //= FULL_SITE_ROOT . 'cabinet'; ?><!--">Profile</a>-->
<!---->
<!--                        --><?php //endif; ?>
<!--                        <a type="button" class="btn btn-outline-primary me-2"-->
<!--                           href="--><?php //= FULL_SITE_ROOT . 'logout'; ?><!--">Exit</a>-->
<!--                    --><?php //endif; ?>
<!---->
<!--                </div>-->
<!--            </header>-->
<!--        </div>-->
<!---->
<!--    --><?php //endif; ?>



