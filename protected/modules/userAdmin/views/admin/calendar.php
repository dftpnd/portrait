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
        'rowCssClassExpression' => '("popup_prepear row_status_$data->status")',
        'columns' => array(
            array(
                'name' => 'datapick',
                'type' => 'raw',
                'value' => array($datapick, 'popupPrepear'),
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
            array(
                'name' => '№ домика',
                'value' => '$data->home_id',
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

