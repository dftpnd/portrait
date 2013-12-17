<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array(
            'label' => 'index',
            'url' => Yii::app()->urlManager->createUrl('site/index'),
            'active' => (Yii::app()->controller->getId() == 'site' &&
                Yii::app()->controller->getAction()->getId() == 'about')
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
