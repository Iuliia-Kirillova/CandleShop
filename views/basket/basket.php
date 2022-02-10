<?php include_once('./views/common/header.php'); ?>

<section>
    <div class="container">
        <div class="row">


            <div class="col-sm-9 padding-right">
                <div class="features_items">

                    <?php if ($candleInCart): ?>
                        <p>Вы выбрали такие товары:</p>

                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Название</th>
                                <th>Стомость</th>
                                <th>Количество, шт</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($candles as $candle): ?>
                                <tr>
                                    <td>
                                        <a href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>">
                                            <?php echo $candle['candle_name']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $candle['candle_price']; ?></td>
                                    <td><?php echo $candleInCart[$candle['candle_id']]; ?></td>
                                    <td>
                                        <a class="btn btn-default checkout" href="<?= FULL_SITE_ROOT . 'cart/delete/' . $candle['candle_id'] ?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Общая стоимость</td>
                                <td><?php echo $totalPrice; ?></td>
                            </tr>
                        </table>

                        <a type="button" class="btn btn-primary" href="<?= FULL_SITE_ROOT . 'checkout' ?>">Оформить
                            заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>


<?php include_once('./views/common/footer.php'); ?>
