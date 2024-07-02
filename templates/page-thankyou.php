<?php /* Template name: Thank you */ ?>
<?php get_header(''); ?>

<?php
	$titulo = get_field('titulo'); 
	$contenido = get_field('contenido'); 
	$fondo = get_field('fondo'); 
?>

<div class="thankyou" style="background-image: url(<?php echo $fondo; ?>);">	
	<div class="thankyou_wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-9 offset-md-2 d-flex flex-column align-items-center">
					<div class="thankyou__title"><?php echo $titulo; ?></div>
					<img src="<?php bloginfo( 'template_url' ); ?>/img/icono_ok.svg" class="mb-5">					
					<?php echo $contenido; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>


