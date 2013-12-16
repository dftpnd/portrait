<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fileuploader.js"></script>
<h1>Тэги</h1>
<h2>Создать тэг</h2>
<form id="tags" class="classic_form">
    <label>
        <span>Название нового тега</span>
        <input type="text" name="Tag[text]">
    </label>
    <label>
        <span>id тэга</span>
        <input type="text" name="Tag[tag]">
    </label>
    <input type="submit" onclick="saveTag();return false" value="Создать">

    <div class="anchor"></div>
</form>

<h2>Все тэги</h2>
<ul class="tag_list">
    <?php foreach ($tags as $tag) : ?>
        <li>
            <?php echo $tag->text; ?>
            <span class="delete_tag" title="удалить" onclick="deleteTag(<?php echo $tag->id; ?>)"></span>
        </li>
    <?php endforeach; ?>
</ul>
<hr>
<h1>Портфолио</h1>
<h2>Создать портфолио</h2>
<form id="portfolio" class="classic_form">
    <label>
        <span>Название</span>
        <input type="text" name="Portfolio[title]">
    </label>
    <label>
        <span>Адрес</span>
        <input type="text" name="Portfolio[address]">
    </label>
    <label>
        <span>Площадь</span>
        <input type="text" name="Portfolio[area]">
    </label>
    <input type="submit" onclick="savePortfolio();return false" value="Создать">

    <div class="anchor"></div>
</form>

<h2>Все портфолио</h2>
<?php foreach ($portfolios as $portfolio): ?>
    <div class="block_port">
        <form id="portfolio_<?php echo $portfolio->id; ?>" class="classic_form">
            <label>
                <span>Название</span>
                <input type="text" name="Portfolio[title]" value="<?php echo $portfolio->title; ?>">
            </label>
            <label>
                <span>Адрес</span>
                <input type="text" name="Portfolio[address]" value="<?php echo $portfolio->address; ?>">
            </label>
            <label>
                <span>Площадь</span>
                <input type="text" name="Portfolio[area]" value="<?php echo $portfolio->area; ?>">
            </label>
            <label>
                <span>Тэг</span>
                <select name='Portfolio[tag_id]'>
                    <option value="0"> &mdash; </option>
                    <?php foreach ($tags as $tag): ?>
                        <?php if ($tag->id == $portfolio->tag_id): ?>
                            <?php $selecte = 'selected="selected"'; ?>
                        <?php else: ?>
                            <?php $selecte = ''; ?>
                        <?php endif; ?>
                        <option
                            value="<?php echo $tag->id; ?>" <?php echo $selecte; ?>><?php echo $tag->text; ?></option>

                    <?php endforeach; ?>
                </select>
            </label>
            <input type="submit" onclick="updatePortfolio(<?php echo $portfolio->id ?>);return false" value="Сохранить">

            <div class="anchor"></div>


            <div class="anchor"></div>
        </form>
        <label class="zagr_img"><span>Заг. изображение</span></label>

        <div class="download_picter">
            <div class="uploded_file_">
                <div class="">
                    <div id="download_file_<?php echo $portfolio->id; ?>">
                        <noscript>
                            <p>Включите JavaScript чтобы испльзовать file uploader.</p>
                        </noscript>
                    </div>
                </div>
            </div>
            <div class="anchor"></div>

            <script>
                var uploader = new qq.FileUploader({
                    element: document.getElementById('download_file_<?php echo $portfolio->id; ?>'),
                    multiple: false,
                    action: '/userAdmin/admin/downloadFile?type=1&id=<?php echo $portfolio->id; ?>',
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
            <div class="anchor"></div>
            <?php if (isset($portfolio->uploadedfiles)): ?>
                <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/' . $portfolio->uploadedfiles->name ?>"/>
            <?php endif; ?>
        </div>
        <?php if (isset($portfolio->uploadedfiles)): ?>
            <span class="delete" style="top:300px;" onclick="deleteFilePortfolio(<?php echo $portfolio->id ?>)">Удалить изображение</span>
        <?php endif; ?>
        <span class="delete" onclick="deletePortfolio(<?php echo $portfolio->id; ?>)"
              title="Удалить портфолио">удалить</span>
    </div>
    <hr>
<?php endforeach; ?>



<script>
    function saveTag() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/saveTag',
            dataType: "json",
            data: $('#tags').serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    } else {
                        alert(data.text.tag);
                    }
                }

            }
        });
    }
    function savePortfolio() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/savePortfolio',
            dataType: "json",
            data: $('#portfolio').serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    } else {
                        alert(data.text.tag);
                    }
                }

            }
        });
    }
    function updatePortfolio(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/updatePortfolio?id=' + id,
            dataType: "json",
            data: $('#portfolio_' + id).serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    } else {
                        alert(data.text.tag);
                    }
                }

            }
        });
    }
    function deleteFilePortfolio(portfolio_id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteFilePortfolio?id=' + portfolio_id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Удалено');
                        location.reload();
                    } else {
                        alert(data.text.tag);
                    }
                }

            }
        });
    }
    function deletePortfolio(portfolio_id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deletePortfolio?id=' + portfolio_id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Удалено');
                        location.reload();
                    } else {
                        alert(data.text.tag);
                    }
                }

            }
        });
    }
    function deleteTag(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteTag?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Удалено');
                        location.reload();
                    } else {
                        alert(data.text.tag);
                    }
                }

            }
        });
    }
</script>