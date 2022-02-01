<?php

if ($this->isAuthorized) {
    $userId = $_COOKIE['uid'];
    $token = $_COOKIE['token'];
    setcookie('uid', '', time() - 2 * 24 * 60 * 60, '/');
    setcookie('token', '', time() - 2 * 24 * 60 * 60, '/');
    setcookie('t_token', '', time() - 2 * 24 * 60 * 60, '/');
    $query = "
        DELETE FROM `connects`
            WHERE `connect_user_id` = $userId AND `$token` = '$token';
    ";
    echo $query;

    mysqli_query($this->connection, $query);
    header('Location: ' . FULL_SITE_ROOT . 'candles');
}