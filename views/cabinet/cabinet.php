<?php include_once('./views/common/header.php'); ?>

<?php if (!$this->isAuthorized): ?>

    <?php header('Location: ' . FULL_SITE_ROOT . 'auth'); ?>

<?php else: ?>

    <section>
        <div class="container">
            <div class="row">

                <ul>
                    <li><a href="<?= FULL_SITE_ROOT . 'cabinet/edit/' . $user['user_id']?>">Редактировать данные</a></li>
                    <li><a href="<?= FULL_SITE_ROOT . 'cabinet/history/' . $user['user_id']?>">Список покупок</a></li>
                </ul>

            </div>
        </div>
    </section>

<?php endif; ?>

<?php include_once('./views/common/footer.php'); ?>
