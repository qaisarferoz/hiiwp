<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Section
 */
$post_id = get_the_id();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
if($atts['active'] == true):
	
	$css = $el_class = '';
	$this->resetVariables( $atts, $content );
	
	WPBakeryShortCode_VC_Tta_Section::$self_count ++;
	WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;
	
	$isPageEditable = vc_is_page_editable();
	
	$css = $atts['css'];
	$bg_img_pos = $atts['bg_img_pos'];
	$link = wp_get_attachment_image_src( $atts['image'], 'full' );
	$src = $link[0];
	$slide_width = $link[1];
	$slide_height = $link[2];
	
	$el_class = $this->getExtraClass( $el_class );
	$css_classes = array(
		$el_class,
		vc_shortcode_custom_css_class( $css ),
	);
	
	$wrapper_attributes = array();
	$wrapper_attributes[] = 'id="' . esc_attr( $this->getTemplateVariable( 'tab_id' ) ) . '"';
	
	if ( ! empty( $bg_img_pos )) {
		$css_classes[] = ' bg-img-pos-' . $bg_img_pos;
	}
	
	$css_classes[] = 'slide';
	$css_classes[] = esc_attr( $this->getElementClasses() );
	
	
	$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
	$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
	$output = '';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' style="background-image:url('.$src.');background-color:'.$atts['background_color'].'; background-size:cover;">';
	$output .= '<div class="slide-text-overlay">';
	$output .= $this->getTemplateVariable( 'content' );
	$output .= '</div></div>';
	echo __hii($output); // WPCS: XSS ok.
endif;