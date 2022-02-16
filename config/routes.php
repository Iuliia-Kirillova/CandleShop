<?php

    $routes = array(
        'MainController' => array(
            'main' => 'main',
        ),
        'VolumeController' => array(
            'volumes' => 'index',
            'volume/add' => 'add',
            'volume/edit/([0-9]+)' => 'edit/$1',
            'volume/delete/([0-9]+)' => 'delete/$1',
            'volume/view/([0-9]+)' => 'view/$1'
        ),
        'CandleController' => array(
            'candles/page=([0-9]+)' => 'index/$1',
            'candles' => 'index',
            'candle/add' => 'add',
            'candle/edit/([0-9]+)' => 'edit/$1',
            'candle/delete/([0-9]+)' => 'delete/$1',
            'candle/view/([0-9]+)' => 'view/$1',
            'candle/mark/([0-9]+)/([1-5])' => 'mark/$1/$2',
        ),
        'UserController' => array(
            'auth' => 'auth',
            'reg' => 'reg',
            'logout' => 'logout'
        ),
        'AdminController' => array(
            'admin' => 'admin',
            'history/view/([0-9]+)' => 'view/$1',
            'history' => 'history',
        ),
        'CabinetController' => array(
            'cabinet/edit/([0-9]+)' => 'edit/$1',
            'cabinet/history/([0-9]+)' => 'history/$1',
            'cabinet' => 'cabinet',
        ),
        'CartController' => array(
            'cart/add/([0-9]+)' => 'add/$1',
            'cart/delete/([0-9]+)' => 'delete/$1',
            'cart' => 'cart',
            'checkout' => 'checkout',
        ),
        'AboutController' => array(
            'about' => 'about',
        ),
        'ContactController' => array(
            'contact' => 'contact',
        ),
        'ErrorController' => array(
            '([-a-z]+)' => 'error'
        ),
    );