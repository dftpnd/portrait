<h1>ПРЕИМУЩЕСТВА</h1>
<form id="maine_large" class="classic_form">
    <label>
        Для выделениея абзаца, используйте разметку
        <br/>&#60;p&#62;Абзац&#60;/p&#62;
        <textarea name="Contacts[about_large]"
                  style="width: 100%;height: 300px"><?php echo $about_large->val; ?></textarea>
        <input type="submit" value="Сохранить" onclick="updateLarge();return false">
    </label>
</form>
<hr/>
<h1>Вакансии</h1>
<h2>Создание вакансии</h2>
<form id="vacansy" class="classic_form">
    <label>
        <span>
        Название вакансии
            </span>
        <input type="text" name="Vacancy[title]" value="<?php ?>">
    </label>
    <label>
        <span>
        Порядковый номер
            </span>
        <input type="text" name="Vacancy[order]" placeholder="Целое число" value="<?php ?>">
    </label>
    <input type="submit" value="Сохранить" onclick="createVacancy();return false">
</form>
<div class="anchor"></div>
<h2>Редактирование вакансий</h2>
<?php foreach ($vacancys as $vacancy): ?>
    <div class="vacansy">
        <form id="vacansy_<?php echo $vacancy->id; ?>" class="classic_form">
            <label>
                <span>
                     Название вакансии
                </span>
                <input type="text" name="Vacancy[title]" value="<?php echo $vacancy->title; ?>">
            </label>
            <label>
                <span>
                     Порядковый номер
                </span>
                <input type="text" name="Vacancy[order]" value="<?php echo $vacancy->order; ?>">
            </label>
            <input type="submit" value="Изменить" onclick="updateVacancy(<?php echo $vacancy->id ?>);return false">

            <div class="anchor"></div>
        </form>
        <div class="opportunitys">
            <div class="opp">
                <form id="requirements_<?php echo $vacancy->id ?>">
                    <input type="hidden" name="Requirements[vacancy_id]" value="<?php echo $vacancy->id ?>">
                    <label>
                            <span>
                                 Обязанности
                            </span>
                        <textarea name="Requirements[text]"></textarea>

                    </label>
                    <input type="submit" value="Добавить"
                           onclick="addRequirements(<?php echo $vacancy->id ?>);return false">

                    <div class="anchor"></div>

                </form>
                <ul class="deafault">
                    <?php foreach ($vacancy->requirements as $value): ?>
                        <li>
                            <?php echo $value->text; ?>
                            <div class="close" onclick="deleteRequirements(<?php echo $value->id; ?>)"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="opp">
                <form id="charge_<?php echo $vacancy->id; ?>">
                    <input type="hidden" name="Charge[vacancy_id]" value="<?php echo $vacancy->id ?>">
                    <label>
                            <span>
                                 Требования
                            </span>
                        <textarea name="Charge[text]"></textarea>

                    </label>
                    <input type="submit" value="Добавить"
                           onclick="addCharge(<?php echo $vacancy->id ?>);return false">

                    <div class="anchor"></div>

                </form>
                <ul class="deafault">
                    <?php foreach ($vacancy->charge as $value): ?>
                        <li>
                            <?php echo $value->text; ?>
                            <div class="close" onclick="deleteCharge(<?php echo $value->id; ?>)"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="anchor"></div>
        </div>


        <div class="delete" onclick="deleteVacancy(<?php echo $vacancy->id ?>)">удалить</div>
        <?php if ($vacancy->position == 1) {
            $pos_text = "Отобразить";
        } else {
            $pos_text = "Скрыть";
        }?>
        <div class="position" onclick="positionVacancy(<?php echo $vacancy->id ?>)"><?php echo $pos_text; ?></div>
    </div>
<?php endforeach; ?>

<script>
    function createVacancy() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/createVacancy',
            dataType: "json",
            data: $('#vacansy').serialize(),
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
    function updateVacancy(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/updateVacancy?id=' + id,
            dataType: "json",
            data: $('#vacansy_' + id).serialize(),
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
    function deleteVacancy(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteVacancy?id=' + id,
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
    function addCharge(vacancy_id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/addCharge?',
            dataType: "json",
            data: $('#charge_' + vacancy_id).serialize(),
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
    function addRequirements(vacancy_id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/addRequirements',
            dataType: "json",
            data: $('#requirements_' + vacancy_id).serialize(),
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
    function deleteCharge(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteCharge?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Сохранено');
                    location.reload();
                }

            }
        })
        ;
    }
    function positionVacancy(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/positionVacancy?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Сохранено');
                    location.reload();
                }

            }
        })
        ;
    }
    function deleteRequirements(id) {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/deleteRequirements?id=' + id,
            dataType: "json",
            success: function (data) {
                if (data == null) {
                    alert('Ошибка. Попробуйте перезагрузить страницу.');
                } else {
                    alert('Сохранено');
                    location.reload();
                }

            }
        })
        ;
    }

    function updateLarge() {
        $.ajax({
            type: "POST",
            url: '/userAdmin/admin/updateLarge',
            dataType: "json",
            data: $('#maine_large').serialize(),
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
