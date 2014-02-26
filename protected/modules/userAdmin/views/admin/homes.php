<div>
    <form method="get" action="/userAdmin/admin/homes">
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
    <?php $this->renderPartial('_uploads', array('uploads' => $uploads)); ?>
</div>

<?php
$this->widget('xupload.XUpload', array(
    'url' => Yii::app()->createUrl("/userAdmin/admin/upload"),
    'model' => $model,
    'attribute' => 'file',
    'multiple' => true,
));
?>