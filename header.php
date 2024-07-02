<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- BOTON TO TOP -->
	<a class="back-to-top" href="#" title="Ir a arriba"></a>

	<!-- LOADING -->
    <div class="loading">
    	<div class="loading__brand">
    		<img src="<?php bloginfo( 'template_url' ); ?>/img/loading.png" class="img-fluid">
    	</div>
    </div>

	<!-- HEADER -->
	<header>

		<!-- BRAND -->
		<a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
			<img src="<?php bloginfo( 'template_url' ); ?>/img/brand.svg" alt="" class="d-none d-md-block">
			<img src="<?php bloginfo( 'template_url' ); ?>/img/brand-mobile.svg" alt="" class="d-md-none">
		</a>

		<?php if(is_front_page()): ?>
			<a href="#contacto" class="btn btn-primary btn_ancla_contact"><?php _e('CONTÁCTANOS','nubay'); ?></a>
		<?php else: ?>
			<a href="<?php bloginfo('url'); ?>/#contacto" class="btn btn-primary"><?php _e('CONTÁCTANOS','nubay'); ?></a>
		<?php endif; ?>

		<?php /*
		<ul class="lang_selector">
			<?php echo my_language_switcher(); ?>
		</ul>	*/ ?>

	</header>

	<!-- CONTAINER -->
	<div id="wrapper">