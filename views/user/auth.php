<?php include_once('./views/common/header.php');
$isAuthorized = false;
?>

<section class="contact-one">

    <div class="container">

        <?php if (count($errors) > 0): ?>
            <div class="errors" style="color: red">
                <?php foreach ($errors as $error): ?>
                    <p> <?= $error; ?> </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="contact-form-validated contact-one__form">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" placeholder="Логин" name="user_login">
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                    <input type="password" placeholder="Пароль" name="user_password">
                </div><!-- /.col-md-6 -->

                <div class="col-md-12 text-center">
                    <button type="submit" class="thm-btn">Авторизироваться</button>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.container -->
</section><!-- /.contact-one -->

<?php include_once('./views/common/footer.php'); ?>




<!--<form method="post">-->
<!--    <div class="mb-3">-->
<!--        <label class="form-label">-->
<!--            Логин-->
<!--        </label>-->
<!--        <input type="text" class="form-control" name="user_login" placeholder="">-->
<!--    </div>-->
<!---->
<!--    <div class="mb-3">-->
<!--        <label class="form-label">-->
<!--            Пароль-->
<!--        </label>-->
<!--        <input type="password" class="form-control" name="user_password" placeholder="">-->
<!--    </div>-->
<!---->
<!--<!--    <div class="g-recaptcha" data-sitekey="КЛЮЧ_САЙТА"></div>-->-->
<!---->
<!--    <div class="col-auto">-->
<!--        <button type="submit" class="btn btn-primary mb-3">Авторизироваться</button>-->
<!--    </div>-->


