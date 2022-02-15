<?php include_once('./views/common/header.php'); ?>

    <table class="table-admin-medium table-bordered table-striped table ">
        <tr>

            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
        </tr>
        <?php foreach ($candles as $candle): ?>
            <tr>
                <td><?php echo $candle['candle_name']; ?></td>
                <td><?php echo $candle['candle_price']; ?></td>
                <td><?php echo $candlesQuantity[$candle['candle_id']]; ?></td>
            </tr>
        <?php endforeach; ?>
            <tr>
                <td colspan="2"><b>Общая стоимость<b></td>
                <td><b><?php echo $total; ?> руб.</b></td>
            </tr>

    </table>



<?php include_once('./views/common/footer.php'); ?><?php
