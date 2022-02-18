<?php include_once("./views/common/header.php") ?>

<section class="product_detail">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="product_detail_image">
                    <img src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="product_detail_content">
                    <h2><?= $candle['candle_name']; ?></h2>
                    <div class="product_detail_review_box">
                        <div class="product_detail_price_box">
                            <p><?= $candle['candle_price']; ?> руб.</p>
                        </div>
                        <div class="product_detail_review">
                            <?php if (!$userIsAlreadyVoted) : ?>
                                <div id="my-mark">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="far fa-star" data-mark=" <?= $i; ?> "></i>
                                    <?php endfor; ?>
                                    <button class="thm-btn"
                                            onclick="candleEvaluate(<?= $id; ?>)">Оценить
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if ($userIsAlreadyVoted) : ?>
                                <div class="product_detail_review">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($candle['candle_average_mark'] >= $i): ?>
                                            <i class="fa fa-star"></i>
                                        <?php else: ?>
                                            <?php if (($i - $candle['candle_average_mark']) > 1): ?>
                                                <i class="fa fa-star"></i>
                                            <?php else: ?>
                                                <?php if (($i - $candle['candle_average_mark']) > 0.75): ?>
                                                    <i class="far fa-star"></i>
                                                <?php else: ?>
                                                    <i class="fas fa-star-half-alt"></i>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span>
                    <?= $candle['candle_average_mark']; ?>
                </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product_detail_text">
                        <p>Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo
                            venenatis ligula commodo leez sed blandit convallis dignissim onec vel pellentesque
                            neque.</p>
                    </div>
                    <!--                    <div class="product-quantity-box">-->
                    <!--                        <div class="quantity-box">-->
                    <!--                            <button type="button" class="sub">-</button>-->
                    <!--                            <input type="number" id="2" value="1"/>-->
                    <!--                            <button type="button" class="add">+</button>-->
                    <!--                        </div>-->
                    <div class="addto-cart-box" style="margin-top: 15px">
                        <a class="thm-btn add_to_cart" id="<?= $candle['candle_id']; ?>"
                           href="<?= FULL_SITE_ROOT . 'cart/add/' . $candle['candle_id'] ?>">В корзину</a>
                    </div>
                </div>
                <div class="product_detail_share_box">
                    <div class="share_box_title">
                        <h2>Share with friends</h2>
                    </div>
                    <div class="share_box_social">
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php include_once("./views/common/footer.php") ?>


<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="card text-center w-50" style="width: 18rem;">-->
<!--            <img src="--><? //= IMG . $candle['candle_id'] . '.jpg' ?><!--" class="card-img-top" alt="Фото свечи">-->
<!--            <div class="card-body">-->
<!--                <h5 class="card-title">--><? //= $candle['candle_name']; ?><!--</h5>-->
<!--                <p class="card-text"> Описание свечи </p>-->
<!--                <p class="card-text">--><? //= $volumes['volume_value'] ?><!--</p>-->
<!--                <p class="card-text">--><? //= $candle['candle_price']; ?><!-- руб.</p>-->
<!--                --><?php //if (!$this->checkAdmin): ?>
<!--                    --><?php //if (!$userIsAlreadyVoted) : ?>
<!--                        <div>-->
<!--                            Ваша оценка:-->
<!--                        </div>-->
<!--                        <div id="my-mark">-->
<!--                            --><?php //for ($i = 1; $i <= 5; $i++): ?>
<!--                                <i class="far fa-star" data-mark=" --><? //= $i; ?><!-- "></i>-->
<!--                            --><?php //endfor; ?>
<!--                            <button class="btn btn-primary mb-3" onclick="candleEvaluate(--><? //= $id; ?>//)">Оценить</button>
//
//                        </div>
//                    <?php //endif; ?>
<!--                    <div>-->
<!--                        Оценка:-->
<!--                    </div>-->
<!---->
<!--                    <div class="d-grid gap-2 col-6 mx-auto">-->
<!--                        <a class="btn btn-primary add_to_cart" id="--><? //= $candle['candle_id']; ?><!--"-->
<!--                           href="--><? //= FULL_SITE_ROOT . 'cart/add/' . $candle['candle_id'] ?><!--">В корзину</a>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php //if ($this->checkAdmin): ?>
<!--                    <a type="button" class="btn btn-success"-->
<!--                       href="--><? //= FULL_SITE_ROOT . 'candle/edit/' . $candle['candle_id'] ?><!--"> Редактировать </a>-->
<!--                    <button type="delete" class="btn btn-danger"-->
<!--                            onclick="remove('candle', --><? //= $candle['candle_id'] ?>//)"> Удалить
//                    </button>
//                <?php //endif; ?>
<!---->
<!---->
<!---->
<!--                --><?php //if (!$this->checkAdmin): ?>
<!--                    <div>-->
<!--                        --><?php //for ($i = 1; $i <= 5; $i++): ?>
<!--                            --><?php //if ($candle['candle_average_mark'] >= $i): ?>
<!--                                <i class="fas fa-star"></i>-->
<!--                            --><?php //else: ?>
<!--                                --><?php //if (($i - $candle['candle_average_mark']) > 1): ?>
<!--                                    <i class="far fa-star"></i>-->
<!--                                --><?php //else: ?>
<!--                                    --><?php //if (($i - $candle['candle_average_mark']) > 0.75): ?>
<!--                                        <i class="far fa-star"></i>-->
<!--                                    --><?php //else: ?>
<!--                                        <i class="fas fa-star-half-alt"></i>-->
<!--                                    --><?php //endif; ?>
<!--                                --><?php //endif; ?>
<!--                            --><?php //endif; ?>
<!--                        --><?php //endfor; ?>
<!--                        <span>-->
<!--                    --><? //= $candle['candle_average_mark']; ?>
<!--                </span>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->



