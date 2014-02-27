

<?php
$this->widget('xupload.XUpload', array(
    'url' => Yii::app()->createUrl("/userAdmin/admin/upload"),
    'model' => $model,
    'attribute' => 'file',
    'multiple' => true,
));
?>