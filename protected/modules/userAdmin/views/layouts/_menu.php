<?php

$this->widget('zii.widgets.CMenu', array(
    'htmlOptions' => array('class' => 'maine_nav'),
    'items' => array(
        array(
            'label' => 'Главная',
            'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/main'),
            'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'main')
        ),
        array(
            'label' => 'О компании',
            'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/about'),
            'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'about')
        ),
        array(
            'label' => 'Оборудование',
            'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/products'),
            'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'products')
        ),
        array(
            'label' => 'Услуги',
            'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/service'),
            'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'service')
        ),
        array(
            'label' => 'Работы',
            'url' => Yii::app()->urlManager->createUrl('/userAdmin/admin/works'),
            'active' => (Yii::app()->controller->getId() == 'admin' && Yii::app()->controller->getAction()->getId() == 'works')
        ),
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

