<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-popup-sender',
    'action' => '/userAdmin/admin/popupsender',
    'method' => 'post',
    'enableAjaxValidation' => false,

)); ?>

<div class="vk">
    <input type="hidden" name="datapick_id" value="<?php echo $model->id; ?>">
    <h1>Просмотр заявки</h1>

    <div class="">
        <label>
            Дата подачи заявки
            <?php echo date("d.m.Y G:i",$model->created); ?>
        </label>
    </div>
    <div>
        <label>
            Статус
            <?php echo $form->dropDownList($model, 'status', Lookup::items('datapickStatus')); ?>
        </label>
    </div>
    <div class="door_but anchor2">
        <button class="btn btn-default" onclick="closeDoor();return false">Отмена</button>
        <button id="popup-sender" class="btn btn-default" onclick="sender($(this));return false">Сохранить</button>
    </div>
</div>

<?php $this->endWidget(); ?>
