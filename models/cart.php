<?php
session_start();

class Cart
{
public function addCandle($id)
{
    $id = intval($id);

    $candleInCard = array();

    if (isset($_SESSION['candles'])) {
        $candleInCard = $_SESSION['candles'];
    }
    if (array_key_exists($id, $candleInCard)) {
        $candleInCard[$id] ++;
    } else {
        $candleInCard[$id] = 1;
    }

    $_SESSION['candles'] = $candleInCard;

    return self::countItems();
}

public function countItems()
{
    if (isset($_SESSION['candles'])) {
        $count = 0;
        foreach ($_SESSION['candles'] as $_id => $quantity) {
            $count = $count + $quantity;
        }
        return $count;
    } else {
        return 0;
    }
}

public function getCandles()
{
    if (isset($_SESSION['candles'])) {
        return $_SESSION['candles'];
    }
    return false;

}

//public function getTotalPrice($candles)
//{
//    $candleInCard = self::getCandles();
//
//    $total = 0;
//
//    if ($candleInCard) {
//        foreach ($candles as $candle) {
//            $total += $candle['candle_price'] * $candleInCard[$candle['candle_id']];
//        }
//    }
//    return $total;
//}


}