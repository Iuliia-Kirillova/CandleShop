<?php include_once('./views/common/header.php'); ?>

<?php if (!$this->isAuthorized): ?>

    <?php header('Location: ' . FULL_SITE_ROOT . 'auth'); ?>

<?php else: ?>

<?php if ($result): ?>
<p>Done!</p>
<?php else: ?>

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
                    <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>">
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <input type="text" value="<?php echo $user['user_login']; ?>" disabled name="user_login">
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <input type="text" value="<?php echo $user['user_email']; ?>" name="user_email">
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <input type="phone" value="<?php echo $user['user_phone']; ?>" name="user_phone">
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <input type="password" placeholder="Пароль" name="user_password">
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                    <input type="password" placeholder="Повторите пароль" name="user_repeat_password">
                </div><!-- /.col-md-6 -->
                <div class="col-md-12 text-center">
                    <button type="submit" class="thm-btn">Обновить данные</button>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.container -->
</section><!-- /.contact-one -->




    <?php endif; ?>

<?php endif; ?>

<?php include_once('./views/common/footer.php'); ?>
