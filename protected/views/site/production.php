<div class="section production">
    <ul class="equipment-menu">
        <?php foreach ($pgs as $pg): ?>
            <?php if ($_GET['id'] == $pg->id) {
                $active = 'active';
                $title = $pg->name;
            } else {
                $active = '';
            }
            ?>
            <li class="<?php echo $active; ?>"><a
                    href="/site/production?id=<?php echo $pg->id; ?>"><?php echo $pg->name; ?></a></li>
        <?php endforeach; ?>


    </ul>
    <div class="equipment-content">
        <p class="mini-title">Оборудование</p>

        <h2><?php echo $title ?></h2>
        <?php foreach ($equipments as $equipment): ?>
            <?php if (!empty($equipment->text)): ?>
                <a name='<?php echo $equipment->name ?>'></a>
                <div class="company">
                    <?php if (!empty($equipment->mini_img)): ?>
                        <a href="<?php echo $equipment->adres; ?>">
                            <img src="../../uploads/<?php echo $equipment->mini_img->name; ?>"/>
                        </a>
                    <?php endif; ?>
                    <?php echo $equipment->text ?>
                    <?php if (!empty($equipment->large_img)): ?>
                        <img src="../../uploads/<?php echo $equipment->large_img->name; ?>"/>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
