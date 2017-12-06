<?php 
if($hiilite_options['testimonials_on'] == true):

		
	$title = $hiilite_options[ 'testimonials_title'];
	$testimonials_slug = $hiilite_options[ 'testimonials_slug' ];
	$tax_title = $hiilite_options[ 'testimonials_tax_title' ];
	$testimonials_tax_slug = $hiilite_options[ 'testimonials_tax_slug' ];
	
	
	$labels = array( 
		'name'               => sprintf(_x( '%s', 'testimonials', 'hiiwp' ), $title ),
		'singular_name'      => sprintf(_x( '%s Item', 'post type singular name', 'hiiwp' ), $title ),
		'menu_name'          => sprintf(_x( '%s', 'admin menu', 'hiiwp' ), $title ),
		'name_admin_bar'     => sprintf(_x( "%s", 'add new on admin bar', 'hiiwp' ), $title ),
		'add_new'            => sprintf(_x( "Add %s Item", 'book', 'hiiwp' ), $title ),
		'add_new_item'       => sprintf(__( "Add New %s Item", 'hiiwp' ), $title ),
		'new_item'           => sprintf(__( "New %s Item", 'hiiwp' ), $title ),
		'edit_item'          => sprintf(__( "Edit %s Item", 'hiiwp' ), $title ),
		'view_item'          => sprintf(__( "View %s Item", 'hiiwp' ), $title ),
		'all_items'          => sprintf(__( "All %s Items", 'hiiwp' ), $title ),
		'search_items'       => sprintf(__( "Search %s", 'hiiwp' ), $title ),
		'parent_item_colon'  => sprintf(__( "Parent %s Item:", 'hiiwp' ), $title ),
		'not_found'          => sprintf(__( "No %s items found.", 'hiiwp' ), $title ),
		'not_found_in_trash' => sprintf(__( "No %s items found in Trash.", 'hiiwp' ), $title )
	);
	
	$args = array(
		'labels'             => $labels,
	    'description'        => __( 'Description.', 'hiiwp' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $testimonials_slug, 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'			 => 'dashicons-format-quote',
		'supports'           => array( 'title','thumbnail','editor'),
	);
	
	register_post_type( $testimonials_slug, $args );
	
	
	// Register Taxonomy
	$labels = array(
	    'name'              => sprintf(_x( "%s", 'taxonomy general name', 'hiiwp' ), $tax_title ),
	    'singular_name'     => sprintf(_x( "%s", 'taxonomy singular name', 'hiiwp' ), $tax_title ),
	    'search_items'      => sprintf(__( "Search %s", 'hiiwp' ), $tax_title ),
	    'all_items'         => sprintf(__( "All %s", 'hiiwp' ), $tax_title ),
	    'parent_item'       => sprintf(__( 'Parent %s', 'hiiwp' ), $tax_title ),
	    'parent_item_colon' => sprintf(__( 'Parent %s:', 'hiiwp' ), $tax_title ),
	    'edit_item'         => sprintf(__( "Edit %s", 'hiiwp' ), $tax_title ),
	    'update_item'       => sprintf(__( "Update %s", 'hiiwp' ), $tax_title ),
	    'add_new_item'      => sprintf(__( "Add New %s", 'hiiwp' ), $tax_title ),
	    'new_item_name'     => sprintf(__( "New %s Name", 'hiiwp' ), $tax_title ),
	    'menu_name'         => sprintf(__( "%s", 'hiiwp' ), $tax_title ),
	);
	
	$args = array(
	    'hierarchical'      => true,
	    'labels'            => $labels,
	    'show_ui'           => true,
	    'show_admin_column' => true,
	    'query_var'         => true,
	    'rewrite'           => array( 'slug' => $testimonials_tax_slug, 'with_front' => false ),
	);
	
	register_taxonomy( $testimonials_tax_slug, array( $testimonials_slug ), $args );
	
	$sections = get_terms($testimonials_tax_slug);
	$hiilite_options['testimonials_sections']['all'] = 'All';
	foreach($sections as $section){
		$hiilite_options['testimonials_sections'][$section->name] = $section->slug;
	}
	
	
	
endif;
?>