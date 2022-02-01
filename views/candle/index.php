<?php include_once('./views/common/header.php'); ?>

<?php if ($this->isAuthorized): ?>
<div class="d-grid gap-2 col-6 mx-auto">
    <a type="button" class="btn btn-primary" href="<?= FULL_SITE_ROOT . 'candle/add' ?>">Добавить</a>
</div>
<?php endif; ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php foreach ($candles as $candle): ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="<?= IMG . $candle['candle_id'] . '.jpg'?>" alt="Фото"/>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $candle['candle_name']; ?></h5>
                                <!-- Product price-->
                                $40.00 - $80.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                                        href="<?= FULL_SITE_ROOT . 'candle/view/' . $candle['candle_id'] ?>">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>


<?= $pagination->get(); ?>



<?php include_once('./views/common/footer.php'); ?>
