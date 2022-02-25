<?php

class Volume
{
    private $connect;

    public function __construct()
    {
        $this->connect = DB::getConnection();
    }

    public function getAll()
    {
        $query = (new Select('volumes'))
            ->what(['*'])
            ->where('WHERE volume_is_deleted = 0')
            ->build();

        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addVolume($value)
    {
        $value = mysqli_real_escape_string($this->connect, $value);

        $query = "
                INSERT INTO `volumes`
                SET `volume_value` = '$value';
            ";
        return mysqli_query($this->connect, $query);
    }

    public function getById($id)
    {
        $query = "
            SELECT * FROM `volumes` 
            WHERE `volume_id` = $id;
    ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }

    public function getByIdCandle($id)
    {
        $query = "
            SELECT * FROM `volumes` 
            left join `candles` on `volume_id` = `candle_volume_id`
            WHERE  `candle_id` = $id;
        ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }

    public function editVolume($volume, $id)
    {
        $volume = mysqli_real_escape_string($this->connect, $volume);

        $query = "
            UPDATE `volumes` 
            SET `volume_value` = '$volume'
            WHERE `volume_id` = $id;
            ";
        return mysqli_query($this->connect, $query);
    }

    public function deleteVolume($id)
    {
        $query = " 
            UPDATE `volumes`
            SET `volume_is_deleted` = 1
            WHERE `volume_id` = $id;
            ";
        return mysqli_query($this->connect, $query);
    }
}