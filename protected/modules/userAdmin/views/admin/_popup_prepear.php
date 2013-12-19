<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-lk',
    'action' => '/site/ValidatUser',
    'method' => 'post',
    'enableAjaxValidation' => false,

)); ?>

<div class="vk">
    <h1>Просмотр заявки</h1>

    <div class="">
        <label>
            created
            <input type="text" value="<?php echo $model->created; ?>"/>
        </label>
    </div>
    <div>
        <label>
            Статус
            <?php echo $form->dropDownList($model, 'status', Lookup::items('datapickStatus')); ?>
        </label>
    </div>
</div>

<?php $this->endWidget(); ?>
