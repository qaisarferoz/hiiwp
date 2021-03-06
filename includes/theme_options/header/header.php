<?php
$section = 'header_header_section';

Kirki::add_section( $section, array(
    'priority'    => 1,
    'title'       => __( 'Header', 'hiiwp' ),
    'description' => __( 'Header settings', 'hiiwp' ),
    'panel'		 => 'header_panel',
) );
Kirki::add_field( 'hiiwp', array(
    'type'        => 'switch',
    'settings'    => 'header_in_grid',
    'label'       => __( 'Header in Grid', 'hiiwp' ),
    'description' => __('Enabling this option will display header content in grid', 'hiiwp'),
    'section'     => $section,
    'default'     => $hiilite_options['header_in_grid'],
    'priority'    => 1,
) );

// header_type
Kirki::add_field( 'hiiwp', array(
	'type'        => 'select',
    'settings'    => 'header_type',
    'label'       => __( 'Type of header', 'hiiwp' ),
    'description' => __('Choose the header layout & behavior', 'hiiwp'),
    'section'     => $section,
    'default'     => $hiilite_options['header_type'],
    'priority'    => 1,
    'multiple'    => 1,
    'choices'     => array(
        'regular' => esc_attr__( 'Regular', 'hiiwp' ),
        'centered' => esc_attr__( 'Centered', 'hiiwp' ),
        'fixed' => esc_attr__( 'Fixed', 'hiiwp' ),
    ),
) );

Kirki::add_field( 'hiiwp', array(
    'type'        => 'switch',
    'settings'    => 'header_content_under',
    'label'       => __( 'Header Overlaps Content', 'hiiwp' ),
    'description'  => __( 'Have the content flow behind the header', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_content_under'],
    'priority'    => 1
) );

Kirki::add_field( 'hiiwp', array(
	'type'        => 'spacing',
	'settings'    => 'header_padding',
	'label'       => __( 'Header Padding', 'hiiwp' ),
	'section'     => $section,
	'default'     => $hiilite_options['header_padding'],
	'priority'    => 2,
	'transport'   => 'postMessage',
    'output' => array(
		array(
			'element'  => 'header#main_header',
			'property' => 'padding',
		),
	),
	'js_vars' => array(
		array(
			'element'  => 'header#main_header',
			'property' => 'padding',
		),
	),
) );




Kirki::add_field( 'hiiwp', array(
	'type'        => 'background',
    'settings'    => 'header_background',
    'label'       => __( 'Header Background', 'hiiwp' ),
    'description' => __('Choose a background for header area.', 'hiiwp'),    
    'section'     => $section,
    'priority'    => 2,
    'default'     => array(
		'background-color'    => ' ',
		'background-image'    => '',
		'background-repeat'   => 'no-repeat',
		'background-size'     => 'cover',
		'background-attachment'   => 'scroll',
		'background-position' => 'left-top',
	),
	'output'	=> array(
		array(
			'element'	=> '#main_header',
			'property'	=> 'background'
		)
	)
) );

// BORDER TOP
Kirki::add_field( 'hiiwp', array(
    'type'        => 'dimension',
    'settings'    => 'header_top_border_width',
    'label'       => __( 'Header Top Border Thickness', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_top_border_width'],
    'priority'    => 4,
    
) );

Kirki::add_field( 'hiiwp', array(
    'type'        => 'color',
    'settings'    => 'header_top_border_color',
    'label'       => __( 'Header Top Border Color', 'hiiwp' ),
    'description'       => __( 'Choose a color for the header top border. Note: If color has not been chosen, border bottom will not be displayed', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_top_border_color'],
    'priority'    => 4,
    
) );


Kirki::add_field( 'hiiwp', array(
	'type'        => 'typography',
	'settings'    => 'header_bottom_font',
	'label'       => __( 'Header Bottom Font', 'hiiwp' ),
	'description' => __('Define styles for Header Bottom area', 'hiiwp'),
	'section'     => $section,
	'default'     => array(
        'font-family'    => ' ',
        'variant'        => ' ',
        'font-size'      => ' ',
        'text-transform' => 'none',
        'line-height'    => '1.5',
        'letter-spacing' => '0px',
        'color'          => ' ',
    ),
	'priority'    => 8,
	'required'	  => array(
		array(
		    'setting'  => 'header_bottom_on',
			'operator' => '==',
			'value'    => true,
	    )),
) );
// Border Bottom
Kirki::add_field( 'hiiwp', array(
    'type'        => 'dimension',
    'settings'    => 'header_bottom_border_width',
    'label'       => __( 'Header Bottom Border Thickness', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_bottom_border_width'],
    'priority'    => 4,
    'transport'   => 'postMessage',
    'output' => array(
		array(
			'element'  => '#header_bottom',
			'property' => 'border-bottom-width',
		),
	),
	'js_vars' => array(
		array(
			'element'  => '#header_bottom',
			'property' => 'border-bottom-width',
		),
	),
) );
Kirki::add_field( 'hiiwp', array(
	'type'        => 'color',
    'settings'    => 'header_bottom_border_color',
    'label'       => __( 'Header Bottom Border Color', 'hiiwp' ),
    'description' => __('Choose a color for the header bottom border. Note: If color has not been chosen, border bottom will not be displayed', 'hiiwp'),
    'section'     => $section,
    'priority'    => 4,
    'default'     => $hiilite_options['header_bottom_border_color'],
    'transport'   => 'postMessage',
    'output' => array(
		array(
			'element'  => '#header_bottom',
			'property' => 'border-bottom-color',
		),
	),
	'js_vars' => array(
		array(
			'element'  => '#header_bottom',
			'property' => 'border-bottom-color',
		),
	),
) );



Kirki::add_field( 'hiiwp', array(
    'type'        => 'switch',
    'settings'    => 'header_center_left_on',
    'label'       => __( 'Header Center Left (beta)', 'hiiwp' ),
    'description'  => __( 'Add elements through the Widget panel', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_center_left_on'],
    'priority'    => 8,
) );
Kirki::add_field( 'hiiwp', array(
    'type'        => 'switch',
    'settings'    => 'header_center_right_on',
    'label'       => __( 'Header Center Right (beta)', 'hiiwp' ),
    'description'  => __( 'Add elements through the Widget panel', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_center_right_on'],
    'priority'    => 8,
) );

Kirki::add_field( 'hiiwp', array(
    'type'        => 'switch',
    'settings'    => 'header_bottom_on',
    'label'       => __( 'Header Bottom (beta)', 'hiiwp' ),
    'description'  => __( 'Add elements through the Widget panel', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_bottom_on'],
    'priority'    => 8,
) );

Kirki::add_field( 'hiiwp', array(
	'type'        => 'color',
    'settings'    => 'header_bottom_background',
    'label'       => __( 'Header Bottom Background Color', 'hiiwp' ),
    'description' => __('Choose a background color for bottom header area', 'hiiwp'),
    'section'     => $section,
    'priority'    => 8,
    'default'     => $hiilite_options['header_bottom_background'],
    'transport'   => 'postMessage',
    'output' => array(
		array(
			'element'  => '#header_bottom',
			'property' => 'background-color',
		),
	),
	'js_vars' => array(
		array(
			'element'  => '#header_bottom',
			'property' => 'background-color',
		),
	),
	'required'	  => array(
		array(
		    'setting'  => 'header_bottom_on',
			'operator' => '==',
			'value'    => true,
	    )),
) );

/*

Kirki::add_field( 'hiiwp', array(
    'type'        => 'switch',
    'settings'    => 'header_top_home',
    'label'       => __( 'Above Home Page Header (beta)', 'hiiwp' ),
    'description'  => __( 'Adds content above the header, but only on the home page', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['header_top_home'],
    'priority'    => 9,
) );


Kirki::add_field( 'hiiwp', array(
	'type'        => 'dropdown-pages',
	'settings'    => 'header_top_home_content',
	'label'       => __( 'Content For Above Home Page Header (beta)', 'hiiwp' ),
	'description'  => __( 'Adds content above the header, but only on the home page', 'hiiwp' ),
	'section'     => $section,
	'default'     => $hiilite_options['header_top_home_content'],
	'priority'    => 9,
	'required'	  => array(
		array(
		    'setting'  => 'header_top_home',
			'operator' => '==',
			'value'    => true,
	    )),
) );

Kirki::add_field( 'hiiwp', array(
	'type'        => 'background',
    'settings'    => 'header_top_pages_background',
    'label'       => __( 'Background Above Header on all other pages (beta)', 'hiiwp' ),
    'description'  => __( 'Fallback image for all pages except home', 'hiiwp' ),
    'section'     => $section,
    'priority'    => 9,
    'default'     => array(
		'color'    => $hiilite_options['header_top_pages_background_color'],
		'image'    => $hiilite_options['header_top_pages_background_image'],
	),
	'required'	  => array(
		array(
		    'setting'  => 'header_top_home',
			'operator' => '==',
			'value'    => true,
	    )),
) );

Kirki::add_field( 'hiiwp', array(
    'type'        => 'dimension',
    'settings'    => 'header_top_pages_height',
    'label'       => __( 'Above Header Height on all other pages (beta)', 'hiiwp' ),
    'description'  => __( 'Height of above header image in all pages except home', 'hiiwp' ),
    'section'     => $section,
    'default'     => '100px',
    'priority'    => 9,
	'required'	  => array(
		array(
		    'setting'  => 'header_top_home',
			'operator' => '==',
			'value'    => true,
	    )),
) );
*/
?>