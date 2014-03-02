<?php foreach ($uploads->upload as $upload): ?>
    <?php $img_src = "/uploads/{$upload->home_id}/{$upload->source}"; ?>
    <?php $img_thumb_src = "/uploads/thumbs/{$upload->source}"; ?>

    <li>

        <a class="thumb" name="leaf"
           href="<?php echo $img_src; ?>" title="Title #0">
            <img src="<?php echo $img_thumb_src; ?>"
                 alt="Title #0"/>
        </a>

        <div class="caption">
            <div class="download">
                <a href="<?php echo $img_src; ?>">Download
                    Original</a>
            </div>
            <div class="image-title">Title #0</div>
            <div class="image-desc">Description</div>
        </div>
    </li>
<?php endforeach; ?>

