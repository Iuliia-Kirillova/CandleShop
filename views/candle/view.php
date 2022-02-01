<? include_once("./views/common/header.php") ?>

<div class="card" style="width: 18rem;">
    <img src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" class="card-img-top" alt="Фото свечи">
    <div class="card-body">
        <h5 class="card-title"><?= $candle['candle_name']; ?></h5>
        <p class="card-text"> Описание свечи </p>
        <? if (!$userIsAlreadyVoted) : ?>
            <div>
                Ваша оценка:
            </div>
            <div id="my-mark">
                <? for ($i = 1; $i <= 5; $i++): ?>
                    <i class="far fa-star" data-mark=" <?= $i; ?> "></i>
                <? endfor; ?>
                <button class="btn btn-primary mb-3" onclick="candleEvaluate(<?= $id; ?>)">Оценить</button>

            </div>
        <? endif; ?>
        <div>
            Оценка:
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-success mb-3" onclick="">Купить</button>
            </div>

        <?php if ($this->isAuthorized): ?>
            <a type="button" class="btn btn-success"
               href="<?= FULL_SITE_ROOT . 'candle/edit/' . $candle['candle_id'] ?>"> Редактировать </a>
            <button type="delete" class="btn btn-danger"
                    onclick="remove('candle', <?= $candle['candle_id'] ?>)"> Удалить
            </button>
        <?php endif; ?>

        <div>
            <? for ($i = 1; $i <= 5; $i++): ?>
                <? if ($candle['candle_average_mark'] >= $i): ?>
                    <i class="fas fa-star"></i>
                <? else: ?>
                    <? if (($i - $candle['candle_average_mark']) > 1): ?>
                        <i class="far fa-star"></i>
                    <? else: ?>
                        <? if (($i - $candle['candle_average_mark']) > 0.75): ?>
                            <i class="far fa-star"></i>
                        <? else: ?>
                            <i class="fas fa-star-half-alt"></i>
                        <? endif; ?>
                    <? endif; ?>
                <? endif; ?>
            <? endfor; ?>
            <span>
                    <?= $candle['candle_average_mark']; ?>
                </span>
        </div>
    </div>
</div>

<? include_once("./views/common/footer.php") ?>