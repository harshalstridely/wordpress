<?php

//define constants
define( 'STRATA_QODE', true );
define( 'QODE_ROOT', get_template_directory_uri() );
define( 'QODE_ROOT_DIR', get_template_directory() );
define( 'QODE_CSS_ROOT', QODE_ROOT . '/css' );
define( 'QODE_CSS_ROOT_DIR', QODE_ROOT_DIR . '/css' );
define( 'QODE_JS_ROOT', QODE_ROOT . '/js' );
define( 'QODE_JS_ROOT_DIR', QODE_ROOT_DIR . '/js' );
define( 'QODE_INCLUDES_ROOT', QODE_ROOT . '/includes' );
define( 'QODE_INCLUDES_ROOT_DIR', QODE_ROOT_DIR . '/includes' );
define( 'QODE_VAR_PREFIX', 'qode_' );

if ( file_exists( QODE_ROOT_DIR . '/export' ) && file_exists( QODE_ROOT_DIR . '/export/qode-export.php' ) ) {
	include_once QODE_ROOT_DIR . '/export/qode-export.php';
}

include_once QODE_INCLUDES_ROOT_DIR . '/modules/toolbar-hook.php';
include_once QODE_INCLUDES_ROOT_DIR . '/qode-plugin-helper-functions.php';
include_once QODE_INCLUDES_ROOT_DIR . '/qode-dynamic-helper-functions.php';
include_once QODE_INCLUDES_ROOT_DIR . '/qode-body-classes.php';
include_once QODE_INCLUDES_ROOT_DIR . '/qode-custom-sidebar.php';
include_once QODE_INCLUDES_ROOT_DIR . '/font-awesome/font-awesome.php';
include_once QODE_INCLUDES_ROOT_DIR . '/nav-menu/qode-menu.php';
include_once QODE_INCLUDES_ROOT_DIR . '/widgets/qode-related-posts-widget.php';
include_once QODE_INCLUDES_ROOT_DIR . '/widgets/qode-flickr-widget.php';
include_once QODE_INCLUDES_ROOT_DIR . '/widgets/qode-call-to-action-widget.php';
include_once QODE_INCLUDES_ROOT_DIR . '/widgets/qode-latest-posts-menu.php';

if ( function_exists( "is_woocommerce" ) ) {
	require_once QODE_ROOT_DIR . '/woocommerce/woocommerce_configuration.php';
	include_once QODE_INCLUDES_ROOT_DIR . '/widgets/qode-woocommerce-dropdown-cart.php';
}