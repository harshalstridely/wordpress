<?php

if ( ! function_exists( 'strata_core_header_meta' ) ) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function strata_core_header_meta() {
		global $qode_options_theme13;
		
		if ( isset( $qode_options_theme13['disable_qode_seo'] ) && $qode_options_theme13['disable_qode_seo'] == 'no' && ! strata_core_seo_plugin_installed() ) {
			
			$seo_description = get_post_meta( strata_qode_get_page_id(), "qode_seo_description", true );
			$seo_keywords    = get_post_meta( strata_qode_get_page_id(), "qode_seo_keywords", true );
			?>
			
			<?php if ( $seo_description ) { ?>
				<meta name="description" content="<?php echo esc_attr( $seo_description ); ?>">
			<?php } else if ( $qode_options_theme13['meta_description'] ) { ?>
				<meta name="description" content="<?php echo esc_attr( $qode_options_theme13['meta_description'] ) ?>">
			<?php } ?>
			
			<?php if ( $seo_keywords ) { ?>
				<meta name="keywords" content="<?php echo esc_attr( $seo_keywords ); ?>">
			<?php } else if ( $qode_options_theme13['meta_keywords'] ) { ?>
				<meta name="keywords" content="<?php echo esc_attr( $qode_options_theme13['meta_keywords'] ) ?>">
			<?php }
		}
		
		$favicon = get_option( 'site_icon' );
		if ( empty( $favicon ) && $qode_options_theme13['favicon_image'] !== '' ) { ?>
			<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( $qode_options_theme13['favicon_image'] ); ?>">
			<link rel="apple-touch-icon" href="<?php echo esc_url( $qode_options_theme13['favicon_image'] ); ?>"/>
		<?php }
	}
	
	add_action( 'strata_qode_action_header_meta', 'strata_core_header_meta' );
}

if ( ! function_exists( 'strata_core_ajax_meta' ) ) {
	/**
	 * Function that echoes meta data for ajax
	 *
	 * @since 5.0
	 * @version 0.2
	 */
	function strata_core_ajax_meta() {
		global $qode_options_theme13;
		
		if ( isset( $qode_options_theme13['disable_qode_seo'] ) && $qode_options_theme13['disable_qode_seo'] == 'no' && ! strata_core_seo_plugin_installed() ) {
			$seo_description = get_post_meta( strata_qode_get_page_id(), "qode_seo_description", true );
			$seo_keywords    = get_post_meta( strata_qode_get_page_id(), "qode_seo_keywords", true );
			?>
			
			<div class="seo_title"><?php wp_title( '' ); ?></div>
			
			<?php if ( $seo_description !== '' ) { ?>
				<div class="seo_description"><?php echo esc_attr( $seo_description ); ?></div>
			<?php } else if ( $qode_options_theme13['meta_description'] ) { ?>
				<div class="seo_description"><?php echo esc_attr( $qode_options_theme13['meta_description'] ); ?></div>
			<?php } ?>
			<?php if ( $seo_keywords !== '' ) { ?>
				<div class="seo_keywords"><?php echo esc_attr( $seo_keywords ); ?></div>
			<?php } else if ( $qode_options_theme13['meta_keywords'] ) { ?>
				<div class="seo_keywords"><?php echo esc_attr( $qode_options_theme13['meta_keywords'] ); ?></div>
			<?php }
		}
	}

	add_action('qode_ajax_meta', 'strata_core_ajax_meta');
}

if ( ! function_exists( 'strata_core_seo_plugin_installed' ) ) {
	/**
	 * Function that checks if popular seo plugins are installed
	 * @return bool
	 */
	function strata_core_seo_plugin_installed() {
		return defined( 'WPSEO_VERSION' );
	}
}

if ( ! function_exists( 'strata_qode_remove_yoast_json_on_ajax' ) ) {
	/**
	 * Function that removes yoast json ld script
	 * that stops page transition to work on home page
	 * Hooks to wpseo_json_ld_output in order to disable json ld script
	 * @return bool
	 *
	 * @param $data array json ld data that is being passed to filter
	 *
	 * @version 0.2
	 */
	function strata_qode_remove_yoast_json_on_ajax( $data ) {
		global $qode_options_theme13;
		
		//is current request made through ajax?
		if ( isset( $qode_options_theme13['page_transitions'] ) && $qode_options_theme13['page_transitions'] !== 0 ) {
			//disable json ld script
			return array();
		}
		
		return $data;
	}
	
	//is yoast installed and it's version is greater or equal of 1.6?
	if ( strata_core_seo_plugin_installed() && version_compare( WPSEO_VERSION, '1.6' ) >= 0 ) {
		add_filter( 'wpseo_json_ld_output', 'strata_qode_remove_yoast_json_on_ajax' );
		add_filter( 'disable_wpseo_json_ld_search', 'strata_qode_remove_yoast_json_on_ajax' );
	}
}