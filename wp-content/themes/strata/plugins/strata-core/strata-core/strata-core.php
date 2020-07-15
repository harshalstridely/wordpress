<?php
/*
Plugin Name: Strata Core
Description: Plugin that adds additional features needed by our theme
Author: Qode Themes
Version: 1.1
*/
if ( ! class_exists( 'StrataCore' ) ) {
	class StrataCore {
		private static $instance;
		
		public function __construct() {
			require_once 'constants.php';
			require_once 'helpers/helper.php';
			
			// Make plugin available for translation
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
			
			// Add plugin's body classes
			add_filter( 'body_class', array( $this, 'add_body_classes' ) );
			
			add_action( 'after_setup_theme', array( $this, 'init' ), 5 );
		}
		
		public static function get_instance() {
			if ( self::$instance == null ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		function load_plugin_textdomain() {
			load_plugin_textdomain( 'strata-core', false, STRATA_CORE_REL_PATH . '/languages' );
		}
		
		function add_body_classes( $classes ) {
			$classes[] = 'strata-core-' . STRATA_CORE_VERSION;
			
			return $classes;
		}
		
		function init() {
			
			if ( strata_core_is_installed( 'theme' ) ) {
				include_once STRATA_CORE_MODULES_PATH . '/helper.php';
				include_once STRATA_CORE_MODULES_PATH . '/import/qode-import.php';
			}
		}
	}
	
	StrataCore::get_instance();
}