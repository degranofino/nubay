<?php

/* @Recreate the default filters on the_content so we can pull formated content with get_post_meta
-------------------------------------------------------------- */
add_filter( 'meta_content', 'wptexturize'       );
add_filter( 'meta_content', 'convert_smilies'   );
add_filter( 'meta_content', 'convert_chars'     );
add_filter( 'meta_content', 'wpautop'           );
add_filter( 'meta_content', 'shortcode_unautop' );
add_filter( 'meta_content', 'do_shortcode'      );

/*----------------------------------*/
/*--- THEME SUPPORTS AND PRESETS ---*/
/*----------------------------------*/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
/*--- Ocultar barra Wordpress ---*/
add_filter( 'show_admin_bar', '__return_false' );
/*--- Desactivar Gutenberg ---*/
add_filter('use_block_editor_for_post_type', '__return_false', 100);

// Disable WordPress' automatic image scaling feature
add_filter( 'big_image_size_threshold', '__return_false' );

/*----------------------------------*/
/*------ THEME SETTINS - AFC -------*/
/*----------------------------------*/
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false,
  ));
}

/*----------------------------------*/
/*------ INCLUDE VC_ELEMENTS -------*/
/*----------------------------------*/
add_action( 'vc_before_init', 'vc_before_init_actions' );

function vc_before_init_actions() {
  require_once('vc_elements/custom_fonts_element.php');
  require_once('vc_elements/custom_espaces.php');
}

/*----------------------------------*/
/*-------- TAMAÑOS IMAGENES --------*/
/*----------------------------------*/
add_image_size( 'proyecto_full', 2500, 2500 );
add_image_size( 'proyecto_xlarge', 1920, 1080, true );
add_image_size( 'proyecto_large', 1440, 810, true );
add_image_size( 'proyecto_medium', 960, 600, true );
add_image_size( 'proyecto_small', 760, 450, true );
add_image_size( 'proyecto_xsmall', 250, 250, true );
add_image_size( 'proyecto_iconos', 150, 150 );
add_image_size( 'proyecto_grid', 960, 960 );

/*----------------------------------*/
/*---------- IMPORTAR CSS ----------*/
/*----------------------------------*/
add_action( 'wp_enqueue_scripts', 'styles_theme' );

function styles_theme() {

  wp_register_style( 'styles_theme1', get_template_directory_uri() .'/library/bootstrap/css/bootstrap.css');
  wp_register_style( 'styles_theme2', get_template_directory_uri() .'/library/owl_carousel/assets/owl.carousel.min.css' );
  wp_register_style( 'styles_theme3', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
  wp_register_style( 'styles_theme4', get_template_directory_uri() .'/library/lightgallery_2/css/lightgallery.css' );
  wp_register_style( 'styles_theme5', get_template_directory_uri() .'/library/splide/css/splide.min.css' );
  wp_register_style( 'styles_theme6', get_template_directory_uri() .'/css/style.css');

  wp_enqueue_style( 'styles_theme1' );
  wp_enqueue_style( 'styles_theme2' );
  wp_enqueue_style( 'styles_theme3' );
  wp_enqueue_style( 'styles_theme4' );
  wp_enqueue_style( 'styles_theme5' );
  wp_enqueue_style( 'styles_theme6' );

}

/*----------------------------------*/
/*---------- IMPORTAR JS -----------*/
/*----------------------------------*/
add_action( 'wp_footer', 'scripts_theme' );

function scripts_theme() {

	// LOADING
	// wp_enqueue_script( 'scripts_theme1', get_template_directory_uri() . '/js/pace.min.js', array('jquery'), '1.0', true );

	// LIBRERAS
	wp_register_script('scripts_theme1', get_template_directory_uri() . '/library/bootstrap/js/bootstrap.min.js' );
	wp_register_script('scripts_theme2', get_template_directory_uri() . '/library/owl_carousel/owl.carousel.min.js' );
  wp_register_script('scripts_theme3', get_template_directory_uri() . '/library/lightgallery_2/lightgallery.min.js' );
	wp_register_script('scripts_theme4', get_template_directory_uri() . '/js/jquery.waypoints.min.js' );
  wp_register_script('scripts_theme5', get_template_directory_uri() . '/js/classie.js' );
	wp_register_script('scripts_theme6', get_template_directory_uri() . '/library/splide/js/splide.min.js' );

  wp_register_script('scripts_theme7', get_template_directory_uri() . '/library/scrollmagic/gsap3/gsap.min.js' );
  wp_register_script('scripts_theme7b', get_template_directory_uri() . '/library/scrollmagic/gsap3/Draggable.min.js' );
  wp_register_script('scripts_theme8', get_template_directory_uri() . '/library/scrollmagic/uncompressed/ScrollMagic.js' );
  wp_register_script('scripts_theme9', get_template_directory_uri() . '/library/scrollmagic/uncompressed/plugins/animation.gsap.js' );
  wp_register_script('scripts_theme10', get_template_directory_uri() . '/library/scrollmagic/uncompressed/plugins/debug.addIndicators.js' );
  // wp_register_script('scripts_theme10', get_template_directory_uri() . '/library/scrollmagic/iscroll-probe.js' );
  // wp_register_script('scripts_theme11', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js' );
  // wp_register_script('scripts_theme10', get_template_directory_uri() . '/js/backgroundVideo.js' );

	// MAIN
	wp_register_script('scripts_theme12', get_template_directory_uri() . '/js/main.js' );

	// ENQUEUE
	wp_enqueue_script('scripts_theme1');
  wp_enqueue_script('scripts_theme2');
	wp_enqueue_script('scripts_theme3');
	wp_enqueue_script('scripts_theme4');
	wp_enqueue_script('scripts_theme5');
	wp_enqueue_script('scripts_theme6');
  wp_enqueue_script('scripts_theme7');
  wp_enqueue_script('scripts_theme7b');
  wp_enqueue_script('scripts_theme8');
  wp_enqueue_script('scripts_theme9');
  wp_enqueue_script('scripts_theme10');
  // wp_enqueue_script('scripts_theme11');
  wp_enqueue_script('scripts_theme12');

  // LOCALIZATE - AJAX Y URL TEMPLATE
  wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/custom.js', array('jquery') );
  wp_localize_script(
  'ajax-script', 'my_ajax_object',
    array(
    'templateUrl' => get_stylesheet_directory_uri()
    )
  );
}

/*----------------------------------*/
/*----------- GOOGLE MAPS ----------*/
/*----------------------------------*/
function my_theme_add_scripts() {
  wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCin2K5CsTinB1-9DaAtB7hVvVBvoIHeSg' );
  wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/js/google.maps.js', array('google-map', 'jquery'), '0.1', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_add_scripts' );

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCin2K5CsTinB1-9DaAtB7hVvVBvoIHeSg');
}
add_action('acf/init', 'my_acf_init');

/*----------------------------------*/
/*------------- IDIOMA -------------*/
/*----------------------------------*/
function my_language_switcher(){
$languages = icl_get_languages('skip_missing=1');
  if(1 < count($languages)){
    foreach($languages as $code => $l){
      if(!$l['active']) $langs[] = '<li><a href="'.$l['url'].'">'.strtoupper($code).'</a></li>';
      if($l['active']) $langs[] = '<li><span>'.strtoupper($code).'</span></li>';
    }
    echo join($langs);
  }
}


/*----------------------------------*/
/*---------- SLUGIFY-----------*/
/*----------------------------------*/
function slugify($string) {
	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
	return $slug;
}

/*----------------------------------*/
/*---------- SLUG STRING -----------*/
/*----------------------------------*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<br />', '', $content);
    return $content;
});