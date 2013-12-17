<div class="jumbotron">
    <h1>Список ..</h1>
    <?php
    //    array(
    //        'name' => 'status',
    //        'value' => 'Lookup::item("PostStatus",$data->status)',
    //        'filter' => Lookup::items('PostStatus'),
    //    ),
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'datapick-grid',
        'dataProvider' => $datapick->search(),
        'cssFile' => false,
        'itemsCssClass' => 'table table-hover',
        'rowCssClassExpression' => '("row_status_$data->status")',
        'columns' => array(
            array(
                'name' => 'datapick',
                'value' => 'CHtml::link($data->datapick, $data->id)',
                'htmlOptions' => array('class' => 'editdatapick'),
            ),
            array(
                'name' => 'created',
                'value' => 'date("d.m.Y G:i",$data->created)',
            ),
            array(
                'name' => 'status',
                'value' => 'Lookup::item("datapickStatus",$data->status)',
                'filter' => Lookup::items('datapickStatus'),
            ),

        ),
        'pagerCssClass' => 'pager',
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination pagination-sm'),
            'cssFile' => false,
            'header' => '',
            'firstPageLabel' => '',
            'prevPageLabel' => '&laquo;',
            'nextPageLabel' => '&raquo;',
            'lastPageLabel' => '',

        ),
        'template' => '{items}{pager}',
    ));
    ?>
</div>

<div class="jumbotron">
    <h1>Calendar</h1>

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

    <div class="anchor"></div>
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

    });
</script>