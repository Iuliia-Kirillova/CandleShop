<?php include_once('./views/common/header.php'); ?>

<section>
    <div class="container">

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>


                    <?php if ($result): ?>

                        <p>Заказ оформлен. Мы Вам перезвоним.</p>

                    <?php else: ?>

                        <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p><br/>

                        <div class="col-sm-4">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="login-form">
                                <form action="#" method="post">

                                    <p>Ваша имя</p>
                                    <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>"/>

                                    <p>Номер телефона</p>
                                    <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>"/>

                                    <p>Комментарий к заказу</p>
                                    <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>

                                    <br/>
                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                </form>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include_once('./views/common/footer.php'); ?>
