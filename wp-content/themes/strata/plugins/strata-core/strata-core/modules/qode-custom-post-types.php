<?php

/* Create Portfolio, Testimonial, Slider and Carousel post type */
if ( ! function_exists( 'strata_core_create_post_type' ) ) {
	function strata_core_create_post_type() {
		global $qode_options_theme13;
		$slug = 'portfolio_page';
		if ( isset( $qode_options_theme13['portfolio_single_slug'] ) && $qode_options_theme13['portfolio_single_slug'] != "" ) {
			$slug = $qode_options_theme13['portfolio_single_slug'];
		}
		
		register_post_type( 'portfolio_page',
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Portfolio', 'strata-core' ),
					'singular_name' => esc_html__( 'Portfolio Item', 'strata-core' ),
					'add_item'      => esc_html__( 'New Portfolio Item', 'strata-core' ),
					'add_new_item'  => esc_html__( 'Add New Portfolio Item', 'strata-core' ),
					'edit_item'     => esc_html__( 'Edit Portfolio Item', 'strata-core' )
				),
				'public'        => true,
				'has_archive'   => true,
				'rewrite'       => array( 'slug' => $slug ),
				'menu_position' => 4,
				'show_ui'       => true,
				'supports'      => array( 'author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
			)
		);
		
		register_post_type( 'testimonials',
			array(
				'labels'              => array(
					'name'          => esc_html__( 'Testimonials', 'strata-core' ),
					'singular_name' => esc_html__( 'Testimonial', 'strata-core' ),
					'add_item'      => esc_html__( 'New Testimonial', 'strata-core' ),
					'add_new_item'  => esc_html__( 'Add New Testimonial', 'strata-core' ),
					'edit_item'     => esc_html__( 'Edit Testimonial', 'strata-core' )
				),
				'public'              => false,
				'show_in_menu'        => true,
				'rewrite'             => array( 'slug' => 'testimonials' ),
				'menu_position'       => 4,
				'show_ui'             => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'hierarchical'        => false,
				'supports'            => array( 'title', 'thumbnail' )
			)
		);
		
		register_post_type( 'slides',
			array(
				'labels'              => array(
					'name'          => esc_html__( 'Qode Slider', 'strata-core' ),
					'menu_name'     => esc_html__( 'Qode Slider', 'strata-core' ),
					'all_items'     => esc_html__( 'Slides', 'strata-core' ),
					'add_new'       => esc_html__( 'Add New Slide', 'strata-core' ),
					'singular_name' => esc_html__( 'Slide', 'strata-core' ),
					'add_item'      => esc_html__( 'New Slide', 'strata-core' ),
					'add_new_item'  => esc_html__( 'Add New Slide', 'strata-core' ),
					'edit_item'     => esc_html__( 'Edit Slide', 'strata-core' )
				),
				'public'              => false,
				'show_in_menu'        => true,
				'rewrite'             => array( 'slug' => 'slides' ),
				'menu_position'       => 4,
				'show_ui'             => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'hierarchical'        => false,
				'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
				'menu_icon'           => QODE_ROOT . '/img/favicon.ico'
			)
		);
		
		register_post_type( 'carousels',
			array(
				'labels'              => array(
					'name'          => esc_html__( 'Qode Carousel', 'strata-core' ),
					'menu_name'     => esc_html__( 'Qode Carousel', 'strata-core' ),
					'all_items'     => esc_html__( 'Carousel Items', 'strata-core' ),
					'add_new'       => esc_html__( 'Add New Carousel Item', 'strata-core' ),
					'singular_name' => esc_html__( 'Carousel Item', 'strata-core' ),
					'add_item'      => esc_html__( 'New Carousel Item', 'strata-core' ),
					'add_new_item'  => esc_html__( 'Add New Carousel Item', 'strata-core' ),
					'edit_item'     => esc_html__( 'Edit Carousel Item', 'strata-core' )
				),
				'public'              => false,
				'show_in_menu'        => true,
				'rewrite'             => array( 'slug' => 'carousels' ),
				'menu_position'       => 4,
				'show_ui'             => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'hierarchical'        => false,
				'supports'            => array( 'title' ),
				'menu_icon'           => QODE_ROOT . '/img/favicon.ico'
			)
		);
		
		/* Create Portfolio Categories */
		
		$labels = array(
			'name'              => esc_html__( 'Portfolio Categories', 'strata-core' ),
			'singular_name'     => esc_html__( 'Portfolio Category', 'strata-core' ),
			'search_items'      => esc_html__( 'Search Portfolio Categories', 'strata-core' ),
			'all_items'         => esc_html__( 'All Portfolio Categories', 'strata-core' ),
			'parent_item'       => esc_html__( 'Parent Portfolio Category', 'strata-core' ),
			'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'strata-core' ),
			'edit_item'         => esc_html__( 'Edit Portfolio Category', 'strata-core' ),
			'update_item'       => esc_html__( 'Update Portfolio Category', 'strata-core' ),
			'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'strata-core' ),
			'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'strata-core' ),
			'menu_name'         => esc_html__( 'Portfolio Categories', 'strata-core' ),
		);
		
		register_taxonomy( 'portfolio_category', array( 'portfolio_page' ), array(
			'hierarchical' => true,
			'labels'       => $labels,
			'show_ui'      => true,
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'portfolio-category' ),
		) );
		
		/* Create Testimonials Category */
		
		$labels = array(
			'name'              => esc_html__( 'Testimonials Categories', 'strata-core' ),
			'singular_name'     => esc_html__( 'Testimonial Category', 'strata-core' ),
			'search_items'      => esc_html__( 'Search Testimonials Categories', 'strata-core' ),
			'all_items'         => esc_html__( 'All Testimonials Categories', 'strata-core' ),
			'parent_item'       => esc_html__( 'Parent Testimonial Category', 'strata-core' ),
			'parent_item_colon' => esc_html__( 'Parent Testimonial Category:', 'strata-core' ),
			'edit_item'         => esc_html__( 'Edit Testimonials Category', 'strata-core' ),
			'update_item'       => esc_html__( 'Update Testimonials Category', 'strata-core' ),
			'add_new_item'      => esc_html__( 'Add New Testimonials Category', 'strata-core' ),
			'new_item_name'     => esc_html__( 'New Testimonials Category Name', 'strata-core' ),
			'menu_name'         => esc_html__( 'Testimonials Categories', 'strata-core' ),
		);
		
		register_taxonomy( 'testimonials_category', array( 'testimonials' ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'testimonials-category' ),
		) );
		
		/* Create Slider Category */
		
		$labels = array(
			'name'              => esc_html__( 'Sliders', 'strata-core' ),
			'singular_name'     => esc_html__( 'Slider', 'strata-core' ),
			'search_items'      => esc_html__( 'Search Sliders', 'strata-core' ),
			'all_items'         => esc_html__( 'All Sliders', 'strata-core' ),
			'parent_item'       => esc_html__( 'Parent Slider', 'strata-core' ),
			'parent_item_colon' => esc_html__( 'Parent Slider:', 'strata-core' ),
			'edit_item'         => esc_html__( 'Edit Slider', 'strata-core' ),
			'update_item'       => esc_html__( 'Update Slider', 'strata-core' ),
			'add_new_item'      => esc_html__( 'Add New Slider', 'strata-core' ),
			'new_item_name'     => esc_html__( 'New Slider Name', 'strata-core' ),
			'menu_name'         => esc_html__( 'Sliders', 'strata-core' ),
		);
		
		register_taxonomy( 'slides_category', array( 'slides' ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'slides-category' ),
		) );
		
		/* Create Carousel Category */
		
		$labels = array(
			'name'              => esc_html__( 'Carousels', 'strata-core' ),
			'singular_name'     => esc_html__( 'Carousel', 'strata-core' ),
			'search_items'      => esc_html__( 'Search Carousels', 'strata-core' ),
			'all_items'         => esc_html__( 'All Carousels', 'strata-core' ),
			'parent_item'       => esc_html__( 'Parent Carousel', 'strata-core' ),
			'parent_item_colon' => esc_html__( 'Parent Carousel:', 'strata-core' ),
			'edit_item'         => esc_html__( 'Edit Carousel', 'strata-core' ),
			'update_item'       => esc_html__( 'Update Carousel', 'strata-core' ),
			'add_new_item'      => esc_html__( 'Add New Carousel', 'strata-core' ),
			'new_item_name'     => esc_html__( 'New Carousel Name', 'strata-core' ),
			'menu_name'         => esc_html__( 'Carousels', 'strata-core' ),
		);
		
		register_taxonomy( 'carousels_category', array( 'carousels' ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'carousels-category' ),
		) );
	}
	
	add_action( 'init', 'strata_core_create_post_type', 0 );
}