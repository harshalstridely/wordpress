<?php

if ( ! function_exists( 'strata_core_is_installed' ) ) {
	/**
	 * Function that checks if forward module installed
	 *
	 * @param $name string - module name
	 *
	 * @return bool
	 */
	function strata_core_is_installed( $name ) {
		
		switch ( $name ) {
			case 'theme';
				return defined( 'STRATA_QODE' );
				break;
			case 'woocommerce';
				return function_exists( 'is_woocommerce' );
				break;
			case 'gutenberg-editor';
				return function_exists( 'register_block_type' );
				break;
			default:
				return false;
		}
	}
}