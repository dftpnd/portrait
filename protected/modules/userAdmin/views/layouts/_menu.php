<div class="navbar-example">
    <?php

    $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'nav nav-pills pull-right'),
        'items' => array(
            array(
                'label' => 'Заявки',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/calendar'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'calendar')
            ),
            array(
                'label' => 'Обратный звонок',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/callback'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'callback')
            ),
            array(
                'label' => 'Домики',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/form'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'form')
            ),
            array(
                'label' => 'Отзывы',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/review'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'review')
            ),
            array(
                'label' => 'Учетные данные',
                'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/index'),
                'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'index')
            ),
            array(
                'label' => 'Выход',
                'url' => Yii::app()->urlManager->createUrl('/site/logout'),
            ),
        ),));
    ?>

</div>