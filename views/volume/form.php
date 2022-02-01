<?php include_once("./views/common/header.php") ?>

<form method="post">
    <input type="text"
           class="form-control"
           placeholder="Объем"
           value="<?= isset($id) ? $volume['volume_value'] : '' ?>"
           name="volume_value" />
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
    </div>
</form>


<?php include_once("./views/common/footer.php") ?>
