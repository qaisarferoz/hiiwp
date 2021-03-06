<?php
/**
 * HiiWP Template: vc_column
 *
 * @package     hiiwp
 * @copyright   Copyright (c) 2018, Peter Vigilante
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $width = $css = $offset = $el_id = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'flex-item',
	$atts['content_alignment'],
	$width,
	vc_shortcode_custom_css_class( $css ),
);

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
	$css_classes[]='';
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
	$css_classes[]='vc_col-has-fill';
}

if ( ! empty( $align_item )) {
	$flex_row = true;
	$css_classes[] = ' item-align-' . $align_item;
	$test = '1';
}

if ($is_flex) {
	$css_classes[]=' flex-container';
}
if ( ! empty( $content_direction ) ) {
	$flex_row = true;
	$css_classes[] = ' row-o-direction-' . $content_direction;
}

if ( ! empty( $content_wrap ) ) {
	$flex_row = true;
	$css_classes[] = ' row-o-wrap-' . $content_wrap;
}

if ( ! empty( $justify_content ) ) {
	$flex_row = true;
	$css_classes[] = ' row-o-content-justify-' . $justify_content;
}

if ( ! empty( $v_align_w_content ) ) {
	$flex_row = true;
	$css_classes[] = ' row-o-content-align-w-' . $v_align_w_content;
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = ' row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = ' row-flex';
}
if ( ! empty( $bg_img_pos )) {
	$flex_row = true;
	$css_classes[] = ' bg-img-pos-' . $bg_img_pos;
}

$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if(! empty($on_click) ){
	// $wrapper_attributes[] = 'onclick="'. htmlspecialchars($on_click, ENT_QUOTES) .'"';
	$wrapper_attributes[] = 'onclick="'. htmlspecialchars("$on_click", ENT_QUOTES) .'"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';

echo __hii($output); // WPCS: XSS ok.
