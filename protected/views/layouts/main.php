<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.0.0.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/action.js"></script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="wrap" class="maxwidth">
    <div id="header">
        <!-- Header -->
        <div id="top-line">
            <div class="top-contacts">
                <div class="description">Телефон для связи</div>
                <div class="phone"><span class="code">8 (843) </span><span class="phone-number"><?php echo $this->contacts['tel']; ?></span></div>
            </div>
            <a class="logo" href="<?php echo $this->createAbsoluteUrl('index'); ?>"></a>
        </div>

        <!-- Menu -->
        <?php $this->renderPartial('application.views.layouts._menu', array('current_item' => 'about')) ?>
    </div>

    <div id="content">
        <?php echo $content; ?>
        <div class="anchor"></div>
    </div>
    <div class="anchor"></div>
    <div id="all-site-menu" onclick="stopPrepagenation(event)">
        <table id="full-menu">
            <tr>
                <td width="80">
                    <a class="full-menu-section" href="/site/about">О компании</a>
                    <?php foreach ($this->menu['about'] as $value): ?>
                        <a href="<?php echo $value['href']; ?>"><?php echo $value['title']; ?></a>
                    <?php endforeach; ?>
                </td>
                <td width="130">
                    <a class="full-menu-section" href="/site/equipment">Оборудование</a>

                    <?php foreach ($this->menu['equipment'] as $value): ?>
                        <a href="<?php echo $value['href']; ?>"><?php echo $value['title']; ?></a>
                    <?php endforeach; ?>
                </td>
                <td width="145">
                    <a class="full-menu-section" href="/site/equipment">Услуги</a>
                    <?php foreach ($this->menu['services'] as $value): ?>
                        <a href="<?php echo $value['href']; ?>"><?php echo $value['title']; ?></a>
                    <?php endforeach; ?>
                </td>
                <td width="90">
                    <a class="full-menu-section" href="/site/works">Работы</a>
                    <?php foreach ($this->menu['works'] as $value): ?>
                        <a href="<?php echo $value['href']; ?>"><?php echo $value['title']; ?></a>
                    <?php endforeach; ?>
                </td>
                <td width="40">
                    <a class="full-menu-section" href="/site/about#contact">Контакты</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="push"></div>
</div>
<div id="footer" class="maxwidth">
    <div class="copyright"><?php echo $this->contacts['coperite']; ?></div>
    <div class="company-name"><?php echo $this->contacts['full_name']; ?></div>
    <table class="contacts">
        <tr>
            <td>
                <?php echo $this->contacts['anschrift']; ?><br/>
                Телефон:  <?php echo $this->contacts['tel']; ?><br/>
                Электронная почта: <a
                    href="mailto:<?php echo $this->contacts['email']; ?>"> <?php echo $this->contacts['email']; ?></a>
            </td>
            <td>
                Тел. горячей линии:  <?php echo $this->contacts['tel_hotline']; ?><br/>
                Тел. мобильный:  <?php echo $this->contacts['tel_handy']; ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
