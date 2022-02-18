<?php include_once('./views/common/header.php'); ?>

    <section class="contact-infos">
        <div class="container">
            <div class="thm-tiny__slider" id="contact-infos-box" data-tiny-options='{
            "container": "#contact-infos-box",
            "items": 1,
            "slideBy": "page",
            "gutter": 0,
            "mouseDrag": true,
            "autoplay": true,
            "nav": false,
            "controlsPosition": "bottom",
            "controlsText": ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
            "autoplayButtonOutput": false,
            "responsive": {
                "640": {
                  "items": 2,
                  "gutter": 30
                },
                "992": {
                  "gutter": 30,
                  "items": 3
                },
                "1200": {
                  "disable": true
                }
              }
        }'>
                <div>
                    <div class="contact-infos__single">
                        <i class="organik-icon-calling"></i>
                        <h3>Звоните по телефону и пишите в WhatsApp</h3>
                        <p><a href="tel:92-666-888-0000">+7(921)123-45-67</a> <br>

                        </p>
                    </div><!-- /.contact-infos__single -->
                </div>
                <div>
                    <div class="contact-infos__single">
                        <i class="bi bi-instagram"></i>
                        <h3>Подписывайтесь в Instagram</h3>
                    </div><!-- /.contact-infos__single -->
                </div>

                <div>
                    <div class="contact-infos__single">
                        <i class="organik-icon-email"></i>
                        <h3>Пишите на Email</h3>
                        <p>
                            <a href="mailto:needhelp@organik.com">info@candleshop.com</a>

                        </p>
                    </div><!-- /.contact-infos__single -->
                </div>

            </div>
        </div><!-- /.container -->
    </section><!-- /.contact-infos -->

<?php include_once('./views/common/footer.php'); ?>