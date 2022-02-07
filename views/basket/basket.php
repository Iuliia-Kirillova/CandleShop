<?php include_once('./views/common/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">


<!--                    --><?php //if ($candleInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, грн</th>
                                <th>Количество, шт</th>
                            </tr>
                            <?php foreach ($candles as $candle): ?>
                                <tr>
                                    <td><?php echo $candle['candle_id'];?></td>
                                    <td>
                                            <?php echo $candle['name'];?>

                                    </td>
                                    <td><?php echo $candle['price'];?></td>
                                    <td><?php echo $candleInCart[$candle['id']];?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Общая стоимость:</td>
<!--                                <td>--><?php //echo $totalPrice;?><!--</td>-->
                            </tr>

                        </table>



<!--                    --><?php //else: ?>
<!--                        <p>Корзина пуста</p>-->
<!--                    --><?php //endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include_once('./views/common/footer.php'); ?>
