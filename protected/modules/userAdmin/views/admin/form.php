<div>
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

    <?php $this->renderPartial('_upload', array('home_id' => $home_id)); ?>
    <?php // $this->renderPartial('_uploads', array('uploads' => $uploads)); ?>
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
    <?php  echo $form->labelEx($model, 'name'); ?>
    <?php  echo $form->textField($model, 'name'); ?>
    <?php  echo $form->error($model, 'name'); ?>
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

                    <a download="Screenshot from 2014-02-14 14:35:42.png" rel="gallery"
                       title="<?php echo $file->name; ?>" href="<?php echo $file->source; ?>">
                        <img src="<?php echo $file->source; ?>">
                    </a>
                </td>
                <td class="name">
                    <a download="Screenshot from 2014-02-14 14:35:42.png" rel="gallery"
                       title="Screenshot from 2014-02-14 14:35:42.png" href="<?php echo $file->source; ?>">Screenshot
                        from 2014-02-14 14:35:42.png</a>
                </td>
                <td class="size">
                    <span>266.63 KB</span>
                </td>
                <td colspan="2"></td>
                <td class="delete">
                    <button class="btn btn-danger"
                            data-url="/userAdmin/admin/upload/_method/delete/file/<?php echo $file->name; ?>"
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
</div>

<button id="home-update" type="submit">Submit</button>