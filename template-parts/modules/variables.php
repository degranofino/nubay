<?php

// Get Variables Modules / COMUNES
$content = get_sub_field('content');
$media = get_sub_field('media');
$config = get_sub_field('config');
$items = get_sub_field('items');
$extras = get_sub_field('extras');
$buttons = get_sub_field('button');
$scroll = get_sub_field('scroll');

// config
$config_module = '';
if( $config['theme'] ){ $config_module .= ' '.$config['theme']; }
if( $config['background'] ){ $config_module .= ' '.$config['background']; }
if( $config['width']){ $config_module .= ' '.$config['width']; }
if( $config['margins']['margin-top'] ){ $config_module .= ' '.$config['margins']['margin-top']; }
if( $config['margins']['margin-bottom'] ){ $config_module .= ' '.$config['margins']['margin-bottom']; }

// display
if( $config['display'] ){
    foreach ($config['display'] as $display) {
        $config_module .= ' '.$display;
    }
}

// extras [type]
if( $config['type'] ){
    $config_module .= ' '.$config['type'];
}

// extras [direction]
if($extras['direction']){
    $config_module .= ' '.$extras['direction'];
}

// extras [hero left]
if( $extras['content_left'] ){
    $config_module .= ' hero-left';
}

// extras [hero scroll]
if( $extras['content_left'] && $scroll){
    $config_module .= ' hero-scroll';
}

// extras [direction]
if($extras['align']){
    $config_module .= ' '.$extras['align'];
}

// extras [direction]
if($extras['size']){
    $config_module .= ' '.$extras['size'];
}

// seo
// if( $config['tag'] ){
//     $title_tag = $config['tag'];
// } else {
//     $title_tag = 'div';
// }


// $config_module = $config['theme'];
// if($config['color_fondo']){ $config_module .= ' '.$config['color_fondo']; }
// if($config['background']['image_position']){ $config_module .= ' '.$config['background']['image_position']; }
// if($config['margins']['margin_top']){ $config_module .= ' '.$config['margins']['margin_top']; }
// if($config['margins']['margin_bottom']){ $config_module .= ' '.$config['margins']['margin_bottom']; }
// if($config['type']){ $config_module .= ' '.$config['type']; }
// if($config['display']){ $config_module .= ' '.$config['display'][0]; }
// if($config['direction']){ $config_module .= ' '.$config['direction']; }

// // hero options
// if($config['content_left']){ $config_module .= ' hero-left'; }
// if($config['scroll_indicator']){ $config_module .= ' hero-scroll'; }

// if($media['video_vimeo']){ $config_module .= ' module-vimeo'; }

// $config_module = ' '.$config['theme'];

?>