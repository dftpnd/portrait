<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Административная панель</title>
</head>
<body data-spy="scroll" data-target=".navbar-example">
<?php $this->renderPartial('application.views.layouts._door'); ?>
<div class="universe">
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <?php $this->renderPartial('application.modules.userAdmin.views.layouts._menu') ?>
                <h3 class="text-muted">Админка</h3>
            </div>
            <?php echo $content; ?>
            <div class="anchor"></div>
        </div>
        <div class="push"></div>
    </div>
    <div class="anchor"></div>

    <div class="footer">
        © BFP 2013
    </div>
</div>
</body>
</html>


