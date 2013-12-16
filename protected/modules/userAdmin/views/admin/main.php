<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fileuploader.js"></script>
<h1>Слайдер</h1>
<div class="slider">
    <form>
        <div style="width: <?php echo(230 * count($slides)); ?>px" id="sortable">
            <?php foreach ($slides as $slide): ?>
                <?php if ($slide->position == 2) {
                    $title = 'Этот слайд не отображается на главной';
                    $pos = 'Показать';
                } else {
                    $title = '';
                    $pos = 'Скрыть';
                }
                ?>
                <div slide_id="<?php echo $slide->id; ?>" slide_order="<?php echo $slide->order; ?>"
                     class="slide slide_position_<?php echo $slide->position; ?>" title="<?php echo $title; ?>">
                    <div class="">
                        ID слайда
                        <b><?php echo $slide->id; ?></b>
                    </div>
                    <div class="">
                        Порядковый номер
                        <b class="order_slide"><?php echo $slide->order; ?></b>
                    </div>
                    <div class="slide_button">
                        <div class="position_side" title="<?php echo $pos; ?>"
                             onclick="positionSlide(<?php echo $slide->id; ?>)"></div>
                        <div class="delete_slide" title="Удалить"
                             onclick="deleteSlide(<?php echo $slide->id; ?>)"></div>
                    </div>
                    <?php if (isset($slide->uploadedfiles)): ?>
                        <?php $file_name ?>
                        <img width="94px" hidden="40px"
                             src="../../uploads/<?php echo $slide->uploadedfiles->name; ?>"/>
                    <?php endif; ?>
                    <div class="uploded_file">
                        <div class="">
                            <div id="download_file_<?php echo $slide->id; ?>">


                                <noscript>
                                    <p>Включите JavaScript чтобы испльзовать file uploader.</p>
                                </noscript>
                            </div>
                        </div>
                    </div>
                    <script>
                        var uploader = new qq.FileUploader({
                            element: document.getElementById('download_file_<?php echo $slide->id; ?>'),
                            multiple: false,
                            action: '/userAdmin/admin/downloadFile?type=3&id=<?php echo $slide->id; ?>; ?>',
                            debug: false,
                            onSubmit: function (id, fileName) {
                                //
                            },
                            onComplete: function (id, fileName, responseText) {
                                $('.download_file_5 .qq-upload-list').append('<img width="94" hidden="40" src="../../uploads/' + fileName + '" />')
                                alert('Сохранено');
                                location.reload();
                            }
                        });
                    </script>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</div>
<div class="slider_button">
    <input type="submit" value="Cоздать новый" onclick="createSleder();return false"/>
    <input type="submit" value="Сохранить позиционирование" onclick="saveSledePosition();return false"/>
</div>
<hr/>
<h1>Контакты</h1>

<?php $labels = array(
    'anschrift' => 'Адрес',
    'tel_hotline' => 'Тел. гор.линии',
    'tel' => 'Телефон',
    'tel_handy' => 'Моб. телефон',
    'email' => 'Эл. почта',
    'full_name' => 'Название организации',
    'coperite' => 'Копирайт',
    'map' => 'Карта',

);?>
<form id="user_data" class="classic_form">
    <?php foreach ($contacts as $attribute => $val): ?>
        <label>
        <span>
        <?php echo $labels[$attribute]; ?>
            </span>
            <?php if ($attribute == 'map'): ?>
                <textarea name="Contacts[<?php echo $attribute; ?>]"><?php echo $val; ?></textarea>
                <span class="map_hint">
                    Воспользуйтесь <a href="http://api.yandex.ru/maps/tools/constructor/">Конструктором карт</a>, что бы получить необходимый код.
                    Не забудь изменить размер окна карты в скрипет(ширина высота)
                </span>
            <?php else: ?>
                <input type="text" name="Contacts[<?php echo $attribute; ?>]" value="<?php echo $val; ?>">
            <?php endif; ?>
        </label>
    <?php endforeach; ?>
    <input type="submit" value="Изменить" onclick="updateUser();return false">
</form>
<div class="anchor"></div>
<hr/>
<h1>О КОМПАНИИ</h1>
<form id="maine_about" class="classic_form">
    <label>
        Для выделениея абзаца, используйте разметку
        <br/>&#60;p&#62;Абзац&#60;/p&#62;
        <textarea name="Contacts[about_maine]" style="width: 100%;height: 300px"><?php echo $about_maine->val; ?></textarea>
        <input type="submit" value="Сохранить" onclick="updateAboutMaine();return false">
    </label>
</form>
<div class="anchor"></div>
<hr/>
<h1>ПРЕИМУЩЕСТВА</h1>
<form id="maine_plus" class="classic_form">
    <label>
        Для создания списка, используйте разметку
        </br>&#60;li&#62;первое преимущество&#60;/li&#62;
        </br>&#60;li&#62;второе преимущество&#60;/li&#62;
        <textarea name="Contacts[about_plus]" style="width: 100%;height: 300px"><?php echo $about_plus->val;?></textarea>
        <input type="submit" value="Сохранить" onclick="updatePlusMaine();return false">
    </label>
</form>
<script>
    $(function () {
        $("#sortable").sortable({
            cursor: "move",
            axis: "x",
            update: function (event, ui) {
                $.each($('.slide'), function (key, el) {
                    var index = key + 1;
                    $(el).attr('slide_order', index);
                    $(el).find('.order_slide').html(index);
                });
            }
        });
    });
    function updateUser() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/main',
            dataType: "json",
            data: $('#user_data').serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Изменено');
                    location.reload();
                }

            }
        });
    }
    function createSleder() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/createSleder',
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Ноывй слайд создан');
                    location.reload();
                }

            }
        });
    }
    function positionSlide(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/positionSlide?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Слайд изменен');
                    location.reload();
                }

            }
        });
    }
    function saveSledePosition() {
        var slides = [];
        $.each($('.slide'), function (key, el) {
            slides[key] = $(el).attr('slide_id');
        });
        //console.log(slides);
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/saveSledePosition',
            dataType: "json",
            data: ({
                'slides': slides
            }),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Сохранено');
                }

            }
        });
    }
    function deleteSlide(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteSlide?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Слайд удален');
                    location.reload();
                }

            }
        });
    }
    function updateAboutMaine() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/updateAboutMaine',
            dataType: "json",
            data: $('#maine_about').serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Сохранено');
                    location.reload();
                }

            }
        });
    }
    function updatePlusMaine() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/updatePlusMaine',
            dataType: "json",
            data: $('#maine_plus').serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Сохранено');
                    location.reload();
                }

            }
        });
    }
</script>

<div class="anchor"></div>

<style>
    .qq-upload-list {
        border: none !important;
    }
</style>