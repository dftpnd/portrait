
<div class="container">
    <!-- Codrops top bar -->
    <div class="codrops-top clearfix">
        <a href="http://tympanus.net/Development/Stapel/"><strong>&laquo; Previous Demo: </strong>Adaptive Thumbnail Pile Effect</a>
				<span class="right">
					<a href="http://tympanus.net/codrops/?p=12416"><strong>Back to the Codrops Article</strong></a>
				</span>
    </div><!--/ Codrops top bar -->
    <div class="custom-calendar-wrap custom-calendar-full">
        <div class="custom-header clearfix">
            <h2>Flexible Calendar <span><span>Demo 1</span> | <a href="index2.html">Demo 2</a></span></h2>
            <h3 class="custom-month-year">
                <span id="custom-month" class="custom-month"></span>
                <span id="custom-year" class="custom-year"></span>
                <nav>
                    <span id="custom-prev" class="custom-prev"></span>
                    <span id="custom-next" class="custom-next"></span>
                    <span id="custom-current" class="custom-current" title="Got to current date"></span>
                </nav>
            </h3>
        </div>
        <div id="calendar" class="fc-calendar-container"></div>
    </div>
</div><!-- /container -->


<script type="text/javascript">
    $(function() {

        var cal = $( '#calendar' ).calendario( {
                onDayClick : function( $el, $contentEl, dateProperties ) {

                    for( var key in dateProperties ) {
                        console.log( key + ' = ' + dateProperties[ key ] );
                    }

                },
                caldata : codropsEvents
            } ),
            $month = $( '#custom-month' ).html( cal.getMonthName() ),
            $year = $( '#custom-year' ).html( cal.getYear() );

        $( '#custom-next' ).on( 'click', function() {
            cal.gotoNextMonth( updateMonthYear );
        } );
        $( '#custom-prev' ).on( 'click', function() {
            cal.gotoPreviousMonth( updateMonthYear );
        } );
        $( '#custom-current' ).on( 'click', function() {
            cal.gotoNow( updateMonthYear );
        } );

        function updateMonthYear() {
            $month.html( cal.getMonthName() );
            $year.html( cal.getYear() );
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