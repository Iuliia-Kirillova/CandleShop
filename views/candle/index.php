<?php include_once('./views/common/header.php'); ?>


<section class="products-page">
    <div class="container">
        <div class="row">



            <div class="product-sorter">

                <div class="row">
                    <?php foreach ($candles as $candle): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="product-card">
                                <div class="product-card__image">
                                    <img src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" alt="">
                                     <?php if (!$this->checkAdmin): ?>
                                    <div class="product-card__image-content">
                                        <a id="<?= $candle['candle_id']; ?>"
                                           href="<?= FULL_SITE_ROOT . 'cart/add/' . $candle['candle_id'] ?>"
                                           class="add_to_cart">
                                            <i class="organik-icon-shopping-cart"></i>
                                        </a>
                                    </div><!-- /.product-card__image-content -->
                                     <?php endif; ?>
                                </div><!-- /.product-card__image -->
                                <div class="product-card__content">
                                    <div class="product-card__left">
                                        <h3>
                                            <a href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>"><?= $candle['candle_name']; ?></a>
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
























<?php //if (!$this->checkAdmin): ?>
<!---->
<!--    <section class="py-5">-->
<!--        <div class="container px-4 px-lg-5 mt-5">-->
<!--            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">-->
<!---->
<!--                --><?php //foreach ($candles as $candle): ?>
<!--                    <div class="col mb-5">-->
<!--                        <div class="card h-100">-->
<!--                            <!-- Product image-->-->
<!--                            <img class="card-img-top" src="--><?//= IMG . $candle['candle_id'] . '.jpg' ?><!--" alt="Фото"/>-->
<!--                            <!-- Product details-->-->
<!--                            <div class="card-body p-4">-->
<!--                                <div class="text-center">-->
<!--                                    <!-- Product name-->-->
<!--                                    <h5 class="fw-bolder">--><?//= $candle['candle_name']; ?><!--</h5>-->
<!--                                    <!-- Product price-->-->
<!--                                    <h6>--><?//= $candle['candle_price']; ?><!-- руб. </h6>-->
<!--                                    <p> --><?//= $candle['volume_value']; ?><!-- мл.</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!-- Product actions-->-->
<!--                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">-->
<!--                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"-->
<!--                                                            href="--><?//= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?><!--">Подробнее</a>-->
<!--                                </div>-->
<!--                                --><?php //if (!$this->checkAdmin): ?>
<!--                                    <div class="text-center"><a class="btn btn-primary add_to_cart"-->
<!--                                                                id="--><?//= $candle['candle_id']; ?><!--"-->
<!--                                                                href="--><?//= FULL_SITE_ROOT . 'cart/add/' . $candle['candle_id'] ?><!--">-->
<!--                                            В корзину</a>-->
<!--                                    </div>-->
<!--                                --><?php //endif; ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!---->
<!---->
<?php //else: ?>
<!---->
<!--    <div class="d-grid gap-2 col-6 mx-auto">-->
<!--        <a type="button" class="btn btn-primary" href="--><?//= FULL_SITE_ROOT . 'candle/add' ?><!--">Добавить</a>-->
<!--    </div>-->
<!---->
<!--    <table class="table table-striped table-hover">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th> ID</th>-->
<!--            <th> Название</th>-->
<!--            <th> Объем</th>-->
<!--            <th> Аромат</th>-->
<!--            <th> Описание</th>-->
<!--            <th> Цена</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php //foreach ($candles as $candle): ?>
<!--            <tr>-->
<!--                <td> --><?//= $candle['candle_id']; ?><!-- </td>-->
<!--                <td>-->
<!--                    <a href="--><?//= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?><!--">--><?//= $candle['candle_name']; ?><!--</a>-->
<!--                </td>-->
<!--                <td> --><?//= $candle['volume_value']; ?><!-- мл</td>-->
<!--                <td> --><?//= $candle['candle_smell']; ?><!-- </td>-->
<!--                <td> --><?//= $candle['candle_description']; ?><!-- </td>-->
<!--                <td> --><?//= $candle['candle_price']; ?><!-- руб</td>-->
<!--                <td>-->
<!---->
<!--                    <a type="button" class="btn btn-success"-->
<!--                       href="--><?//= FULL_SITE_ROOT . 'candle/edit/' . $candle['candle_id']; ?><!--"> Редактировать </a>-->
<!--                    <button type="delete" class="btn btn-danger"-->
<!--                            onclick="remove('candle', --><?//= $candle['candle_id']; ?>//)"> Удалить
//                    </button>
//
//                </td>
//            </tr>
//        <?php //endforeach; ?>
<!--        </tbody>-->
<!--    </table>-->
<!---->
<?php //endif; ?>




