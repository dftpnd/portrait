<section class="index">
    <article class="in_scrollspy action centrator" id="test_1">
        <p class="action-title">
            <span class="big-tit">Уютные коттеджи</span>
            <span class="mini-tit"> на заповедном берегу Волги</span>
        </p>

        <div class="act-price">
            <span class="active">1100 р</span> <span class="no-price">вместо</span> <span class="no-price"><hr>2200p</span>
        </div>
        <div class="action-bg">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/i/action-bg.jpg"/>
        </div>
        <div class="window">
            <div class="w_info">
                <p>Подайте заявку прямо</p>

                <p>сейчас и получите скидку</p>

                <p>50% на вторые сутки!</p>
            </div>
            <input type="text" class="default-field" placeholder="Ваше имя"/>
            <input type="text" class="default-field" placeholder="*Ваш телефон"/>

            <p class="inp_descr">*Ваши данные в безопасности</p>
            <input type="text" class="default-field" placeholder="Дата бронирования"/>

            <p class="inp_descr">C вами свяжется наш менеджер<br>
                в течении 15ти минут</p>

            <div class="button reservd"></div>
        </div>
        <div class="anchor"></div>
    </article>
    <article class="in_scrollspy about" id="test_2">
        <div class="centrator">
            <h1>О базе отдыха Илеть</h1>
            <ul class="abt-ul">
                <li>
                    <div class="abt-icon abt-icon-1"></div>
                    <p>На нашей базе есть
                        волейбольная площадка и футбольное поле!</p>
                </li>
                <li>
                    <div class="abt-icon abt-icon-4"></div>
                    <p>Дома полностью отапливаемы и в них тепло!</p>
                </li>
                <li>
                    <div class="abt-icon abt-icon-2"></div>
                    <p>На территории базы имеется детская игровая зона.</p>
                </li>
                <li>
                    <div class="abt-icon abt-icon-5"></div>
                    <p>В каждом домике есть большой зал для застолья, кухня, бытовые кухонные приборы, душевая
                        кабина</p>
                </li>
                <li>
                    <div class="abt-icon abt-icon-3"></div>
                    <p>А также на нашей базе соверешенно бесплатная охраняемая стоянка.</p>
                </li>
                <li>
                    <div class="abt-icon abt-icon-6"></div>
                    <p>На территории базы имеется баня и переносные мангалы!</p>
                </li>
            </ul>
        </div>
        <div class="anchor"></div>
    </article>
    <article class="in_scrollspy centrator" id="test_3">
        <div class="centerator">
            <div class="picterform">
                <form class="ask-form">
                    <h2 class="d-green">Появился вопрос? Задай!</h2>
                    <input class="input-name" placeholder="Введите ваше имя" type="text"/>

                    <div class="input-phone">
                        <input placeholder="Телефон" type="text"/>
                    </div><!--
                    --><div class="input-mail">
                        <input placeholder="E-mail" type="text"/>
                    </div>
                    <button class="ask-btn"></button>
                </form>
            </div>
        </div>
        <div class="anchor"></div>
    </article>
    <article class="in_scrollspy centrator" id="test_4">
        <div class="nadstroika">
            <div class="container">
                <div class="custom-calendar-wrap custom-calendar-full">
                    <div class="custom-header clearfix">
                        <h3 class="custom-month-year">
                            <span id="custom-month" class="custom-month"></span>
                            <span id="custom-year" class="custom-year"></span>
                            <nav>
                                <span id="custom-prev" class="custom-prev"></span>
                                <span id="custom-next" class="custom-next"></span>
                            </nav>
                        </h3>
                    </div>
                    <div id="calendar" class="fc-calendar-container"></div>
                </div>
            </div>
        </div>
        <div class="anchor"></div>
    </article>
    <article class="in_scrollspy centrator" id="test_5">

    </article>
    <article class="in_scrollspy centrator" id="test_6">

    </article>

</section>


<script type="text/javascript">
    var codropsEvents = <?php echo $datapicks; ?>;
    $(function () {

        var cal = $('#calendar').calendario({
                onDayClick: function ($el, $contentEl, dateProperties) {
                    onDayClickUser($el, dateProperties);
                },
                caldata: codropsEvents
            }),
            $month = $('#custom-month').html(cal.getMonthName()),
            $year = $('#custom-year').html(cal.getYear());

        $('#custom-next').on('click', function () {
            cal.gotoNextMonth(updateMonthYear);
        });
        $('#custom-prev').on('click', function () {
            cal.gotoPreviousMonth(updateMonthYear);
        });

        function updateMonthYear() {
            $month.html(cal.getMonthName());
            $year.html(cal.getYear());
        }


    });
</script>