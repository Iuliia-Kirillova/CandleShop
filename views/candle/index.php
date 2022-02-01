<?php include_once('./views/common/header.php'); ?>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th> ID</th>
        <th> Название</th>
        <th> Объем</th>
        <th> Аромат</th>
        <th> Описание</th>
        <th> Цена</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($candles as $candle): ?>
        <tr>
            <td> <a href="">  </a><?= $candle['candle_id']; ?> </td>
            <td> <?= $candle['candle_name']; ?> </td>
            <td> <?= $candle['volume_value']; ?> мл</td>
            <td> <?= $candle['candle_smell']; ?> </td>
            <td> <?= $candle['candle_description']; ?> </td>
            <td> <?= $candle['candle_price']; ?> руб</td>
            <td>
                <?php if ($this->isAuthorized): ?>
                    <a type="button" class="btn btn-success"
                       href="<?= FULL_SITE_ROOT . 'candle/edit/' . $candle['candle_id'] ?>"> Редактировать </a>
                    <button type="delete" class="btn btn-danger"
                            onclick="remove('candle', <?= $candle['candle_id'] ?>)"> Удалить
                    </button>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?= $pagination->get(); ?>

<?php if ($this->isAuthorized): ?>
    <a type="button" class="btn btn-primary" href="<?= FULL_SITE_ROOT . 'candle/add' ?>">Добавить</a>
<?php endif; ?>

<?php include_once('./views/common/footer.php'); ?>
