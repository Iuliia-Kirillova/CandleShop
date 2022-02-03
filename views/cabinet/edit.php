<?php include_once('./views/common/header.php'); ?>

<?php if ($result): ?>
<p>Done!</p>
<?php else: ?>


<?php if (count($errors) > 0): ?>
    <div class="errors" style="color: red">
        <?php foreach ($errors as $error): ?>
            <p> <?= $error; ?> </p>
        <?php endforeach; ?>

    </div>
<?php endif; ?>


<form method="POST">

    <div class="mb-3">
        <label class="form-label">
            Login
        </label>
        <input type="text" class="form-control" name="user_login" value="<?php echo $user['user_login']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Name
        </label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user['user_name']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Email
        </label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user['user_email']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Phone
        </label>
        <input type="tel" class="form-control" name="user_phone" value="<?php echo $user['user_phone']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Password
        </label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user['user_password']; ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Repeat Password
        </label>
        <input type="password" class="form-control" name="user_repeat_password" placeholder="">
    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Обновить</button>
    </div>

    <?php endif; ?>

    <?php include_once('./views/common/footer.php'); ?>
