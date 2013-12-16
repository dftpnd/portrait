<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fileuploader.js"></script>

<form id="sample" class="classic_form">
    <label>
        <span>Адрсе ссылки логотипа продукта</span>
        <input type="text" name="Equipment[adres]" value="<?php echo $model->adres; ?>" placeholder="http://adres.ru"/>
    </label>
    <span class="mini_img" onclick="miniImg(<?php echo $model->id; ?>)">Удалить изображение</span>
    <label>
        <span>Картинка логотипа продукта</span>

        <div class="uploded_file">
            <?php if (!empty($model->mini_img)): ?>
                <img src="../../uploads/<?php echo $model->mini_img->name; ?>"/>
            <?php endif; ?>

            <div id="download_file_mini_img_id">
                <noscript>
                    <p>Включите JavaScript чтобы испльзовать file uploader.</p>
                </noscript>
            </div>
        </div>
        <script>
            var uploader = new qq.FileUploader({
                element: document.getElementById('download_file_mini_img_id'),
                multiple: false,
                action: '/userAdmin/admin/downloadMiniImgId?id=<?php echo $model->id;?>',
                debug: false,
                onSubmit: function (id, fileName) {
                    //
                },
                onComplete: function (id, fileName, responseText) {
                    alert('Сохранено');
                    location.reload();
                }
            });
        </script>
    </label>
    <label>
        <span>Описание продукта</span>

        <p>Для создания стилизованного списка, используйте разметку:</p>

        <p>&#60;ul&#62;<br/>
            &#60;li&#62;Первый элемент&#60;/li&#62;<br/>
            &#60;li&#62;Второй элемент&#60;/li&#62;<br/>
            &#60;li&#62;Третий элемент&#60;/li&#62;<br/>
            &#60;/ul&#62;

            <br/>
            <br/>
            Для выделениея абзаца, используйте разметку
            <br/>&#60;p&#62;Абзац&#60;/p&#62;
            <textarea id='my_text' name="Equipment[text]"
                      style="width: 100%;min-height: 400px"><?php echo $model->text; ?></textarea>
        </p>
    </label>
    <span class="large_img" onclick="largeImg(<?php echo $model->id; ?>)">Удалить изображение</span>
    <label>
        <span>Картинка внизу под текстом</span>

        <div class="uploded_file">
            <?php if (!empty($model->large_img)): ?>
                <img src="../../uploads/<?php echo $model->large_img->name; ?>"/>
            <?php endif; ?>
            <div id="uploded_file_large_img_id">
                <noscript>
                    <p>Включите JavaScript чтобы испльзовать file uploader.</p>
                </noscript>
            </div>
        </div>
        <script>
            var uploader = new qq.FileUploader({
                element: document.getElementById('uploded_file_large_img_id'),
                multiple: false,
                action: '/userAdmin/admin/downloadLargeImgId?id=<?php echo $model->id;?>',
                debug: false,
                onSubmit: function (id, fileName) {
                    //
                },
                onComplete: function (id, fileName, responseText) {
                    alert('Сохранено');
                    location.reload();
                }
            });
        </script>
    </label>

    <input type="submit" value="Сохранить" onclick="saveEqText(<?php echo $model->id; ?>);return false"/>
</form>
<script>
    function saveEqText(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/saveEqText?id=' + id,
            dataType: "json",
            data: $('#sample').serialize(),
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
    function miniImg(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteMiniImg?id=' + id,
            dataType: "json",
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

    function largeImg(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteLargeImg?id=' + id,
            dataType: "json",
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
<style>
    .uploded_file {
        display: inline-block !important;
        margin-left: 20px !important;
    }

    .qq-upload-failed-text {
        display: none !important;
    }

    .qq-upload-list {
        display: none !important;
    }
</style>