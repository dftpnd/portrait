<div class="section">
    <h2>Работы</h2>

    <div class="other-works">
        <span>а так же</span>
        <ul>
            <li>Гостиницы,</li>
            <li>Теплицы,</li>
            <li>Теплоходы,</li>
            <li>Медицинские учреждения
                и многое другое.
            </li>
        </ul>
    </div>
    <?php foreach ($tags as $tag): ?>
        <?php if (!empty($tag->portfolio)): ?>
            <a name="<?php echo $tag->tag ?>"></a>
            <h5><?php echo $tag->text ?></h5>

            <?php foreach ($tag->portfolio as $portfolio): ?>
                <div class="work-box">
                    <img class="work-img" src='../../uploads/<?php echo $portfolio->uploadedfiles->name ?>'/>
                    <span class="work-title"><?php echo $portfolio->title ?></span>

                    <div class="work-description">
                        <?php if (!empty($portfolio->address)): ?>
                            <div>Адрес</div>
                            <span><?php echo $portfolio->address ?></span>
                        <?php endif; ?>
                        <?php if (!empty($portfolio->area)): ?>
                            <div>Площадь объекта</div>
                            <span><?php echo $portfolio->area ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="anchor"></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    <?php endforeach; ?>

</div>