<div class="jumbotron">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'review-grid',
        'dataProvider' => $review->search(),
        'cssFile' => false,
        'itemsCssClass' => 'table table-hover',
        'columns' => array(
            array(
                'name' => '№',
                'value' => '$data->id',
            ),
            array(
                'name' => 'Имя',
                'value' => '$data->name',
            ),
            array(
                'name' => 'Текст',
                'value' => '$data->text',
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

