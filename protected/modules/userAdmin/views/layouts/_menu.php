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
            'label' => 'srbac',
            'url' => Yii::app()->urlManager->createUrl('/srbac/authitem/manage'),
            'active' => (Yii::app()->controller->getId() == 'authitem')
        ),
        array(
            'label' => 'Выход',
            'url' => Yii::app()->urlManager->createUrl('/site/logout'),
        ),
    ),));
?>

