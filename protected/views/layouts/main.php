<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>
    <title>База отдыха Илеть</title>
    <link href="/favicon.gif" rel="icon" type="image/x-icon"/>
    <link href="/favicon.gif" rel="shortcut icon" type="image/x-icon"/>
</head>
<body>
<div class="universe">
    <div class="wrapper">
        <div class="header_control"></div>
        <div class="header fixerus header_control" id="fixed-main-menu">
            <div class="centrator">

                <ul class="head-ul">
                    <li class="logo">
                        <a href="/#main" id="linklogo">
                            <div class="logo-img"></div>
                            <div class="logo-text">
                                <h3 class="turquoise">База отдыха <b>Илеть</b></h3>

                                <h3 class="d-turquoise">в Марий Эл</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <nav>
                            <?php $this->renderPartial('application.views.layouts._menu'); ?>
                        </nav>
                    </li>
                    <li class="contacts">
                        <h2>+7 (962) 561-67-39</h2>

                        <div class="button"></div>
                    </li>
                    <li class="helper"></li>
                </ul>
            </div>
        </div>
        <div class="after_head"></div>



        <?php echo $content; ?>
        <div class="acnhor"></div>
    </div>
    <div class="footer centrator">

    </div>
</div>

</body>
</html>
