<div id="menu">
  <div id="all-site-button" onclick="stopPrepagenation(event)" >
<!--    <span>Весь сайт</span>-->
  </div>
  <?php
  $this->widget('zii.widgets.CMenu', array(
      'items' => array(
          array(
              'label' => 'О компании',
              'url' => Yii::app()->urlManager->createUrl('site/about'),
              'active' => (Yii::app()->controller->getId() == 'site' &&
              Yii::app()->controller->getAction()->getId() == 'about')
          ),
          array(
              'label' => 'Оборудование',
              'url' => Yii::app()->urlManager->createUrl('site/equipment'),
              'active' => (Yii::app()->controller->getId() == 'site' &&
              Yii::app()->controller->getAction()->getId() == 'equipment')
          ),
          array(
              'label' => 'Услуги',
              'url' => Yii::app()->urlManager->createUrl('site/services'),
              'active' => (Yii::app()->controller->getId() == 'site' &&
              Yii::app()->controller->getAction()->getId() == 'services')
          ),
          array(
              'label' => 'Работы',
              'url' => Yii::app()->urlManager->createUrl('site/works'),
              'active' => (Yii::app()->controller->getId() == 'site' &&
              Yii::app()->controller->getAction()->getId() == 'works')
          ),
          array(
              'label' => 'Контакты',
              'url' => Yii::app()->urlManager->createUrl('about#contact'),
          ),
//          array(
//              'label' => 'Вход',
//              'url' => ('#'),
//              'linkOptions' => array('onclick' => 'EnterSite()'),
//              'visible' => Yii::app()->user->isGuest,
//          ),
//          array(
//              'label' => 'Выход',
//              'url' => Yii::app()->urlManager->createUrl('site/logout'),
//              'visible' => !Yii::app()->user->isGuest
//          )
      ),));
  ?>
</div>
