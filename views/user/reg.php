<?php include_once('./views/common/header.php'); ?>



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
                        <input type="text" name="user_name" placeholder="Ваше имя">
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <input type="text" placeholder="Логин" name="user_login">
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <input type="text" placeholder="Email" name="user_email">
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <input type="text" placeholder="Номер телефона" name="user_phone">
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <input type="password" placeholder="Пароль" name="user_password">
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <input type="password" placeholder="Повторите пароль" name="user_repeat_password">
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="thm-btn">Зарегистрироваться</button>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </form>
        </div><!-- /.container -->
    </section><!-- /.contact-one -->

<?php include_once('./views/common/footer.php'); ?>

<!--    <form method="POST">-->
<!---->
<!--        <div class="mb-3">-->
<!--            <label class="form-label">-->
<!--                Login-->
<!--            </label>-->
<!--            <input type="text" class="form-control" name="user_login" placeholder="">-->
<!--        </div>-->
<!---->
<!--        <div class="mb-3">-->
<!--            <label class="form-label">-->
<!--                Name-->
<!--            </label>-->
<!--            <input type="text" class="form-control" name="user_name" placeholder="">-->
<!--        </div>-->
<!---->
<!--        <div class="mb-3">-->
<!--            <label class="form-label">-->
<!--                Email-->
<!--            </label>-->
<!--            <input type="email" class="form-control" name="user_email" placeholder="abc@example.com">-->
<!--        </div>-->
<!---->
<!--        <div class="mb-3">-->
<!--            <label class="form-label">-->
<!--                Phone-->
<!--            </label>-->
<!--            <input type="tel" class="form-control" name="user_phone" placeholder="+7(000)000-00-00">-->
<!--        </div>-->
<!---->
<!--        <div class="mb-3">-->
<!--            <label class="form-label">-->
<!--                Password-->
<!--            </label>-->
<!--            <input type="password" class="form-control" name="user_password" placeholder="">-->
<!--        </div>-->
<!---->
<!--        <div class="mb-3">-->
<!--            <label class="form-label">-->
<!--                Repeat Password-->
<!--            </label>-->
<!--            <input type="password" class="form-control" name="user_repeat_password" placeholder="">-->
<!--        </div>-->
<!---->
<!--        <!--    <div class="g-recaptcha" data-sitekey="КЛЮЧ_САЙТА"></div>-->-->
<!---->
<!--        <div class="col-auto">-->
<!--            <button type="submit" class="btn btn-primary mb-3">Зарегистрироваться</button>-->
<!--        </div>-->

