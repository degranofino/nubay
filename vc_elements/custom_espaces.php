<?php

/*------------------------------------------*/
/*------------------------------------------*/
/*----------- CUSTOM VC ELEMENTS -----------*/
/*------------------------------------------*/
/*------------------------------------------*/

/*----------------------------------------------------------*/
/*-------------------- ELEMENTO GALLERY --------------------*/
/*----------------------------------------------------------*/ 
add_shortcode( 'vc_custom_espaces', 'vc_custom_espaces_shortcode' );

function vc_custom_espaces_shortcode( $atts, $content )  { 
    $espacio = shortcode_atts(
    array(
      'size' => 'size',    
      'clase'   => 'clase',         
    ), $atts );

    $output = '<div class="espacio_'.$espacio['size'].' '.$espacio['clase'].'"></div>';
    return $output;     
}

// Map the block with vc_map()
vc_map( 
    array(
        'name' => __('Custom Espaces', 'oneparc'),
        'base' => 'vc_custom_espaces',
        'description' => __('Fuentes personalizadas', 'oneparc'), 
        'category' => __('My Custom Elements', 'oneparc'),   
        'icon' => get_template_directory_uri().'/img/icon/custom_espacio.png',            
        'params' => array(  

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Size', 'oneparc' ),
                'holder' => 'strong',
                'param_name' => 'size',
                'description' => __( 'Elige el tamaño de tu espacio', 'oneparc' ),
                'admin_label' => false,
                'value'       => array(
                    'select' => 'select',
                    'small' => 'small',
                    'medium' => 'medium',
                    'large' => 'large',
                    'extralarge' => 'extralarge',
                    'movil_small ' => 'movil_small ',
                    'movil_large' => 'movil_large',
                    'ipad_small' => 'ipad_small',
                    'ipad_large' => 'ipad_large',
                ),
                'weight' => 0,
                'group' => 'Custom Group',
                'save_always' => true,
            ), 
            array(
                'type' => 'textfield',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Clase', 'oneparc' ),
                'param_name' => 'clase',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
        ),
    )
);   