<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'somemodel-form',
    'enableAjaxValidation' => false,
    //This is very important when uploading files
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
<div class="row">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name'); ?>
    <?php echo $form->error($model, 'name'); ?>
</div>
<div class="row">
    <?php echo $form->labelEx($model, 'text'); ?>
    <?php echo $form->textField($model, 'text'); ?>
    <?php echo $form->error($model, 'text'); ?>
</div>
<button type="submit">Submit</button>
<!-- Other Fields... -->
<div class="row">
    <?php echo $form->labelEx($model, 'photos'); ?>
    <?php
    $this->widget('xupload.XUpload', array(
            'url' => Yii::app()->createUrl("/userAdmin/admin/upload"),
            //our XUploadForm
            'model' => $photos,
            //We set this for the widget to be able to target our own form
            'htmlOptions' => array('id' => 'somemodel-form'),
            'attribute' => 'file',
            'multiple' => true,
            //Note that we are using a custom view for our widget
            //Thats becase the default widget includes the 'form'
            //which we don't want here
            //'formView' => 'application.views.somemodel._form',
        )
    );
    ?>
</div>

<?php $this->endWidget(); ?>
