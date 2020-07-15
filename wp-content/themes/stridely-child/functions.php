<?php

/*** Child Theme Function  ***/

if ( !function_exists( 'strata_qode_child_theme_enqueue_scripts' ) ) {
	function strata_qode_child_theme_enqueue_scripts() {
		$parent_style = 'strata-default-style';
		
		wp_enqueue_style( 'strata-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'strata_qode_child_theme_enqueue_scripts' );
}
