<?php
/**
 * HiiWP: Icon Settings
 *
 * Adds the customizer settings for the Icons section
 *
 * @package     hiiwp
 * @copyright   Copyright (c) 2018, Peter Vigilante
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.1
 */
$section = 'typography_icons_section';

Kirki::add_field( 'hiiwp', array(
    'type'        => 'typography',
    'settings'    => 'icon_settings',
    'label'       => esc_attr__( 'Icon Color', 'hiiwp' ),
    'description' => __( 'Define color for social icons', 'hiiwp' ),
    'section'     => $section,
    'default'     => $hiilite_options['icon_settings'],
    'priority'    => 1,
) );
Kirki::add_field( 'hiiwp', array(
	'type'        => 'multicolor',
	'settings'    => 'icon_settings_bg',
	'label'		  => 'Icon Background',
	'section'     => $section,
	'priority'    => 1,
	'choices'     => array(
        'background'  => esc_attr__( 'Background Color', 'hiiwp' ),
    ),
    'default'     => array(
        'background'    => '',
    ),
) );
Kirki::add_field( 'my_config', array(
	'type'        => 'dimension',
	'settings'    => 'icon_settings_border',
	'label'       => __( 'Border Thickness', 'hiiwp' ),
	'section'     => $section,
	'default'     => '0',
	'priority'    => 1,
) );
Kirki::add_field( 'my_config', array(
	'type'        => 'dimension',
	'settings'    => 'icon_settings_border_r',
	'label'       => __( 'Border Radius', 'hiiwp' ),
	'section'     => $section,
	'default'     => '0',
	'priority'    => 1,
) );


Kirki::add_field( 'hiiwp', array(
	'type'        => 'code',
	'settings'    => 'typography_icon_custom_css',
	'label'       => __( 'Icon Custom CSS', 'hiiwp' ),
	'description' => __( 'Custom style all font-awesome icons', 'hiiwp' ),
	'section'     => $section,
	'default'     => $hiilite_options['typography_icon_custom_css'],
	'priority'    => 1,
	'choices'     => array(
		'language' => 'css',
		'theme'    => 'monokai',
		'height'   => '500',
	),
) );	
