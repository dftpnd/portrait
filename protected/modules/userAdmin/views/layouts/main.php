<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet/less" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.less">
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/less-1.3.3.min.js"></script>
    <title>Административная панель</title>
</head>
<body>
<div class="wrapper">
    <div class="menu">
        <?php $this->renderPartial('application.modules.userAdmin.views.layouts._menu', array('current_item' => 'about')) ?>
        <div class="anchor"></div>
    </div>
    <div class="content">
        <?php echo $content; ?>
    </div>
    <div class="push"></div>
</div>
</body>
</html>


