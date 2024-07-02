<?php $icons = get_sub_field('icons'); ?>

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

	<?php if(!empty($icons)): ?>
		<?php if(!empty(count($icons)>1)): ?>
			<?php require( TEMPLATEPATH . '/template-parts/modules/icons/icons-tabs.php' ); ?>
		<?php else: ?>
			<?php require( TEMPLATEPATH . '/template-parts/modules/icons/icons-simple.php' ); ?>
		<?php endif; ?>
	<?php endif; ?>

</div>