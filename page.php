<?php get_header(); ?>

<?php
// VARIABLES
$cabecera = get_field('cabecera');
$carrusel = get_field('carrusel');
$intro = get_field('intro');
$banner = get_field('banner');
$detalles = get_field('detalles');
$markers = get_field('markers');
$contacto = get_field('contacto');
?>

<!-- CARRUSEL -->
<div class="carrusel">

	<!-- CARRUSEL BOTON -->
	<a href="#" data-toggle="modal" data-target="#modalGallery" class="carrusel_button">VER GALERÍA</a>

	<!-- CARRUSEL FONDO -->
	<div class="carrusel_scroll">
		<div class="c-text">scroll</div>
		<div class="c-scrolldown">
		    <div class="c-line"></div>
		 </div>
	</div>

	<!-- CARRUSEL TITULO -->
	<div class="carrusel__title animated_letters">
		<?php echo $cabecera; ?>
	</div>

	<!-- CARRUSEL NAVIGATION -->
	<div class="carrusel__navigation">
		<div class="carrusel__navigation__bar">
			<div class="carrusel__navigation__bar_number carrusel__navigation__bar__current">
				<div class="current_0">00</div>
				<?php $n = 1; foreach ($carrusel['imagenes'] as $imagen) {
					if($n == 1): $active = 'active'; else: $active = ''; endif; ?>
					<div class="current_item current_<?php echo $n; ?> <?php echo $active; ?>">0<?php echo $n; ?></div>
				<?php $n++; }  ?>
			</div>
			<div class="carrusel__navigation__bar_progress">
				<?php $n = 1; foreach ($carrusel['imagenes'] as $imagen) { ?>
					<div class="carrusel__navigation__bar_progress_item" data-position="<?php echo $n; ?>"></div>
				<?php $n++; }  ?>
			</div>
			<div class="carrusel__navigation__bar_number carrusel__navigation__bar__total">
				0<?php echo count($carrusel['imagenes']); ?>
			</div>
		</div>
	</div>

	<!-- CARRUSEL OWL -->
	<div class="owl-carousel">
		<?php $m = 1; foreach ($carrusel['imagenes'] as $imagen) { ?>
			<div class="item" data-position="<?php echo $m; ?>">
		    	<div class="caption"><?php echo $imagen['titulo']; ?></div>
		    	<img src="<?php echo $imagen['imagen_vertical']; ?>" class="img-portrtait">
		    	<img src="<?php echo $imagen['imagen']; ?>" class="img-landscape">
	  		</div>
		<?php $m++; }  ?>
	</div>
</div>

<!-- INTRO -->
<div class="section intro">
	<div class="section_wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-5">
					<!-- ANIMATION HEAD > number, section y title -->
					<div class="animated_head">
						<div class="animated_head__content">
							<div class="animated_head__content__top">
								<div class="animated_head__section"><span><?php echo $intro['section']; ?></span></div>
							</div>
							<div class="animated_head__title animated_letters"><?php echo $intro['titulo']; ?></div>
							<a href="#" data-toggle="modal" data-target="#modalGallery" class="btn btn_white mt-4 d-none d-lg-inline-block">VER GALERÍA</a>
						</div>

					</div>
				</div>
				<div class="col-lg-5 offset-lg-2">
					<div class="normal__animation">
						<div class="intro__slogan"><?php echo $intro['slogan']; ?></div>
						<a href="#" data-toggle="modal" data-target="#modalGallery" class="btn btn_white mb-5 d-lg-none">VER GALERÍA</a>
						<?php foreach ($intro['contenido'] as $contenido) { ?>
							<div class="mb-4"><?php echo $contenido['contenido_texto']; ?></div>
						<?php }  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="banner">

	<div class="banner__bg">
		<div class="banner_bg__fondo">
			<?php if ($banner['video'] != '') : ?>
				<video autoplay playsinline loop muted data-keepplaying >
				    <source src="<?php echo $banner['video']; ?>" type="video/mp4">
				</video>
			<?php else:  ?>
				<img src="<?php echo $banner['fondo']; ?>">
			<?php endif;  ?>
		</div>
	</div>
	<div class="banner__content">
		<div class="banner__title animated_letters"><?php echo $banner['titulo']; ?></div>
	</div>
</div>

<!-- MAPA -->
<div class="section skills">
	<div class="section_wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<ul class="skills__item">
						<?php foreach ($detalles['items'] as $item) { ?>
							<li>
								<img src="<?php echo $item['imagen']; ?>" alt="">
								<?php echo $item['titulo']; ?>
							</li>
						<?php }  ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="mapa" id="map">
    <?php if( have_rows('markers') ): ?>
    <div class="acf-map" data-zoom = "16">
        <?php while ( have_rows('markers') ) : the_row();

            // Load sub field values.
            $localizacion = get_sub_field('localizacion');
            $tipo = get_sub_field('tipo');
            $direccion = get_sub_field('direccion');
            $minutos = get_sub_field('minutos'); ?>

            <?php if($tipo == 'main'): ?>
	            <div class="marker marker-fixed" data-type="fixed" data-marker-image="<?php bloginfo( 'template_url' ); ?>/img/marker_queens.png" data-marker-image-hover="<?php bloginfo( 'template_url' ); ?>/img/marker_queens.png" data-lat="<?php echo $localizacion['lat']; ?>" data-lng="<?php echo $localizacion['lng']; ?>"></div>
            <?php else: ?>
            	<div class="marker" data-type="" data-marker-image="<?php bloginfo( 'template_url' ); ?>/img/marker_normal.png" data-marker-image-hover="<?php bloginfo( 'template_url' ); ?>/img/marker_normal.png" data-lat="<?php echo $localizacion['lat'];?>" data-lng="<?php echo $localizacion['lng'];?>">
	   				<div class="marker-content">
	                  <div class="market-title">
	                  	<?php echo $direccion; ?>
	                  </div>
	                  <div class="distance">
						<span>
							<?php echo $minutos; ?>'  <?php _e('desde Queens', 'queens'); ?>
						</span>
	                  </div>
		            </div>
	   			</div>
            <?php endif; ?>
    	<?php endwhile; ?>
    </div>
<?php endif; ?>
</div>

<!-- CONTACTO -->
<div class="section contacto" id="contacto">
	<div class="section_wrap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-xl-5">
					<!-- ANIMATION HEAD > number, section y title -->
					<div class="animated_head">
						<div class="animated_head__content">
							<div class="animated_head__content__top">
								<div class="animated_head__section"><span><?php echo $contacto['section']; ?></span></div>
							</div>
							<div class="animated_head__title animated_letters"><?php echo $contacto['titulo']; ?></div>
							<div class="animated_head__slogan"><?php echo $contacto['texto']; ?></div>
							<div class="normal__animation">
								<p class="h5 mt-5 pt-3">Managed by</p>
								<a href="https://asg-homes.com/" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/ASG_logo.svg" alt=""></a>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-6 col-xl-7">
					<div class="normal__animation2 pt-5 mt-5">
						<?php echo do_shortcode('[contact-form-7 id="6" title="Formulario de contacto 1"]') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade modal__fullscreen" id="modalGallery" tabindex="-1" role="dialog" aria-labelledby="customLabel" aria-hidden="true">
    <div class="modal-dialog">
      	<div class="modal-content">
			<div class="modal-body">

				<!-- MODAL HEADER -->
				<header>
					<!-- BRAND -->
					<a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
						<img src="<?php bloginfo( 'template_url' ); ?>/img/queens_brand.svg" alt="" class="d-none d-md-block">
		  				<img src="<?php bloginfo( 'template_url' ); ?>/img/q.svg" alt="" class="d-md-none">
					</a>
					<a href="#" class="btn btn_contacto"><?php _e('REGÍSTRATE AQUÍ','west_beach'); ?></a>
				</header>

				<!-- MODAL BUTTON -->
				<button type="button" class="close" data-dismiss="modal">
					<img src="<?php bloginfo( 'template_url' ); ?>/img/close_modal.png">
					<span class="text d-none d-md-inline-block">Close</span>
				</button>

				<!-- CARRUSEL NAVIGATION -->
				<div class="carrusel__navigation">
					<div class="carrusel__navigation__bar">
						<div class="carrusel__navigation__bar_number carrusel__navigation__bar__current">
							<div class="current_0">00</div>
							<?php $n = 1; foreach ($carrusel['imagenes'] as $imagen) {
								if($n == 1): $active = 'active'; else: $active = ''; endif; ?>
								<div class="current_item current_<?php echo $n; ?> <?php echo $active; ?>">0<?php echo $n; ?></div>
							<?php $n++; }  ?>
						</div>

						<div class="carrusel__navigation__bar_progress">
							<?php $n = 1; foreach ($carrusel['imagenes'] as $imagen) { ?>
								<div class="carrusel__navigation__bar_progress_item" data-position="<?php echo $n; ?>"></div>
							<?php $n++; }  ?>
						</div>

						<div class="carrusel__navigation__bar_number carrusel__navigation__bar__total">0<?php echo count($carrusel['imagenes']); ?></div>

					</div>
				</div>

				<div id="modalBody">
					<div class="owl-carousel">
						<?php $m = 1; foreach ( $carrusel['imagenes'] as $imagen ) { ?>
								<div class="item" data-position="<?php echo $m; ?>">
									<div class="caption"><?php echo $imagen['titulo']; ?></div>
									<img src="<?php echo $imagen['imagen_vertical']; ?>" class="img-portrtait">
									<img src="<?php echo $imagen['imagen']; ?>" class="img-landscape">
								</div>
						<?php $m++; }  ?>
					</div>
				</div>
			</div>
      	</div>
    </div>
</div>

<?php get_footer(); ?>