<?php

class History
{
    private $connect;

    public function __construct()
    {
        $this->connect = DB::getConnection();
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