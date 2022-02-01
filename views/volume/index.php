<?php include_once('./views/common/header.php'); ?>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th> ID</th>
        <th> Объем</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($volumes as $volume): ?>
        <tr>
            <td> <?= $volume['volume_id']; ?> </td>
            <td> <?= $volume['volume_value']; ?> мл</td>
            <td>
                <?php if ($this->isAuthorized): ?>
                    <a type="button" class="btn btn-success"
                       href="<?= FULL_SITE_ROOT . 'volume/edit/' . $volume['volume_id'] ?>">Редактировать</a>
                    <button type="delete" class="btn btn-danger"
                            onclick="remove('<?= "volume"; ?>', <?= $volume['volume_id'] ?>)">Удалить
                    </button>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php if ($this->isAuthorized): ?>
    <a type="button" class="btn btn-primary" href="<?= FULL_SITE_ROOT . 'volume/add' ?>">Добавить</a>
<?php endif; ?>

<?php include_once('./views/common/footer.php'); ?>
