<?php include_once('./views/common/header.php'); ?>

    <section>

    <div class="container">

        <div class="col">
            <div class="about-one__box">
                <h3><i class="fa fa-check-circle"></i> <a
                            style="color: #383a39"
                            href="<?= FULL_SITE_ROOT . 'cabinet/edit/' . $user ?>">Редактирование данных
                            </a></h3>
            </div><!-- /.about-one__box -->
        </div><!-- /.col-md-6 -->

            <div class="col">
                <div class="about-one__box">
                    <h3><i class="fa fa-check-circle"></i> <a
                                style="color: #383a39"
                                href="<?= FULL_SITE_ROOT . 'candles' ?>">Редактирование товаров</a></h3>
                </div><!-- /.about-one__box -->
            </div><!-- /.col-md-6 -->

                <div class="col">
                    <div class="about-one__box">
                        <h3><i class="fa fa-check-circle"></i> <a
                                    style="color: #383a39"
                                    href="<?= FULL_SITE_ROOT . 'history' ?>">История заказов</a></h3>
                    </div><!-- /.about-one__box -->
                </div><!-- /.col-md-6 -->

    </div>
</section>


<?php include_once('./views/common/footer.php'); ?>