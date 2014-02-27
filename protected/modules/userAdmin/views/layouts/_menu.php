<div class="navbar-example">
    <?php

    $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'nav nav-pills pull-right'),
        'items' => array(

            array(
                'label' => 'Учетные данные',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/index'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'index')
            ),
            array(
                'label' => 'Календарь',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/calendar'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'calendar')
            ),
            array(
                'label' => 'Домики',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/form'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'homes')
            ),
            array(
                'label' => 'Выход',
                'url' => Yii::app()->urlManager->createUrl('/site/logout'),
            ),
        ),));
    ?>

</div>