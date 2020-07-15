<?php

if ( ! function_exists( 'strata_core_register_widgets' ) ) {
	function strata_core_register_widgets() {
		register_widget( 'Call_To_Action' );
		register_widget( 'Qode_Flickr_Widget' );
		register_widget( 'Latest_Posts_Menu' );
		register_widget( 'Related_Posts' );
		
		if ( strata_core_is_installed( 'woocommerce' ) ) {
			register_widget( 'Woocommerce_Dropdown_Cart' );
		}
	}
	
	add_action( 'widgets_init', 'strata_core_register_widgets' );
}