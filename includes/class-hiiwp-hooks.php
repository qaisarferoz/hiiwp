<?php
/**
 * The HiiWP Hooks class.
 *
 * @package     HiiWP
 * @category    Core
 * @author      Peter Vigilante
 * @copyright   Copyright (c) 2018, Hiilite Creative Group
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0.3
 */
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * HiiWP_Hooks class.
 *
 * @since 1.0
 */
class HiiWP_Hooks extends Hii {
	
	
	public $hii_hooks = array(
		'hii_doctype',
		'hii_meta',
		'hii_before',
		'hii_before_header',
		'hii_header',
		'hii_after_header',
		'hii_header_top_left',
		'hii_header_top_center',
		'hii_header_top_right',
		'hii_header_bottom_left',
		'hii_header_bottom_right',
		'hii_before_footer',
		'hii_footer',
		'hii_after_footer',
		'hii_body_end',
		'hii_split_portfolio_sidebar_title',
		'hii_split_portfolio_sidebar_client',
		'hii_split_portfolio_sidebar_date',
		'hii_split_portfolio_sidebar_tags',
		'hii_split_portfolio_sidebar_team',
		'hii_split_portfolio_sidebar_about',
		'hii_before_blog_loop',
		'hii_after_blog_loop',
		'hii_before_sidebar',
		'hii_after_sidebar',
		'before_page_title',
		'after_page_title',
		'before_portfolio',
		'after_portfolio'
		
	);
	/**
	 * __construct function.
	 * 
	 * @access private
	 * @return void
	 */
	public function __construct() {
		
		add_action( 'cmb2_admin_init', array($this, 'add_admin_hooks_page' ));
		
		add_action('hii_doctype', array($this,'hii_doctype'));	
		add_action('hii_title', array($this, 'hii_title'));
		add_action('hii_header_hgroup', array($this,'hii_header_hgroup'));	
		add_action('hii_header_bottom_left', array($this,'hii_header_bottom_left'));	
		add_action('hii_header_bottom_right', array($this,'hii_header_bottom_right'));	
		
		/* Portfolio */
		add_action('hii_split_portfolio_sidebar_title', array($this,'hii_split_portfolio_sidebar_title'));		
		add_action('hii_split_portfolio_sidebar_client', array($this,'hii_split_portfolio_sidebar_client'));
		add_action('hii_split_portfolio_sidebar_date', array($this,'hii_split_portfolio_sidebar_date'));
		add_action('hii_split_portfolio_sidebar_tags', array($this,'hii_split_portfolio_sidebar_tags'));
		add_action('hii_split_portfolio_sidebar_team', array($this,'hii_split_portfolio_sidebar_team'));	
		add_action('hii_split_portfolio_sidebar_about', array($this,'hii_split_portfolio_sidebar_about'));	
		
		add_action('before_portfolio', array($this,'before_portfolio'));	
		add_action('after_portfolio', array($this,'after_portfolio'));	
		
		foreach($this->hii_hooks as $hook) {
			add_action($hook, function() use ( $hook ){
				$hooks = get_option('hii_hooks');
				if(! empty($hooks[$hook]))
					echo __hii($hooks[$hook]); // WPCS: XSS ok.
				else
					return;
			});
		}
		
	}
	
		
	public function add_admin_hooks_page(){
		$opt_key = 'hii_hooks';
		
	    $show_on = array( 'key' => 'options-page', 'value' => array( $opt_key ) );
	    
		$boxes = array();
		$tabs = array();
		
		
		$cmb = new_cmb2_box( array(
	        'id'        => 'header',
	        'title'     => __( 'Header', 'hiiwp' ),
	        'show_on'   => $show_on,
	        'display_cb' => false,
	        'admin_menu_hook' => false
	    ));
	    	
	    	
	    foreach($this->hii_hooks as $hook) {
					
		    $cmb->add_field( array(
		        'name'       => $hook,
		        'id'         => $hook,
		        'type'       => 'textarea_code',
		        'default'	 => '',
		    ));
	    }
	    
	    
	    
	    $cmb->object_type( 'options-page' );
	    $boxes[] = $cmb;
	    
	    $tabs[] = array(
	         'id'    => 'hooks_header',
	         'title' => 'Header',
	         'desc'  => '',
	         'boxes' => array(
		         'header',
	         ),
	    );
		
		// configuration array
		$args = array(
			'key'      => $opt_key,
			'title'    => 'HiiWP Theme Hooks',
			'topmenu'  => 'hii_seo_settings',
			'cols'     => 1,
			'boxes'    => $boxes,
			'tabs'     => $tabs,
			'menuargs' => array(
				'menu_title' => 'Custom Hooks',
				'position'	=> 1,
			),
			'savetxt'    => 'Save',
		);
		
		// create the options page
		new Cmb2_Metatabs_Options( $args );
	}
	
	/**
	 * hii_doctype function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_doctype(){
		$doctype = '<!doctype html>';
		$html_tag = '<html '. get_language_attributes() .'>';
		return $doctype.$html_tag;
	}
	
	/**
	 * hii_doctype function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_header_hgroup(){
		return;
	}
	
	/**
	 * hii_header_bottom_left function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_header_bottom_left(){
		if ( is_active_sidebar( 'header_bottom_left' ) ) :
			dynamic_sidebar( 'header_bottom_left' );
		endif;
	}
	
	/**
	 * hii_header_bottom_right function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_header_bottom_right(){
		if ( is_active_sidebar( 'header_bottom_right' ) ) :
			dynamic_sidebar( 'header_bottom_right' );
		endif;
	}
	
	/**
	 * hii_split_portfolio_sidebar_title function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_split_portfolio_sidebar_title($args){
		$title = '<div class="project-title">
				<h4 itemprop="headline">'.$args[0].'</h4>
			<div class="col-1 project-icon cat-icon">
				<img src="'.$args[1].'">
			</div>
		</div>';
		
		echo wp_kses_post($title); // WPCS: XSS ok.
	}
	
	/**
	 * hii_split_portfolio_sidebar_client function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_split_portfolio_sidebar_client($portfolio_client){
		$client = '<div>
			<div class="col-12 project-client">
				<h3>CLIENT</h3>
				<h2>
					'.$portfolio_client.'
				</h2>
			</div>
		</div>';
		
		echo wp_kses_post($client); // WPCS: XSS ok.
	}
	
	/**
	 * hii_split_portfolio_sidebar_date function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_split_portfolio_sidebar_date($args){
		$date = '<div class="row">
			<small><time class="time op-published" datetime="'.$args[0].'"><span class="date">'.$args[1].'</span></time></small>
		</div>';
		
		echo wp_kses_post($date); // WPCS: XSS ok.
	}
	
	/**
	 * hii_split_portfolio_sidebar_tags function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_split_portfolio_sidebar_tags($tags){
		if($tags) { 
			$portfolio_tags = '<div class="row">
	        	<div class="tags_text">
					<span itemprop="keywords" class="labels">
						<small>';
							if(is_array($tags)) {
								foreach($tags as $tag) {
									$tad_id = get_tag_link($tag->term_id);
									$portfolio_tags .= '<a href="'.$tad_id.'">#'.$tag->name.'</a> ';
								}
							}
							
						$portfolio_tags .= '</small>
						</span>
				</div>
			</div>';
			echo wp_kses_post($portfolio_tags); // WPCS: XSS ok.
		}
	}
	
	/**
	 * hii_split_portfolio_sidebar_team function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_split_portfolio_sidebar_team($contributers){
		if(is_array($contributers)):
			$team = '<div class="row project-group">';
				foreach ( $contributers as $key => $entry ) {
				
					$role = $name = '';
				
					if ( isset( $entry['role'] ) && isset( $entry['name'] )) { 
						$team .= '<div class="row"><div class="col-6"><strong>';
						$team .= $entry['role'];
						$team .= ': </strong>';
						$team .= $entry['name'];
						$team .= '</div></div>';
					}			
				}	
			$team .= '</div>';
			
			echo wp_kses_post($team); // WPCS: XSS ok.
		endif;
	}
	
	/**
	 * hii_split_portfolio_sidebar_about function.
	 * 
	 * @access public
	 * @return void
	 */
	public function hii_split_portfolio_sidebar_about($args){
		
		$author = get_the_author_meta( 'display_name' , $args[0] );
		$author_url = get_author_posts_url( $args[0] );
		
		$about = '<div class="row project-author">
			<div class="col-2 author-icon project-icon">
				<a href="'.$author_url.'">
					'.get_avatar( $args[0],50,NULL,$author,array(50,50,50,'avatar_default',false,'G',NULL,'avatar') ).'
				</a>
			</div>
			<div class="col-10">
				<a href="'.$author_url.'"><h4>'.$author.'</h4></a>
				<small>'.__( 'Author', 'hiiwp' ).'</small>
				
				<div class="project-description">';
					if($args[1] != '') {
						$about .= $args[1];	 
					}
				$about .= '</div>
			</div>
		</div>';
		
		echo wp_kses_post($about); // WPCS: XSS ok.
	}
	
	/**
	 * before_portfolio function.
	 * 
	 * @access public
	 * @return void
	 */
	public function before_portfolio($args){
		$hiilite_options = HiiWP::get_options();
		
		$html = '<div class="row"><div class="container_inner">';
		if($hiilite_options['portfolio_in_grid'] == true) $html .= '<div class="in_grid">';
		
		echo wp_kses_post($html);
	}
	
	/**
	 * before_portfolio function.
	 * 
	 * @access public
	 * @return void
	 */
	public function after_portfolio($args){
		$hiilite_options = HiiWP::get_options();
		
		$html = '';
		if($hiilite_options['portfolio_in_grid'] == true) $html .= '</div>';
		$html .= '</div></div>';
		
		echo wp_kses_post($html);
	}
	
}