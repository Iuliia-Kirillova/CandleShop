<?php include_once("./views/common/header.php") ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="card text-center w-50" style="width: 18rem;">
            <img src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" class="card-img-top" alt="Фото свечи">
            <div class="card-body">
                <h5 class="card-title"><?= $candle['candle_name']; ?></h5>
                <p class="card-text"> Описание свечи </p>
                <?php if (!$this->checkAdmin): ?>
                    <?php if (!$userIsAlreadyVoted) : ?>
                    <div>
                        Ваша оценка:
                    </div>
                    <div id="my-mark">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i class="far fa-star" data-mark=" <?= $i; ?> "></i>
                        <?php endfor; ?>
                        <button class="btn btn-primary mb-3" onclick="candleEvaluate(<?= $id; ?>)">Оценить</button>

                    </div>
                    <?php endif; ?>
                <div>
                    Оценка:
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-primary add_to_cart" id="<?= $candle['candle_id']; ?>"
                       href="<?= FULL_SITE_ROOT . 'cart/addAjax/' . $candle['candle_id'] ?>">В корзину</a>
                </div>
                <?php endif; ?>

                <?php if ($this->checkAdmin): ?>
                    <a type="button" class="btn btn-success"
                       href="<?= FULL_SITE_ROOT . 'candle/edit/' . $candle['candle_id'] ?>"> Редактировать </a>
                    <button type="delete" class="btn btn-danger"
                            onclick="remove('candle', <?= $candle['candle_id'] ?>)"> Удалить
                    </button>
                <?php endif; ?>

                <div>
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
                    <span>
                    <?= $candle['candle_average_mark']; ?>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once("./views/common/footer.php") ?>
