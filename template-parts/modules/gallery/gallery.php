<?php if($config['type'] == 'type-carousel'): ?>
    <?php require( TEMPLATEPATH . '/template-parts/modules/gallery/gallery-carousel.php' ); ?>
<?php else:  ?>
    <?php require( TEMPLATEPATH . '/template-parts/modules/gallery/gallery-slider.php' ); ?>
<?php endif; ?>