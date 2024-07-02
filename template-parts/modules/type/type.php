<?php $type = get_sub_field('type'); ?>
<?php $gallery = get_sub_field('gallery'); $rand = rand(); ?>

<div class="section_wrap">

	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-6">

				<!-- ANIMATION HEAD > number, section y title -->
				<div class="animated_head">
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-section.php'); ?>
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-title.php'); ?>
                    <?php if(!empty($gallery)): ?>
                        <a class="btn__gallery btn btn-primary" data-gallery="gallery_<?php echo $rand; ?>"><?php _e('VER GALERÍA','nubay') ?></a>
                    <?php endif; ?>
				</div>

			</div>

			<div class="col-lg-5 offset-lg-1 normal__animation">
				<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-precontent.php'); ?>
				<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-content.php'); ?>
			</div>

		</div>
	</div> 

</div>

<?php if(!empty($type)): ?>

    <div class="types">

        <div class="splide" role="group">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php $m = 1; foreach ($type as $item) { ?>
                        <div class="splide__slide item">
                            <img src="<?php echo $item['image']['url']; ?>" alt="">
                            <div class="item__overlay">
                                <div class="item__section">
                                    <?php echo $item['type']; ?>
                                </div>
                                <div>
                                    <div class="item__title">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <div class="item__price">
                                        <?php echo $item['price']; ?>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    <?php $m++; }  ?>

                </ul>
            </div>
        </div>

    </div>

<?php endif; ?>

<?php if(!empty($gallery)): ?>
    <div class="lg__gallery" id="gallery_<?php echo $rand; ?>">
        <?php foreach ($gallery as $image) { ?>
            <a href="<?php echo $image['url'] ?>">image</a>
        <?php } ?>        
    </div>
<?php endif; ?>