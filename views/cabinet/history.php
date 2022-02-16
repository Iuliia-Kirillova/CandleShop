<?php include_once('./views/common/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <div class="features_items">

                    <table class="table table-hover table-sm">
                        <thead>
                        <tr>
                            <th> ID</th>
                            <th> Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td>
                                    <a href="<?= FULL_SITE_ROOT . 'history/view/' . $order['order_id'] ?>"><?= $order['order_id']; ?></a>
                                </td>
                                <td> <?= $order['order_data']; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('./views/common/footer.php'); ?>
