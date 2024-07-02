<?php $hotspots = get_sub_field('hotspots'); // var_dump($hotspots); ?>

<div class="section_wrap">

	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-6">

				<!-- ANIMATION HEAD > number, section y title -->
				<div class="animated_head">
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-section.php'); ?>
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-title.php'); ?>
				</div>

			</div>

			<div class="col-lg-5 offset-lg-1 normal__animation">
				<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-precontent.php'); ?>
				<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-content.php'); ?>
			</div>

		</div>
	</div> 

</div>


<div class="draggable__wrapper">
    <div class="draggable__parent">
        <div class="draggable__content">
            <img src="<?php echo $hotspots['image_hospost']['url'] ?>" alt="">
            <?php if(!empty($hotspots['item'])): ?>
                <div class="draggable__items">
                    <?php $n = 1; foreach ($hotspots['item'] as $item) {
                        $posi = explode(',', $item['position']);
                        $label = explode(',', $item['label']);
                        ?>
                        <div class="hotspots__item" data-item="item-<?php echo $n; ?>" data-posicion_top="<?php echo $posi[1];?>" data-label_top="<?php echo $label[1];?>" style="top: <?php echo $posi[1];?>; left: <?php echo $posi[0];?>">
                            <?php  if(!empty($item['title'])): ?>    
                                <?php echo $item['title']; ?>
                            <?php else:  ?>
                                <img src="<?php bloginfo('template_url') ?>/img/nubay-hotspots.png" alt="">
                            <?php endif; ?>
                            <div class="hotspots__bar"></div>
                        </div>
                        <div class="hotspots__fake" id="item-<?php echo $n; ?>" style="top: <?php echo $label[1];?>; left: <?php echo $label[0];?>"></div>
                    <?php $n++; } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

