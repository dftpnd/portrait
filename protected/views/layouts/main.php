<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<?php $this->renderPartial('application.views.layouts._door'); ?>
<div class="universe">
    <div class="wrapper">
        <?php $this->renderPartial('application.views.layouts._menu'); ?>
        <?php echo $content; ?>
    </div>
</div>
</body>
</html>
