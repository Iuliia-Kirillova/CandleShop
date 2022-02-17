<?php include_once('./views/common/header.php');
$isAuthorized = false;
?>

<?php if (count($errors) > 0): ?>
    <div class="errors" style="color: red">
        <?php foreach ($errors as $error): ?>
            <p> <?= $error; ?> </p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form method="post">
    <div class="mb-3">
        <label class="form-label">
            Логин
        </label>
        <input type="text" class="form-control" name="user_login" placeholder="">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Пароль
        </label>
        <input type="password" class="form-control" name="user_password" placeholder="">
    </div>

<!--    <div class="g-recaptcha" data-sitekey="КЛЮЧ_САЙТА"></div>-->

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Авторизироваться</button>
    </div>

    <?php include_once('./views/common/footer.php'); ?>
