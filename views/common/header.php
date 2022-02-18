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
                    <?php if ($this->isAuthorized): ?>
                        <a href="<?= FULL_SITE_ROOT . 'cabinet'; ?>"
                           style="text-decoration: none">
                            <img src="<?= IMG . 'user.png'; ?>" width="45px" alt=""></a>
                    <?php endif; ?>
                    <a href="<?= FULL_SITE_ROOT . 'cart'; ?>"
                       style="text-decoration: none">
                        <img src="<?= IMG . 'cart.png'; ?>" width="45px" alt=""></a>
                    </a>
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
                <?php if (!$this->checkAdmin): ?>
                <div class="topbar__buttons">
                    <?php if ($this->isAuthorized): ?>
                        <a href="<?= FULL_SITE_ROOT . 'cabinet'; ?>"
                           style="text-decoration: none">
                            <img src="<?= IMG . 'user.png'; ?>" width="45px" alt=""></a>
                    <?php endif; ?>
                    <a href="<?= FULL_SITE_ROOT . 'cart'; ?>"
                       style="text-decoration: none">
                        <img src="<?= IMG . 'cart.png'; ?>" width="45px" alt="">
                        (<span id="cart_count"><?php echo $sum ?></span>)</a>
                    <?php else: ?>
                    <div class="topbar__buttons">
                        <a href="<?= FULL_SITE_ROOT . 'admin'; ?>"
                           style="text-decoration: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                 class="bi bi-controller" viewBox="0 0 16 16">
                                <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
                                <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/>
                            </svg>
                        </a>
                        <?php endif; ?>
                    </div><!-- /.topbar__buttons -->
                </div><!-- /.topbar__left -->

            </div><!-- /.container -->
        </div><!-- /.topbar -->
        <nav class="main-menu">
            <div class="container">
                <div class="main-menu__login">
                    <?php if (!$this->isAuthorized): ?>
                        <a href="<?= FULL_SITE_ROOT . 'reg'; ?>"><i class="organik-icon-user"></i>Login / Register</a>
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
                    <a href="<?= FULL_SITE_ROOT . 'reg'; ?>"><i class="organik-icon-user"></i>Login / Register</a>
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



