<div class="owl-carousel lg__gallery">
    <?php $m = 1; foreach ($media as $image) { ?>
        <div class="item" data-position="<?php echo $m; ?>">
            <a href="<?php echo $image['url']; ?>">
                <img src="<?php echo $image['url']; ?>" >
            </a>
        </div>
    <?php $m++; }  ?>
</div>
