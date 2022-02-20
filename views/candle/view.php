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
                                <?php if (!$this->checkAdmin): ?>
                                <div id="my-mark">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="far fa-star" data-mark=" <?= $i; ?> "></i>
                                    <?php endfor; ?>
                                    <button class="thm-btn"
                                            onclick="candleEvaluate(<?= $id; ?>)">Оценить
                                    </button>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($userIsAlreadyVoted || $this->checkAdmin) : ?>
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
                    <?php if (!$this->checkAdmin): ?>
                        <div class="addto-cart-box" style="margin-top: 15px">
                            <a class="thm-btn add_to_cart" id="<?= $candle['candle_id']; ?>"
                               href="<?= FULL_SITE_ROOT . 'cart/add/' . $candle['candle_id'] ?>">В корзину</a>
                        </div>
                    <?php else: ?>
                        <a type="button" class="thm-btn" style="text-decoration: none"
                           href="<?= FULL_SITE_ROOT . 'candle/edit/' . $candle['candle_id'] ?>"> Редактировать </a>
                        <button type="delete" class="thm-btn"
                                onclick="remove('candle', <?= $candle['candle_id'] ?>)"> Удалить
                        </button>
                    <?php endif; ?>
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


