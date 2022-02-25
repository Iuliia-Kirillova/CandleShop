<?php include_once('./views/common/header.php'); ?>

    <section class="checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="order-details">


                            <table class="table">

                                <thead>
                                <tr>
                                    <th><b>Название</b></th>
                                    <th><b>Цена</b></th>
                                    <th><b>Количество</b></th>
                                </tr>

                                </thead>

                        </div><!-- /.order-details__top -->
                        <tbody>
                        <?php foreach ($candles as $candle): ?>
                            <tr>

                                <td><?php echo $candle['candle_name']; ?></td>
                                <td><?php echo $candle['candle_price']; ?></td>
                                <td><?php echo $candlesQuantity[$candle['candle_id']]; ?></td>

                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2"><b>Общая стоимость<b></td>
                            <td style="color: black"><b><?php echo $total; ?> руб.</b></td>
                        </tr>

                        </tbody>

                        </table>

                </div><!-- /.col-md-6 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.checkout-page -->


<?php include_once('./views/common/footer.php'); ?><?php
