<?php $location = get_sub_field('location'); ?>

<?php if( !empty($location) ): ?>
    <div class="acf-map" data-zoom = "16">
        <div class="marker marker-fixed" data-type="fixed" data-marker-image="<?php bloginfo( 'template_url' ); ?>/img/marker.png" data-marker-image-hover="<?php bloginfo( 'template_url' ); ?>/img/marker.png" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
<?php endif; ?>