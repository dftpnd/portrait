<h1><?php echo $model->getTitle(); ?></h1>
<?php foreach ($model as $key => $atribute): ?>
    <div>
        <?php echo $key; ?> - <?php echo $atribute; ?>
    </div>
<?php endforeach; ?>