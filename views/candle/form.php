<?php include_once('./views/common/header.php'); ?>

<?php if (count($errors) > 0): ?>
    <div class="errors" style="color: red">
        <?php foreach ($errors as $error): ?>
            <p> <?= $error; ?> </p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>



<section class="contact-one">

    <?php if (isset($id)): ?>
        <div style="text-align: center; margin-bottom:20px">
            <img style="width: 200px" class="card-img-top" src="<?= IMG . $candle['candle_id'] . '.jpg' ?>" width="300px" style="text-align: center "
                 alt="Photo">
        </div>
    <?php endif; ?>
    <div class="container">


<form method="post" class="contact-one__form" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-6">
    <input type="file"
           class="form-control"
           placeholder="Фото свечи"
           value="<?= isset($id) ? $candle['candle_img'] : '' ?>"
           name="candle_img"/>
    </div>
    <div class="col-md-6">
    <input type="text"
           class="form-control"
           placeholder="Название свечи"
           value="<?= isset($id) ? $candle['candle_name'] : '' ?>"
           name="candle_name"/>
    </div>
    <div class="col-md-6">
    <select name="candle_volume" class="form-select">
        <option value=""> Выберите объем:</option>
        <?php foreach ($volumes as $volume): ?>
            <option value="<?= $volume['volume_id']; ?>"
                <?= isset($id) ? (($volume['volume_id'] === $candle['candle_volume_id']) ? 'selected' : '') : '' ?> )
            > <?= $volume['volume_value']; ?> </option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="col-md-6">
    <input type="text"
           class="form-control"
           placeholder="Аромат свечи"
           value="<?= isset($id) ? $candle['candle_smell'] : '' ?>"
           name="candle_smell"/>
    </div>
        <div class="col-md-6">
    <input type="text"
           class="form-control"
           placeholder="Описание свечи"
           value="<?= isset($id) ? $candle['candle_description'] : '' ?>"
           name="candle_description"/>
        </div>
            <div class="col-md-6">
    <input type="text"
           class="form-control"
           placeholder="Стоимость свечи"
           value="<?= isset($id) ? $candle['candle_price'] : '' ?>"
           name="candle_price"/>
            </div>
    <div class="col-auto">
        <button type="submit" class="thm-btn">Сохранить</button>
    </div>
    </div>
</form>
    </div>
</section>

<?php include_once('./views/common/footer.php'); ?>

