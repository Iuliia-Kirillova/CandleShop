<?php include_once('./views/common/header.php'); ?>


<section class="products-page">
    <? if ($this->checkAdmin): ?>
    <div class="col-md-12 text-center">
        <a type="button" style="text-align: center" class="thm-btn" href="<?= FULL_SITE_ROOT . 'candle/add' ?>">Добавить новую свечу</a>
    </div>
    <? endif; ?>

    <div class="container">
        <div class="row">
            <div class="product-sorter">
                <div class="row">
                    <?php foreach ($candles as $candle): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="product-card">
                                <div class="product-card__image">
                                    <img src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" alt="">

                                    <div class="product-card__image-content">

                                        <a id="<?= $candle['candle_id']; ?>"
                                           href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <?php if (!$this->checkAdmin): ?>
                                        <a id="<?= $candle['candle_id']; ?>"
                                           href="<?= FULL_SITE_ROOT . 'cart/add/' . $candle['candle_id'] ?>"
                                           class="add_to_cart">
                                            <i class="organik-icon-shopping-cart"></i>
                                        </a>
                                        <?php endif; ?>
                                    </div><!-- /.product-card__image-content -->

                                </div><!-- /.product-card__image -->

                                <div class="product-card__content">
                                    <div class="product-card__left">
                                        <h3>
                                            <a href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>"><b><?= $candle['candle_name']; ?></b></a>
                                        </h3>
                                        <p><?= $candle['candle_price']; ?> руб.</p>
                                    </div><!-- /.product-card__left -->
                                    <div class="product-card__right">

                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($candle['candle_average_mark'] >= $i): ?>
                                                <i class="fas fa-star"></i>
                                            <?php else: ?>
                                                <?php if (($i - $candle['candle_average_mark']) > 1): ?>
                                                    <i class="far fa-star"></i>
                                                <?php else: ?>
                                                    <?php if (($i - $candle['candle_average_mark']) > 0.75): ?>
                                                        <i class="far fa-star"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div><!-- /.product-card__right -->
                                </div><!-- /.product-card__content -->
                            </div><!-- /.product-card -->
                        </div><!-- /.col-md-6 col-lg-4 -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.container -->
</section><!-- /.products-page -->

<?= $pagination->get(); ?>

<?php include_once('./views/common/footer.php'); ?>
























