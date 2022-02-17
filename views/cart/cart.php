<?php include_once('./views/common/header.php'); ?>



<section class="cart-page">
    <div class="container">
        <div class="table-responsive">
            <table class="table cart-table">
                <thead>
                <tr>
                    <th><b>Товар</b></th>
                    <th><b>Цена</b></th>
                    <th><b>Количество</b></th>
                    <th><b>Удалить</b></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($candles as $candle): ?>
                    <tr>
                        <td>
                            <div class="product-box">
                                <img src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" class="card-img-top" style="width: 100px" alt="">
                                <h3><a href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>"><?php echo $candle['candle_name']; ?></a></h3>
                            </div><!-- /.product-box -->
                        </td>
                        <td><?php echo $candle['candle_price']; ?></td>
                        <td>
                            <div class="quantity-box">
                                <button type="button" class="sub">-</button>
                                <input type="number" id="2" value="<?php echo $candleInCart[$candle['candle_id']]; ?>" />
                                <button type="button" class="add">+</button>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-default checkout" href="<?= FULL_SITE_ROOT . 'cart/delete/' . $candle['candle_id'] ?>"><i class="organik-icon-close remove-icon"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table><!-- /.table -->
        </div><!-- /.table-responsive -->
        <div class="row">
            <div class="col-lg-8">

            </div><!-- /.col-lg-8 -->

            <ul class="cart-total list-unstyled">
                <li>
                    <span>Total</span>
                    <span><b><?php echo $totalPrice; ?> руб.</b> </span>
                </li>
            </ul><!-- /.cart-total -->
            <div class="button-box">
                <a href="#" class="thm-btn">Update</a><!-- /.thm-btn -->
                <a href="<?= FULL_SITE_ROOT . 'checkout' ?>" class="thm-btn">Checkout</a><!-- /.thm-btn -->
            </div><!-- /.button-box -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</section>




<!--<section>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!---->
<!---->
<!--            <div class="col-sm-9 padding-right">-->
<!--                <div class="features_items">-->
<!---->
<!--                    --><?php //if ($candleInCart): ?>
<!--                        <p>Вы выбрали такие товары:</p>-->
<!---->
<!--                        <table class="table table-hover table-sm">-->
<!--                            <tr>-->
<!--                                <th>Фото</th>-->
<!--                                <th>Название</th>-->
<!--                                <th>Стомость</th>-->
<!--                                <th>Количество, шт</th>-->
<!--                                <th>Удалить</th>-->
<!--                            </tr>-->
<!--                            --><?php //foreach ($candles as $candle): ?>
<!--                                <tr>-->
<!--                                    <td><img src="--><?//= IMG . $candle['candle_id'] . '.jpg' ?><!--" class="card-img-top" style="width: 100px" alt="Фото свечи"></td>-->
<!--                                    <td>-->
<!--                                        <a href="--><?//= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?><!--">-->
<!--                                            --><?php //echo $candle['candle_name']; ?>
<!--                                        </a>-->
<!--                                    </td>-->
<!--                                    <td>--><?php //echo $candle['candle_price']; ?><!--</td>-->
<!--                                    <td>--><?php //echo $candleInCart[$candle['candle_id']]; ?><!--</td>-->
<!--                                    <td>-->
<!--                                        <a class="btn btn-default checkout" href="--><?//= FULL_SITE_ROOT . 'cart/delete/' . $candle['candle_id'] ?><!--">-->
<!--                                            <i class="fa fa-times"></i>-->
<!--                                        </a>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            --><?php //endforeach; ?>
<!--                            <tr>-->
<!--                                <td colspan="3"><b>Общая стоимость<b></td>-->
<!--                                <td><b>--><?php //echo $totalPrice; ?><!--</b></td>-->
<!--                            </tr>-->
<!--                        </table>-->
<!---->
<!--                        <a type="button" class="btn btn-primary" href="--><?//= FULL_SITE_ROOT . 'checkout' ?><!--">Оформить-->
<!--                            заказ</a>-->
<!--                    --><?php //else: ?>
<!--                        <p>Корзина пуста</p>-->
<!--                    --><?php //endif; ?>
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->







<?php include_once('./views/common/footer.php'); ?>
