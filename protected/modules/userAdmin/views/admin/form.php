<div class="row">
    <form method="get" action="/userAdmin/admin/form">
        <select id="select-home-id" name="home_id">
            <?php $i = 1; ?>
            <?php while ($i <= 5): ?>
                <?php
                $selected = '';
                if ($home_id == $i) {
                    $selected = "selected='selected'";
                }
                ?>
                <option <?php echo $selected ?> value="<?php echo $i; ?>">Домик №<?php echo $i; ?></option>
                <?php $i++; ?>
            <?php endwhile; ?>
        </select>
    </form>
    <hr/>
</div>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-home-update',
    'enableAjaxValidation' => false,
    //This is very important when uploading files
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>
<div class="row" style="display: none">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name'); ?>
    <?php echo $form->error($model, 'name'); ?>
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

<?php $this->endWidget(); ?>

<div class="row">
    <table class="table table-striped">
        <tbody class="files">
        <?php foreach ($model->upload as $file): ?>

            <tr class="template-download fade in" style="height: 66px;">
                <td class="preview">

                    <a download="/uploads/<?php echo $file->home_id; ?>/<?php echo $file->source; ?>" rel="gallery"
                       title="<?php echo $file->name; ?>"
                       href="/uploads/<?php echo $file->home_id; ?>/<?php echo $file->source; ?>">
                        <img src="/uploads/thumbs/<?php echo $file->source; ?>">
                    </a>
                </td>
                <td class="name">
                    <a download="/uploads/<?php echo $file->home_id; ?>/<?php echo $file->source; ?>" rel="gallery"
                       title="<?php echo $file->name; ?>"
                       href="/uploads/<?php echo $file->home_id; ?>/<?php echo $file->source; ?>"><?php echo $file->name; ?></a>
                </td>
                <td class="size">
                    <span><?php echo $file->size; ?> B</span>
                </td>
                <td colspan="2"></td>
                <td class="delete">
                    <button class="btn btn-danger"
                            data-url="/userAdmin/admin/upload/_method/delete/file/<?php echo $file->id; ?>"
                            data-type="POST">
                        <i class="icon-trash icon-white"></i>
                        <span>Удалить</span>
                    </button>
                    <input type="checkbox" value="1" name="delete">
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <button id="home-update" class="btn btn-default start" type="submit" style="float: right">Сохранить</button>
    <div class="anchor"></div>
</div>

