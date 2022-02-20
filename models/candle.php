<?php
//ini_set("error_reporting", E_ALL);
//ini_set("display_errors", 1);
//ini_set("display_startup_errors", 1);
class Candle
{
    private $connect;

    public function __construct()
    {
        $this->connect = DB::getConnection();
    }

    public function getList($offset, $limit)
    {
        $query = "
            SELECT SQL_CALC_FOUND_ROWS *, `candle_id` AS `id`, `candle_name`
            FROM `candles`
            LEFT JOIN `volumes` ON `volume_id` = `candle_volume_id`
            WHERE `candle_is_deleted` = 0
            LIMIT $offset, $limit;
        ";
        $result = mysqli_query($this->connect, $query);
        $candles =  mysqli_fetch_all($result, MYSQLI_ASSOC);
        $result = mysqli_query($this->connect, "SELECT FOUND_ROWS()");
        $count =  mysqli_fetch_row($result) [0];
        return array(
            'candles' => $candles,
            'count' => $count
        );
    }

    public function getAll()
    {
        $query = (new Select('candles'))
            ->what(['*'])
            ->join([['type' => 'LEFT', 'table' => 'volumes',
                'key1' => 'volume_id', 'key2' => 'candle_volume_id']])
            ->where('WHERE candle_is_deleted = 0')
            ->build();
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addCandle($data)
    {
        $query = "
                INSERT INTO `candles`
                SET `candle_name` = '$data[name]',
                `candle_img` = '',
                `candle_volume_id` = '$data[volume]',
                `candle_smell` = '$data[smell]',
                `candle_description` = '$data[description]',
                `candle_price` = '$data[price]';
            ";
        $id = mysqli_insert_id($this->connect);
        return mysqli_query($this->connect, $query);

    }

    public function getId() {
        $id = mysqli_insert_id($this->connect);
        return $id;
    }

    public function editCandle($data, $id)
    {
        $query = "
        UPDATE `candles`
        SET `candle_name` = '$data[name]',
        `candle_volume_id` = '$data[volume]',
        `candle_smell` = '$data[smell]',
        `candle_description` = '$data[description]',
        `candle_price` = '$data[price]'
        WHERE `candle_id` = $id;
    ";
        print_r ($query);
        return mysqli_query($this->connect, $query);

    }

    public function getById($id)
    {
        $query = "
        SELECT * FROM `candles` 
        WHERE `candle_id` = '$id';
    ";
        $result = mysqli_query($this->connect, $query);
        return mysqli_fetch_assoc($result);
    }

    public function getByIds($ids)
    {
        $candles = array();

        $idString = implode(',', $ids);

        $query = "
        SELECT * FROM `candles`  
        WHERE `candle_id` IN ($idString);
    ";

        $result = mysqli_query($this->connect, $query);

        $i=0;
        while ($row = $result->fetch_assoc()) {
            $candles[$i]['candle_id'] = $row['candle_id'];
            $candles[$i]['candle_name'] = $row['candle_name'];
//            $candles[$i]['candle_img'] = $row['candle_img'];
//            $candles[$i]['candle_volume_id '] = $row['candle_volume_id '];
//            $candles[$i]['candle_smell'] = $row['candle_smell'];
//            $candles[$i]['candle_description'] = $row['candle_description'];
            $candles[$i]['candle_price'] = $row['candle_price'];
//            $candles[$i]['candle_average_mark'] = $row['candle_average_mark'];
            $i++;
        }
        return $candles;
    }

    public function deleteCandle($id)
    {
        $query = "
        UPDATE `candles`
        SET `candle_is_deleted` = 1
        WHERE `candle_id` = $id;
        ";

        return mysqli_query($this->connect, $query);

    }

    public function mark($userId, $candleId, $value)
    {
        $query = "
            INSERT INTO `marks`
            SET `mark_candle_id` = $candleId,
                `mark_user_id` = $userId,
                `mark_value` = $value;
        ";
        return mysqli_query($this->connect, $query);
    }
}
