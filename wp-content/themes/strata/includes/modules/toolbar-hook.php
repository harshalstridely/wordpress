<?php
//$qode_toolbar = true;

if ( isset( $qode_toolbar ) ):
	add_action( 'after_setup_theme', 'strata_qode_toolbar_section_start', 1 );
	add_action( 'wp_logout', 'strata_qode_toolbar_section_end' );
	add_action( 'wp_login', 'strata_qode_toolbar_section_end' );
	
	/* Start session */
	if ( ! function_exists( 'strata_qode_toolbar_section_start' ) ) {
		function strata_qode_toolbar_section_start() {
			if ( ! session_id() ) {
				session_start();
			}
			if ( ! empty( $_GET['animation'] ) ) {
				$_SESSION['qode_animation'] = $_GET['animation'];
			}
			if ( isset( $_SESSION['qode_animation'] ) ) {
				if ( $_SESSION['qode_animation'] == "off" ) {
					$_SESSION['qode_animation'] = "";
				}
			}
		}
	}
	
	/* End session */
	
	if ( ! function_exists( 'strata_qode_toolbar_section_end' ) ) {
		function strata_qode_toolbar_section_end() {
			session_destroy();
		}
	}

endif;