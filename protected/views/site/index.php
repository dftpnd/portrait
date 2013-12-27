<section class="index">
    <article class="in_scrollspy action centrator" id="test_1">
        <p class="action-title">
            <span class="big-tit">Уютные коттеджи</span>
            <span class="mini-tit"> на заповедном берегу Волги</span>
        </p>
        <div class="act-price">
            <span class="active">1100 р</span> <span class="no-price">вместо</span> <span class="no-price"><hr>2200p</span>
        </div>
        <div class="action-bg"></div>
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
    </article>
    <article class="in_scrollspy centrator" id="test_2">

    </article>
    <article class="in_scrollspy centrator"id="test_3">

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
    </article>
    <article class="in_scrollspy centrator" id="test_5">

    </article>
    <article class="in_scrollspy centrator" id="test_6">

    </article>

</section>


<script type="text/javascript">
    var codropsEvents = <?php echo $datapicks; ?>;
    $(function() {

        var cal = $('#calendar').calendario({
            onDayClick: function($el, $contentEl, dateProperties) {
                onDayClickUser($el, dateProperties);
            },
            caldata: codropsEvents
        }),
        $month = $('#custom-month').html(cal.getMonthName()),
                $year = $('#custom-year').html(cal.getYear());

        $('#custom-next').on('click', function() {
            cal.gotoNextMonth(updateMonthYear);
        });
        $('#custom-prev').on('click', function() {
            cal.gotoPreviousMonth(updateMonthYear);
        });

        function updateMonthYear() {
            $month.html(cal.getMonthName());
            $year.html(cal.getYear());
        }


    });
</script>