<?php $email = get_sub_field('email'); ?>
<?php $phone = get_sub_field('phone'); ?>

<div class="section_wrap" id="contacto">
	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-6 col-xl-5">
				<div class="animated_head">
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-section.php'); ?>
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-title.php'); ?>
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-subtitle.php'); ?>
					<?php include( TEMPLATEPATH . '/template-parts/modules/commons/module-content.php'); ?>
					<div class="mt-3 d-block">
						<?php if(!empty($phone)): ?>
							<div class="d-block mt-2">
								<img src="<?php bloginfo( 'template_url' ) ?>/img/phone-icon.png" alt="">
								<?php echo $phone; ?>
							</div>
						<?php endif; ?>
						<?php if(!empty($email)): ?>
							<a href="mailto:<?php echo $email; ?>" class="d-block mt-2">
								<img src="<?php bloginfo( 'template_url' ) ?>/img/mail-icon.png" alt="">
								<?php echo $email; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-xl-7">
				<div class="normal__animation pt-5 mt-5">
					<?php echo do_shortcode('[contact-form-7 id="6" title="Formulario de contacto 1"]') ?>
				</div>
			</div>

		</div>
	</div>
</div>