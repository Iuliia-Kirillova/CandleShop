<?php include_once('./views/common/header.php'); ?>

<?php if (!$this->isAuthorized): ?>

    <?php header('Location: ' . FULL_SITE_ROOT . 'auth'); ?>

<?php else: ?>

    <section>

        <div class="container">

            <div class="col">
                <div class="about-one__box">
                    <h3><i class="fa fa-check-circle"></i> <a
                                style="color: #383a39"
                                href="<?= FULL_SITE_ROOT . 'cabinet/edit/' . $user['user_id']?>">Редактирование данных
                        </a></h3>
                </div><!-- /.about-one__box -->
            </div><!-- /.col-md-6 -->

            <div class="col">
                <div class="about-one__box">
                    <h3><i class="fa fa-check-circle"></i> <a
                                style="color: #383a39"
                                href="<?= FULL_SITE_ROOT . 'cabinet/history/' . $user['user_id']?>">Список покупок</a></h3>
                </div><!-- /.about-one__box -->
            </div><!-- /.col-md-6 -->



        </div>
    </section>




<!--    <section>-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!---->
<!--                <ul>-->
<!--                    <li><a href="--><?//= FULL_SITE_ROOT . 'cabinet/edit/' . $user['user_id']?><!--">Редактировать данные</a></li>-->
<!--                    <li><a href="--><?//= FULL_SITE_ROOT . 'cabinet/history/' . $user['user_id']?><!--">Список покупок</a></li>-->
<!--                </ul>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

<?php endif; ?>

<?php include_once('./views/common/footer.php'); ?>
