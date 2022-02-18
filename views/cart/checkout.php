<?php include_once('./views/common/header.php'); ?>

<section class="contact-one">
    <div class="container">

        <?php if ($result): ?>
            <div class="block-title text-center">
                <div class="block-title__decor"></div><!-- /.block-title__decor -->
                <p>Спасибо за заказ, ожидайте звонка!</p>
            </div><!-- /.block-title -->

        <?php else: ?>

        <div class="block-title text-center">
            <div class="block-title__decor"></div><!-- /.block-title__decor -->
            <p>Для оформления заказа заполните форму!</p>
        </div><!-- /.block-title -->

        <!--        <p>Выбрано товаров: --><?php //echo $totalQuantity; ?><!--, на сумму: -->
        <?php //echo $totalPrice; ?><!-- руб.</p>-->

        <div class="col-sm-">
            <?php if (count($errors) > 0): ?>
                <div class="errors" style="color: red">
                    <?php foreach ($errors as $error): ?>
                        <p> <?= $error; ?> </p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="post" class="contact-form-validated contact-one__form">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="user_name" placeholder="" value="<?php echo $name; ?>"/>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <input type="phone" name="user_phone" placeholder="" value="<?php echo $phone; ?>"/>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-12">
                    <textarea name="user_comment" placeholder="Комментарий к заказу"
                              value="<?php echo $comment; ?>"/></textarea>
                    </div><!-- /.col-md-12 -->
                    <div class="col-md-12 text-center">
                        <!--                    <button type="submit" class="thm-btn">Заказать</button>-->
                        <input type="submit" name="submit" class=" thm-btn" value="Заказать"/>

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </form>
            <?php endif; ?>
        </div><!-- /.container -->
</section><!-- /.contact-one -->


<?php include_once('./views/common/footer.php'); ?>
