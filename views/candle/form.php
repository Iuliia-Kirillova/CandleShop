<?php include_once('./views/common/header.php'); ?>

<?php if (count($errors) > 0): ?>
    <div class="errors" style="color: red">
        <?php foreach ($errors as $error): ?>
            <p> <?= $error; ?> </p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post">
    <input type="text"
           class="form-control"
           placeholder="Название свечи"
           value="<?= isset($id) ? $candle['candle_name'] : '' ?>"
           name="candle_name" />

    <select name="candle_volume" class="form-select">
        <option value=""> Выберите объем: </option>
        <?php foreach ($volumes as $volume): ?>
            <option value="<?= $volume['volume_id']; ?>"
                <?= isset($id) ? (($volume['volume_id'] === $candle['candle_volume_id']) ? 'selected' : '') : '' ?> )
            > <?= $volume['volume_value']; ?> </option>
        <?php endforeach; ?>
    </select>

    <input type="text"
           class="form-control"
           placeholder="Аромат свечи"
           value="<?= isset($id) ? $candle['candle_smell'] : '' ?>"
           name="candle_smell" />

    <input type="text"
           class="form-control"
           placeholder="Описание свечи"
           value="<?= isset($id) ? $candle['candle_description'] : '' ?>"
           name="candle_description" />

    <input type="text"
           class="form-control"
           placeholder="Стоимость свечи"
           value="<?= isset($id) ? $candle['candle_price'] : '' ?>"
           name="candle_price" />

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
    </div>
</form>

<?php include_once('./views/common/footer.php'); ?>

