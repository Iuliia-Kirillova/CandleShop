<?php include_once('./views/common/header.php'); ?>

<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>

                    <?php if ($candleInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Название</th>
                                <th>Стомость</th>
                                <th>Количество</th>

                            </tr>
                            <?php foreach ($candles as $candle): ?>
                                <tr>
                                    <td><a href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>"><?php echo $candle['candle_name'];?></a></td>
                                    <td><?php echo $candle['candle_price'];?></td>
                                    <td><?php echo $candleInCart[$candle['candle_id']];?></td

                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2">Общая стоимость:</td>
                                <td><?php echo $totalPrice;?></td>
                            </tr>

                        </table>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>




<?php include_once('./views/common/footer.php'); ?>
