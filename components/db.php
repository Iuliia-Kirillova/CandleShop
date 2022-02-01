<?php

    final class DB
    {
        private static $connection = null;

        private function __construct()
        {
            require_once('./config/db.php');
            $connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['db_name']);
            mysqli_set_charset($connect, $db['charset']);
            self::$connection = $connect;
        }

        public static function getConnection()
        {
            if (self::$connection === null) {
                new self();
            }
            return self::$connection;
        }
        private function __clone() {}
//        private function __sleep() {}
//        private function __wakeup() {}
    }