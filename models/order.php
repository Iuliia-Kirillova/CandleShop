<?php

class Order
{
    private $connect;

    public function __construct()
    {
        $this->connect = DB::getConnection();
    }

    public function save($name, $phone, $comment, $userId, $candles)
    {
        $candles = json_encode($candles);

        $query = "
        INSERT INTO `orders` (`order_user_name`, `order_user_phone`, `order_user_comment`, `order_user_id`, `order_candles`) 
        VALUES ('$name', $phone, '$comment', $userId, '$candles');
        ";
        return mysqli_query($this->connect, $query);
    }

    public function getById($id)
    {
        $query = "
        SELECT * FROM `orders`
        WHERE `order_id` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }

    public function getByUserId($id)
    {
        $query = "
        SELECT * FROM `orders`

        WHERE `order_user_id` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getHistory()
    {
        $query = "
        SELECT * FROM `orders`;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
