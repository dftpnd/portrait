<script>
    var codropsEvents = <?php echo $datapicks;?>;
</script>

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
    <!-- /container -->
</div>


<script type="text/javascript">
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

        // you can also add more data later on. As an example:

//				$('.fc-content').on( 'click', function() {
////                    alert('asd');
//					cal.setData( {
//						'03-01-2013' : '<a href="#">testing</a>',
//						'03-10-2013' : '<a href="#">testing</a>',
//						'03-12-2013' : '<a href="#">testing</a>'
//					} );
//					// goes to a specific month/year
//					//cal.goto( 3, 2013, updateMonthYear );
//
//				} );


    });
</script>