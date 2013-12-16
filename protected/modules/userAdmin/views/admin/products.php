<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fileuploader.js"></script>
<h1>Продуктные группы</h1>
<h2>Создать группу</h2>
<form id="group" class="classic_form">
    <label>
        <span>Название группы</span>
        <input type="text" name="ProductsGroup[name]">
    </label>
    <input type="submit" onclick="saveProductsGroup();return false" value="Создать">

    <div class="anchor"></div>
</form>

<h2>Все группы</h2>
<ul class="tag_list">
    <?php foreach ($pgs as $pg) : ?>
        <li>
            <?php echo $pg->name; ?>
            <span class="delete_tag" title="удалить" onclick="deletePg(<?php echo $pg->id; ?>)"></span>
        </li>
    <?php endforeach; ?>
</ul>
<hr>
<h1>Продукция</h1>
<h2>Создать продукт</h2>
<form id="equipment_0" class="classic_form">
    <label>
        <span>Название</span>
        <input type="text" name="Equipment[name]">
    </label>
    <label>
        <span>Привязка к группе</span>
        <select name="Equipment[pg_id]">
            <option value="0">&mdash;</option>
            <?php foreach ($pgs as $pg) : ?>
                <option value="<?php echo $pg->id; ?>">
                    <?php echo $pg->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <input type="submit" onclick="saveEquipment(0);return false" value="Создать">

    <div class="anchor"></div>
</form>
<h2>Все продукты</h2>

<?php foreach ($equipments as $equipment): ?>
    <div class="block_port">
        <a href="/userAdmin/admin/info?id=<?php echo $equipment->id; ?>" class="create-updete-info">Создать/Изменить Описание продукта</a>

        <form id="equipment_<?php echo $equipment->id; ?>" class="classic_form">
            <label>
                <span>Название</span>
                <input type="text" name="Equipment[name]" value="<?php echo $equipment->name; ?>">
            </label>
            <label>
                <span>Группа</span>
                <select name='Equipment[pg_id]'>
                    <option value="0"> &mdash; </option>
                    <?php foreach ($pgs as $pg): ?>
                        <?php if ($pg->id == $equipment->pg_id): ?>
                            <?php $selecte = 'selected="selected"'; ?>
                        <?php else: ?>
                            <?php $selecte = ''; ?>
                        <?php endif; ?>
                        <option
                            value="<?php echo $pg->id; ?>" <?php echo $selecte; ?>><?php echo $pg->name; ?></option>

                    <?php endforeach; ?>
                </select>
            </label>
            <input type="submit" onclick="saveEquipment(<?php echo $equipment->id; ?>);return false" value="Сохранить">

            <div class="anchor"></div>
        </form>
        <label class="zagr_img"><span>Заг. изображение</span></label>

        <div class="download_picter">
            <div class="uploded_file_">
                <div class="">
                    <div id="download_file_<?php echo $equipment->id; ?>">
                        <noscript>
                            <p>Включите JavaScript чтобы испльзовать file uploader.</p>
                        </noscript>
                    </div>
                </div>
            </div>
            <div class="anchor"></div>

            <script>
                var uploader = new qq.FileUploader({
                    element: document.getElementById('download_file_<?php echo $equipment->id; ?>'),
                    multiple: false,
                    action: '/userAdmin/admin/downloadFile?type=2&id=<?php echo $equipment->id; ?>',
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
            <?php if (isset($equipment->uploadedfiles)): ?>
                <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/' . $equipment->uploadedfiles->name ?>"/>
            <?php endif; ?>
        </div>
        <?php if (isset($equipment->uploadedfiles)): ?>
            <span class="delete" style="top:230px;" onclick="deleteFileEquipment(<?php echo $equipment->id ?>)">Удалить изображение</span>
        <?php endif; ?>
        <span class="delete" onclick="deleteEquipment(<?php echo $equipment->id; ?>)"
              title="Удалить портфолио">удалить</span>
    </div>
    <hr>
<?php endforeach; ?>
<script>
    function saveProductsGroup() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/saveProductsGroup',
            dataType: "json",
            data: $('#group').serialize(),
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
    function deletePg(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deletePg?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    }
                }

            }
        });
    }
    function saveEquipment(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/saveEquipment?id=' + id,
            dataType: "json",
            data: $('#equipment_' + id).serialize(),
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    }
                }

            }
        });
    }

    function deleteFileEquipment(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteFileEquipment?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    }
                }

            }
        });
    }
    function deleteEquipment(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteEquipment?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    if (data.status == 'succses') {
                        alert('Сохранено');
                        location.reload();
                    }
                }

            }
        });
    }

</script>
