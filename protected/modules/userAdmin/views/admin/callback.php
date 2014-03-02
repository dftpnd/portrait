<div class="jumbotron">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'callback-grid',
        'dataProvider' => $callback->search(),
        'cssFile' => false,
        'itemsCssClass' => 'table table-hover',
        'columns' => array(
            array(
                'name' => 'Имя',
                'value' => '$data->name',
            ),
            array(
                'name' => 'Телефон',
                'value' => '$data->phone',
            ),
            array(
                'name' => 'Почта',
                'value' => '$data->email',
            ),
            array(
                'name' => 'Дата создания',
                'value' => '$data->created',
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

