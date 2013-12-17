<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Административная панель</title>
</head>
<body>
<div class="container">
    <div class="header">
        <?php $this->renderPartial('application.modules.userAdmin.views.layouts._menu') ?>
        <h3 class="text-muted">Админка</h3>
    </div>
    <?php echo $content; ?>
    <div class="anchor"></div>
    <div class="footer">
        © BFP 2013
    </div>
</div>
</body>
</html>


