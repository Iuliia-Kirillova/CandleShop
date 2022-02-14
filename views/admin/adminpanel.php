<?php include_once('./views/common/header_admin.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <h4>Добрый день, администратор!</h4>

            <br/>

            <p>Вам доступны такие возможности:</p>

            <br/>

            <ul>
                <li><a href="<?= FULL_SITE_ROOT . 'candles' ?>">Управление товарами</a></li>

                <li><a href="<?= FULL_SITE_ROOT . 'history' ?>">Управление заказами</a></li>
            </ul>

        </div>
    </div>
</section>


<?php include_once('./views/common/footer.php'); ?>