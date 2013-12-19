<?php
$this->widget('zii.widgets.CMenu', array(
    'htmlOptions' => array('class' => 'scrollmenu main-menu anchor2 centrator ', 'id' => 'fixed-main-menu'),
    'items' => array(
        array(
            'label' => 'index',
            'url' => Yii::app()->urlManager->createUrl('site/index'),
        ),
        array(
            'label' => 'test_1',
            'url' => Yii::app()->urlManager->createUrl('#test_1'),
        ),
        array(
            'label' => 'test_2',
            'url' => Yii::app()->urlManager->createUrl('#test_2'),
        ),
        array(
            'label' => 'test_3',
            'url' => Yii::app()->urlManager->createUrl('#test_3'),
        ),
        array(
            'label' => 'Вход',
            'url' => ('/site/login'),
            'visible' => Yii::app()->user->isGuest,
        ),
        array(
            'label' => 'Выход',
            'url' => Yii::app()->urlManager->createUrl('site/logout'),
            'visible' => !Yii::app()->user->isGuest)
    ),));
?>
