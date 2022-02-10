<?php include_once('./views/common/header.php'); ?>

<section>
    <div class="container">
        <?php if ($result): ?>
            <p>Заказ оформлен. Мы Вам перезвоним.</p>

        <?php else: ?>
            <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?> руб.</p>
            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

            <div class="col-sm-">
                <?php if (count($errors) > 0): ?>
                    <div class="errors" style="color: red">
                        <?php foreach ($errors as $error): ?>
                            <p> <?= $error; ?> </p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>



                <div class="login-form">
                    <form action="#" method="post">

                        <div class="mb-3">
                            <label class="form-label">
                                Ваше имя
                            </label>
                            <input type="text" name="user_name" placeholder="" value="<?php echo $name; ?>"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Номер телефона
                            </label>
                            <input type="tel" name="user_phone" placeholder="" value="<?php echo $phone; ?>"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Комментарий к заказу
                            </label>
                            <input type="text" name="user_comment" placeholder="Comment"
                                   value="<?php echo $comment; ?>"/>
                        </div>

                        <div class="col-auto">
                            <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                        </div>

                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include_once('./views/common/footer.php'); ?>
