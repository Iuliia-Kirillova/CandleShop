<?php

    $routes = array(
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
        )
    );