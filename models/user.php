<?php

class User
{
    private $connection;

    public function __construct()
    {
        $this->connection = DB::getConnection();
    }

    public function checkIfLoginExists($login)
    {
        $query = (new Select('users'))
            ->what(['COUNT' => 'COUNT(*)'])
            ->where("WHERE `user_login` = '$login'")
            ->build();

        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result)['COUNT'];
    }

    public function checkIfEmailExists($email)
    {
        $query = (new Select('users'))
            ->what(['COUNT' => 'COUNT(*)'])
            ->where("WHERE `user_email` = '$email'")
            ->build();

        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result)['COUNT'];
    }

    public function checkIfPhoneExists($phone)
    {
        $query = (new Select('users'))
            ->what(['COUNT' => 'COUNT(*)'])
            ->where("WHERE `user_phone` = '$phone'")
            ->build();

        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result)['COUNT'];
    }

    public function register($login, $name, $email, $phone, $password)
    {
        $query =
            "INSERT INTO `users`
                SET `user_login` = '$login',
                    `user_name` = '$name',
                    `user_phone` = '$phone',
                    `user_email` = '$email',
                    `user_password` = '$password';
            ";
        print_r($query);
        mysqli_query($this->connection, $query);
        return mysqli_insert_id($this->connection);
    }

    public function auth($userId)
    {
        $helper = new Helper();
        $token = $helper->generateToken();
        $tokenTime = time() + 1800;
        setcookie('uid', $userId, time() + 2 * 24 * 60 * 60, '/');
        setcookie('token', $token, time() + 2 * 24 * 60 * 60, '/');
        setcookie('t_token', $tokenTime, time() + 2 * 24 * 60 * 60, '/');
        $query = "
            INSERT INTO `connects`
            SET `connect_user_id` = $userId,
                `connect_token` = '$token',
                `connect_token_time` = FROM_UNIXTIME($tokenTime)
        ";
        mysqli_query($this->connection, $query);
    }

    public function checkUserByLoginAndPassword($login, $password)
    {
        $query = (new Select('users'))
            ->what(['user_id'])
            ->where("WHERE `user_login` = '$login' AND `user_password` = '$password'")
            ->build();
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result)['user_id'];
    }

    public function userIsAuthorized()
    {
        $isAuthorized = false;
        if (isset($_COOKIE['uid']) && isset($_COOKIE['token']) && isset($_COOKIE['t_token'])) {
            $userId = $_COOKIE['uid'];
            $token = $_COOKIE['token'];
            $tokenTime = $_COOKIE['t_token'];
            $query = (new Select('connects'))
                ->what(['connect_id'])
                ->where("WHERE `connect_user_id` = $userId AND `connect_token` = '$token'")
                ->build();
            $result = mysqli_query($this->connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $isAuthorized = true;
                if ($tokenTime < time()) {
                    $helper = new Helper();
                    $newToken = $helper->generateToken();
                    $newTokenTime = time() + 1800;
                    setcookie('uid', $userId, time() + 2 * 24 * 60 * 60, '/');
                    setcookie('token', $newToken, time() + 2 * 24 * 60 * 60, '/');
                    setcookie('t_token', $newTokenTime, time() + 2 * 24 * 60 * 60, '/');
                    $connectId = mysqli_fetch_assoc($result)['connect_id'];
                    $query = "
                UPDATE `connects`
                SET `connect_token` = '$newToken', 
                    `connect_token_time` = FROM_UNIXTIME($newTokenTime)
                WHERE `connect_id` = $connectId;
            ";
                    mysqli_query($this->connection, $query);
                }
            }
        }
        return $isAuthorized;
    }

    public function getUserById()
    {
        if ($this->userIsAuthorized()) {
            $userId = $_COOKIE['uid'];
            $query = "
            SELECT * FROM `users`
            WHERE `user_id` = '$userId';
    ";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);

        }
//        else {
//            echo "User not authorized";
////            header('Location: ' . FULL_SITE_ROOT . 'auth');
//        }
    }

    public function editUser($data, $id) {
        $query = "
        UPDATE `users`
        SET `user_name` = '$data[name]',
        `user_password` = '$data[password]',
        `user_phone` = '$data[phone]',
        `user_email` = '$data[email]'
        WHERE `user_id` = $id;
    ";
        return mysqli_query($this->connection, $query);
    }

    public function userAlreadyVoted($candleId)
    {
        if ($this->userIsAuthorized()) {
            $userId = $_COOKIE['uid'];
            $query = (new Select ('marks'))
                ->where("WHERE `mark_candle_id` = $candleId AND `mark_user_id` = $userId")
                ->build();
            $result = mysqli_query($this->connection, $query);
            return mysqli_num_rows($result) !== 0;
        }
        return true;
    }

    public function logout()
    {
        if ($this->userIsAuthorized()) {
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
        }
    }
}
