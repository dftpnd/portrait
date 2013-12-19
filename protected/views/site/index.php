<section class="index">
    <article class="in_scrollspy" id="test_1">

    </article>
    <article class="in_scrollspy" id="test_2">

    </article>
    <article class="in_scrollspy"id="test_3">

    </article>
    <article class="in_scrollspy" id="test_4">
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
    <article class="in_scrollspy" id="test_5">

    </article>
    <article class="in_scrollspy" id="test_6">

    </article>

</section>


<script type="text/javascript">
    var codropsEvents = <?php echo $datapicks;?>;
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