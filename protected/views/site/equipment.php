<div class="section equipment">


    <h2>Оборудование</h2>

    <?php foreach ($pgs as $pg): ?>
        <?php if (!empty($pg->equipment)): ?>
            <div class="equipment-box">
                <a name="<?php echo $pg->name; ?>"></a>
                <h4><?php echo $pg->name; ?></h4>
                <?php if (count($pg->equipment) > 5): ?>
                    <span class="more-equipment"
                          onclick="showEquipment($(this))">еще <?php echo(count($pg->equipment) - 5); ?>
                        производителя
            </span>
                <?php endif; ?>
                <ul class="equipment-list">
                    <?php $index = 1; ?>
                    <?php foreach ($pg->equipment as $equipment): ?>
                        <?php if ($index > 5) {
                            $hide_class = 'hide_class';
                        } else {
                            $hide_class = '';
                        }
                        ?>
                        <li class="<?php echo $hide_class; ?>">
                            <?php if (isset($equipment->uploadedfiles->name)): ?>
                                <?php $img = $equipment->uploadedfiles->name ?>
                            <?php else: ?>
                                <?php $img = '' ?>
                            <?php endif; ?>
                            <img
                                src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/<?php echo $img; ?>"/>
                            <a href="/production/<?php echo $pg->id ?>#<?php echo $equipment->name; ?>"><?php echo $equipment->name; ?></a>
                        </li>
                        <?php $index++; ?>
                    <?php endforeach; ?>
                </ul>
                <div class="anchor"></div>
            </div>
        <?php endif; ?>
        <?php $index = 1; ?>
    <?php endforeach; ?>
</div>
<script>
    function showEquipment(el) {
        el.siblings('.equipment-list').find('.hide_class').show();
        el.remove();
    }
</script>