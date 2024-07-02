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
    <div class="cargador">
    	<div class="brand">
    		<img src="<?php bloginfo( 'template_url' ); ?>/img/queens_loading.png" class="img-fluid">
    	</div>
    </div>

	<!-- HEADER -->
	<header>
		<!-- BRAND -->
		<a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
		  	<img src="<?php bloginfo( 'template_url' ); ?>/img/queens_brand.svg" alt="">
		</a>
	</header>

	<!-- CONTAINER -->
	<div id="wrapper">