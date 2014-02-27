<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-home-update',
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
<div class="row">
    <?php echo $form->labelEx($model, 'photos'); ?>
    <?php
    $this->widget('xupload.XUpload', array(
            'url' => Yii::app()->createUrl("/userAdmin/admin/upload"),
            //our XUploadForm
            'model' => $photos,
            //We set this for the widget to be able to target our own form
            'htmlOptions' => array('id' => 'form-home-update'),
            'attribute' => 'file',
            'multiple' => true,
        )
    );
    ?>
</div>
<button id="home-update" type="submit">Submit</button>
<?php $this->endWidget(); ?>
<script>
    var files = <?php echo $files; ?>;
    console.log(files);
    //$('#template-download').
</script>