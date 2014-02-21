<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="ru"/>
    <title>База отдыха Илеть</title>
    <link href="/favicon.gif" rel="icon" type="image/x-icon"/>
    <link href="/favicon.gif" rel="shortcut icon" type="image/x-icon"/>
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBeYC5t9v6gdSm-utyFxVNbGoxZPv1YCD8&sensor=false">
    </script>
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(55.9407024, 48.1917855),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                mapOptions);
        }
    </script>
</head>
<body>
<div class="help-menu">
    <ul class="centrator">
        <li id="hp-about">
            <a href="/#about">О базе отдыха Илеть</a>
        </li>
        <li id="hp-wherewe">
            <a href="/#wherewe">Как до нас добраться</a>
        </li>
        <li id="hp-ourhome">
            <a href="/#ourhome">Наши коттеджи</a>
        </li>
        <li id="hp-reservation">
            <a href="/#reservation">Календарь бронирования</a>
        </li>
    </ul>
</div>
<div class="universe">
    <div class="wrapper">
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

                        <button class="button callback-btn"></button>
                    </li>
                    <li class="helper"></li>
                </ul>
            </div>
            <!-- Modal -->
            <div id="callback-modal" class="modal callback-modal" tabindex="1" data-width="300">
                <div class="modal-content">
                    <div class="link"></div>
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-hidden="true"></button>
                    <div class="anchor"></div>
                    <div class="modal-body">
                        <h4>Оставьте номер,</h4>

                        <p class="callback-title">мы перезвоним Вам сами</p>

                        <div class="error-field">
                            <p class="error-text">Поле обязательно для заполнения!</p>
                            <input type="text" placeholder="*Ваше имя" class=""/>
                        </div>
                        <div class="error-text">
                            <p class="hidden">Поле обязательно для заполнения!</p>
                            <input type="text" placeholder="*Ваш телефон" class=""/>
                        </div>
                        <button class="callback-modal-btn"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="after_head"></div>



        <?php echo $content; ?>
        <div class="acnhor"></div>
    </div>

</div>

</body>
</html>
