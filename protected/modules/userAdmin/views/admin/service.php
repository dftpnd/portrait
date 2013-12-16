<h1>Сервис</h1>

<form id="service">
    <div class="table">
        <div class='tr'>
            <div class="td">

            </div>
            <div class="td">
                Заголовок
            </div>
            <div class="td">
                Цена
            </div>
            <div class="td">
                Описание
            </div>
        </div>
        <?php foreach ($models as $model): ?>
            <div class='tr'>
                <div class="td">
                    <img src="/img/e/<?php echo $model->id; ?>.png"/>
                </div>
                <div class="td">
                    <input type="text" name="Service[<?php echo $model->id; ?>][name]"
                           value="<?php echo $model->name; ?>"/>
                </div>
                <div class="td">
                    <input type="text" name="Service[<?php echo $model->id; ?>][pay]"
                           value="<?php echo $model->pay; ?>"/>
                </div>
                <div class="td">
                    <textarea name="Service[<?php echo $model->id; ?>][val]"><?php echo $model->val; ?></textarea>
                </div>
            </div>
        <?php endforeach; ?>
        <div class='tr'>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td"></div>
            <div class="td">
                <input type="submit" value="Изменить" onclick="updateService();return false">
            </div>
        </div>
    </div>
</form>

<script>
    function updateService() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/updateService',
            dataType: "json",
            data: $('#service').serialize(),
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