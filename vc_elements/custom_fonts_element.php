<?php

/*------------------------------------------*/
/*------------------------------------------*/
/*----------- CUSTOM VC ELEMENTS -----------*/
/*------------------------------------------*/
/*------------------------------------------*/

/*----------------------------------------------------------*/
/*-------------------- ELEMENTO GALLERY --------------------*/
/*----------------------------------------------------------*/ 
add_shortcode( 'vc_custom_element_fonts', 'vc_custom_element_fonts_shortcode' );

function vc_custom_element_fonts_shortcode( $atts, $content )  { 
    $fuente = shortcode_atts(
    array(
      'content'         => 'content',
      'type'            => 'type',
      'size'            => 'size',
      'color'           => 'color',  
      'align_mobile'    => 'align_mobile',    
      'align_ipad'      => 'align_ipad',    
      'align_desktop'   => 'align_desktop',          
    ), $atts );

    $atts['content'] = $content;

    $output = '<div class="';
    if( $fuente['type'] != 'type' ) { $output .= 'f__'.$fuente['type'].' '; } 
    if( $fuente['size'] != 'size' ) { $output .= 'f__'.$fuente['size'].' '; }
    if( $fuente['color'] != 'color' ) { $output .= 'f__'.$fuente['color'].' '; }
    if( $fuente['align_mobile'] != 'align_mobile' ) { $output .= 'text-'.$fuente['align_mobile'].' '; }
    if( $fuente['align_ipad'] != 'align_ipad' ) { $output .= 'text-md-'.$fuente['align_ipad'].' '; }
    if( $fuente['align_desktop'] != 'align_desktop' ) { $output .= 'text-lg-'.$fuente['align_desktop'].' '; }
    $output .= '">';
    $output .= $atts['content'];
    $output .= '</div>';    

  return $output;      
}

// Map the block with vc_map()
vc_map( 
    array(
        'name' => __('Custom font Element', 'oneparc'),
        'base' => 'vc_custom_element_fonts',
        'description' => __('Fuentes personalizadas', 'oneparc'), 
        'category' => __('My Custom Elements', 'oneparc'),   
        'icon' => get_template_directory_uri().'/img/icon/custom_font.png',            
        'params' => array(   

            array(
                'type' => 'textarea_html',
                'holder' => 'strong',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Contenido', 'oneparc' ),
                'param_name' => 'content',
                'admin_label' => false,
                "value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "oneparc" ),
                'weight' => 0,
                'group' => 'Custom Group',
            ), 

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Tipo', 'oneparc' ),
                'param_name' => 'type',
                'description' => __( 'Elige el estilo de tu fuente', 'oneparc' ),
                'admin_label' => false,
                'value'       => array(
                    'select'        => 'select',
                    'canela__thin'          => 'canela__thin',  
                    'canela__thin__it'          => 'canela__thin__it',  
                    'gt_america'          => 'gt_america',  
                    'gt_america_medium,'          => 'gt_america_medium,',               
                ),
                'weight' => 0,
                'group' => 'Custom Group',
            ), 

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Size', 'oneparc' ),
                'param_name' => 'size',
                'description' => __( 'Elige el tamaño de tu fuente', 'oneparc' ),
                'admin_label' => false,
                'value'       => array(
                    'select' => 'select',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '20' => '20',
                    '23' => '23',
                    '25' => '25',
                    '27' => '27',
                    '30' => '30',
                    '32' => '32',
                    '34' => '34',
                    '36' => '36',
                    '42' => '42',
                    '48' => '48',
                    '60' => '60',
                    '72' => '72',
                ),
                'weight' => 0,
                'group' => 'Custom Group',
                'save_always' => true,
            ), 

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Color', 'oneparc' ),
                'param_name' => 'color',
                'admin_label' => false,
                'value'       => array(
                    'select'    => 'select',
                    'blanco'    => 'blanco',
                    'marron_claro'     => 'marron_claro', 
                    'marron_medio'    => 'marron_medio',
                    'marron_oscuro'    => 'marron_oscuro',
                    'gris'     => 'gris', 
                    'rojizo'     => 'rojizo',                        
                ),
                'weight' => 0,
                'group' => 'Custom Group',
            ),

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Alineación móvil', 'oneparc' ),
                'param_name' => 'align_mobile',
                'admin_label' => false,
                'value'       => array(
                    'select' => 'select',
                    'left'   => 'left',
                    'center' => 'center',
                    'right'  => 'right',                           
                ),
                'weight' => 0,
                'group' => 'Custom Group',
            ), 

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Alineación tablets', 'oneparc' ),
                'param_name' => 'align_ipad',
                'admin_label' => false,
                'value'       => array(
                    'select' => 'select',
                    'left'   => 'left',
                    'center' => 'center',
                    'right'  => 'right',                           
                ),
                'weight' => 0,
                'group' => 'Custom Group',
            ), 

            array(
                'type' => 'dropdown',
                'class' => 'custom-gallery-class',
                'heading' => __( 'Alineación ordenadores', 'oneparc' ),
                'param_name' => 'align_desktop',
                'admin_label' => false,
                'value'       => array(
                    'select' => 'select',
                    'left'   => 'left',
                    'center' => 'center',
                    'right'  => 'right',                           
                ),
                'weight' => 0,
                'group' => 'Custom Group',
            ),  

        ),
    )
);   