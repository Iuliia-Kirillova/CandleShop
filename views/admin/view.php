<?php include_once('./views/common/header_admin.php'); ?>


    <h5>Товары в заказе</h5>

    <table class="table-admin-medium table-bordered table-striped table ">
        <tr>
            <th>ID товара</th>
            <th>Артикул товара</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
        </tr>
        <?php foreach ($candles as $candle): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['code']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td><?php echo $productsQuantity[$product['id']]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>



<?php include_once('./views/common/footer.php'); ?><?php
