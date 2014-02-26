<div class="inserter">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-popup-sender',
        'action' => '/userAdmin/admin/popupsender',
        'method' => 'post',
        'enableAjaxValidation' => false,

    )); ?>

    <input type="hidden" name="datapick_id" value="<?php echo $model->id; ?>">

    <h3>Просмотр заявки</h3>

    <div class="">
        <label>
            Дата подачи заявки
        </label>
        <?php echo $model->created; ?>
    </div>
    <div class="">
        <label>
            Дата бронирования
        </label>
        <?php echo $model->datapick ?>
    </div>
    <div class="">
        <label>
            ФИО
        </label>
        <?php echo $model->name; ?>

    </div>
    <div class="">
        <label>
            Телефон
        </label>
        <?php echo $model->phone; ?>
    </div>
    <div class="">
        <label>
            Номер домика
        </label>
        <?php echo $model->home_id; ?>
    </div>
    <?php if (isset($model->enail)): ?>
        <div class="">
            <label>
                e-mail
            </label>
            <?php echo $model->enail; ?>
        </div>
    <?php endif; ?>
    <div>
        <label>
            Статус
        </label>
        <?php echo $form->dropDownList($model, 'status', Lookup::items('datapickStatus')); ?>
    </div>
    <div class="door_but anchor2">
        <button type="button" id="popup-sender" class="btn btn btn-primary">Сохранить</button>
        <button type="button" class="btn btn-default" onclick="closeDoor()">Отмена</button>
    </div>
    <?php $this->endWidget(); ?>
</div>