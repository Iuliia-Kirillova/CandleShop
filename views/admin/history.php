<?php include_once('./views/common/header.php'); ?>

<h1 <? $title ?>></h1>

<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="order-details">
                    <div class="order-details__top">
                        <p><b>Номер заказа</b></p>
                        <p><b>Имя пользователя</b></p>
                        <p><b>Дата заказа</b></p>
                    </div><!-- /.order-details__top -->
                    <?php foreach ($orders as $order): ?>
                        <p>
                            <span><a href="<?= FULL_SITE_ROOT . 'history/view/' . $order['order_id'] ?>"><?= $order['order_id']; ?></a></span>
                            <span><?= $order['order_user_name']; ?></span>
                            <span><?= $order['order_data']; ?></span>
                        </p>
                    <?php endforeach; ?>

                </div><!-- /.order-details -->
            </div><!-- /.col-md-6 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.checkout-page -->


<?php include_once('./views/common/footer.php'); ?>
