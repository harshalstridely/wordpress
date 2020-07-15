<?php

include_once get_template_directory() . '/theme-includes.php';

if ( ! function_exists( 'strata_qode_rewrite_rules_on_theme_activation' ) ) {
	function strata_qode_rewrite_rules_on_theme_activation() {
		flush_rewrite_rules();
	}
	
	add_action( 'after_switch_theme', 'strata_qode_rewrite_rules_on_theme_activation' );
}

if ( ! function_exists( 'strata_qode_add_theme_support' ) ) {
	function strata_qode_add_theme_support() {
		//add support for feed links
		add_theme_support( 'automatic-feed-links' );
		
		//add support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );
		
		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		//add theme support for title tag
		add_theme_support( 'title-tag' );
		
		//defined content width variable
		$GLOBALS['content_width'] = 1060;
		
		load_theme_textdomain( 'strata', get_template_directory() . '/languages' );
		
		//add theme support for editor style
		add_editor_style( 'css/admin/editor-style.css' );
		
		add_image_size( 'strata-menu-featured-post', 345, 198, true );
		
		register_nav_menus(
			array(
				'top-navigation' => esc_html__( 'Top Navigation', 'strata' )
			)
		);
	}
	
	add_action( 'after_setup_theme', 'strata_qode_add_theme_support' );
}

if ( ! function_exists( 'strata_qode_styles' ) ) {
	function strata_qode_styles() {
		$global_options = strata_qode_return_global_options();
		
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_style( "strata-default-style", QODE_ROOT . "/style.css" );
		
		do_action( 'strata_qode_action_enqueue_before_main_css' );
		
		wp_enqueue_style( "strata-stylesheet", QODE_CSS_ROOT . "/stylesheet.min.css" );
		
		if ( strata_qode_is_woocommerce_installed() ) {
			wp_enqueue_style( "strata-woocommerce", QODE_CSS_ROOT . "/woocommerce.css" );
			wp_enqueue_style( "strata-woocommerce_responsive", QODE_CSS_ROOT . "/woocommerce_responsive.min.css" );
		}
		
		if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic.css' ) && strata_qode_is_css_folder_writable() && ! is_multisite() ) {
			wp_enqueue_style( 'strata-style-dynamic', QODE_CSS_ROOT . '/style_dynamic.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic.css' ) );
		} else if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic_ms_id_' . strata_qode_get_multisite_blog_id() . '.css' ) && strata_qode_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style( 'strata-style-dynamic', QODE_CSS_ROOT . '/style_dynamic_ms_id_' . strata_qode_get_multisite_blog_id() . '.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic_ms_id_' . strata_qode_get_multisite_blog_id() . '.css' ) );
		} else {
			wp_enqueue_style( 'strata-style-dynamic', QODE_CSS_ROOT . '/style_dynamic_callback.php' ); // Temporary case for Major update
		}
		
		$responsiveness = "yes";
		if ( isset( $global_options['responsiveness'] ) ) {
			$responsiveness = $global_options['responsiveness'];
		}
		
		if ( $responsiveness != "no" ):
			wp_enqueue_style( "strata-responsive", QODE_CSS_ROOT . "/responsive.min.css" );
			
			//include proper styles
			if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive.css' ) && strata_qode_is_css_folder_writable() && ! is_multisite() ) {
				wp_enqueue_style( 'strata-style-dynamic-responsive', QODE_CSS_ROOT . '/style_dynamic_responsive.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive.css' ) );
			} else if ( file_exists( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive_ms_id_' . strata_qode_get_multisite_blog_id() . '.css' ) && strata_qode_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style( 'strata-style-dynamic-responsive', QODE_CSS_ROOT . '/style_dynamic_responsive_ms_id_' . strata_qode_get_multisite_blog_id() . '.css', array(), filemtime( QODE_CSS_ROOT_DIR . '/style_dynamic_responsive_ms_id_' . strata_qode_get_multisite_blog_id() . '.css' ) );
			} else {
				wp_enqueue_style( 'strata-style-dynamic-responsive', QODE_CSS_ROOT . '/style_dynamic_responsive_callback.php' ); // Temporary case for Major update
			}
		endif;
		
		if( strata_qode_return_toolbar_variable() ){
			wp_enqueue_style( "strata-toolbar", QODE_CSS_ROOT . "/toolbar.css" );
		}
		
		wp_enqueue_style( 'js_composer_front' );
		
		$custom_css = $global_options['custom_css'];
		
		if ( ! empty( $custom_css ) ) {
			if ( $responsiveness != "no" ) {
				wp_add_inline_style( 'strata-style-dynamic-responsive', $custom_css );
			} else {
				wp_add_inline_style( 'strata-style-dynamic', $custom_css );
			}
		}
		
		$font_weight_str = '100,200,300,300i,400,400i,600,600i,700,700i,800,800i';
		$font_subset_str = 'latin,latin-ext';
		
		//default fonts
		$default_font_family = array(
			'Open Sans',
			'Roboto',
			'Roboto Slab'
		);
		
		$modified_default_font_family = array();
		foreach ( $default_font_family as $default_font ) {
			$modified_default_font_family[] = $default_font . ':' . str_replace( ' ', '', $font_weight_str );
		}
		
		$default_font_string = implode( '|', $modified_default_font_family );
		
		$available_font_options = array_filter( array(
			$global_options['google_fonts'],
			$global_options['page_title_google_fonts'],
			$global_options['h1_google_fonts'],
			$global_options['h2_google_fonts'],
			$global_options['h3_google_fonts'],
			$global_options['h4_google_fonts'],
			$global_options['h5_google_fonts'],
			$global_options['h6_google_fonts'],
			$global_options['text_google_fonts'],
			$global_options['menu_google_fonts'],
			$global_options['dropdown_google_fonts'],
			$global_options['dropdown_google_fonts_thirdlvl'],
			$global_options['fixed_google_fonts'],
			$global_options['sticky_google_fonts'],
			$global_options['mobile_google_fonts'],
			$global_options['button_title_google_fonts'],
			$global_options['message_title_google_fonts']
		) );
		
		$additional_fonts_args  = array( 'post_status' => 'publish', 'post_type' => 'slides', 'posts_per_page' => - 1 );
		$additional_fonts_query = new WP_Query( $additional_fonts_args );
		
		if ( $additional_fonts_query->have_posts() ):
			while ( $additional_fonts_query->have_posts() ) : $additional_fonts_query->the_post();
				$post_id = get_the_ID();
				
				if ( get_post_meta( $post_id, "qode_slide-title-font-family", true ) != "" ) {
					array_push( $available_font_options, get_post_meta( $post_id, "qode_slide-title-font-family", true ) );
				}
				if ( get_post_meta( $post_id, "qode_slide-text-font-family", true ) != "" ) {
					array_push( $available_font_options, get_post_meta( $post_id, "qode_slide-text-font-family", true ) );
				}
			endwhile;
		endif;
		
		wp_reset_postdata();
		
		//define available font options array
		$fonts_array = array();
		if ( ! empty( $available_font_options ) ) {
			foreach ( $available_font_options as $font_option_value ) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				
				if ( ! in_array( str_replace( '+', ' ', $font_option_value ), $default_font_family ) && ! in_array( $font_option_string, $fonts_array ) ) {
					$fonts_array[] = $font_option_string;
				}
			}
			
			$fonts_array = array_diff( $fonts_array, array( '-1:' . $font_weight_str ) );
		}
		
		$google_fonts_string = implode( '|', $fonts_array );
		
		$protocol = is_ssl() ? 'https:' : 'http:';
		
		//is google font option checked anywhere in theme?
		if ( count( $fonts_array ) > 0 ) {
			
			//include all checked fonts
			$fonts_full_list      = $default_font_string . '|' . str_replace( '+', ' ', $google_fonts_string );
			$fonts_full_list_args = array(
				'family' => urlencode( $fonts_full_list ),
				'subset' => urlencode( $font_subset_str ),
			);
			
			$strata_global_fonts = add_query_arg( $fonts_full_list_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'strata-google-fonts', esc_url_raw( $strata_global_fonts ), array(), '1.0.0' );
			
		} else {
			//include default google font that theme is using
			$default_fonts_args          = array(
				'family' => urlencode( $default_font_string ),
				'subset' => urlencode( $font_subset_str ),
			);
			$strata_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'strata-google-fonts', esc_url_raw( $strata_global_fonts ), array(), '1.0.0' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'strata_qode_styles' );
}

if ( ! function_exists( 'strata_qode_scripts' ) ) {
	function strata_qode_scripts() {
		$global_options = strata_qode_return_global_options();
		global $is_IE;
		
		//init theme core scripts
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-widget' );
		wp_enqueue_script( 'jquery-ui-mouse' );
		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-droppable' );
		wp_enqueue_script( 'jquery-ui-resizable' );
		wp_enqueue_script( 'jquery-ui-selectable' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
		wp_enqueue_script( 'jquery-ui-button' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_script( 'jquery-effects-core' );
		wp_enqueue_script( 'jquery-effects-blind' );
		wp_enqueue_script( 'jquery-effects-bounce' );
		wp_enqueue_script( 'jquery-effects-clip' );
		wp_enqueue_script( 'jquery-effects-drop' );
		wp_enqueue_script( 'jquery-effects-explode' );
		wp_enqueue_script( 'jquery-effects-fade' );
		wp_enqueue_script( 'jquery-effects-fold' );
		wp_enqueue_script( 'jquery-effects-highlight' );
		wp_enqueue_script( 'jquery-effects-pulsate' );
		wp_enqueue_script( 'jquery-effects-scale' );
		wp_enqueue_script( 'jquery-effects-shake' );
		wp_enqueue_script( 'jquery-effects-slide' );
		wp_enqueue_script( 'jquery-effects-transfer' );
		wp_enqueue_script( 'jquery-ui-menu' );
		wp_enqueue_script( 'jquery-ui-position' );
		wp_enqueue_script( 'jquery-ui-progressbar' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-spinner' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-tooltip' );
		wp_enqueue_script( 'jquery-form' );
		wp_enqueue_script( 'wp-mediaelement' );
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'doubletaptogo', QODE_JS_ROOT . '/plugins/doubletaptogo.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', QODE_JS_ROOT . '/plugins/modernizr.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'appear', QODE_JS_ROOT . '/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent' );
		wp_enqueue_script( 'absoluteCounter', QODE_JS_ROOT . '/plugins/absoluteCounter.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'easypiechart', QODE_JS_ROOT . '/plugins/easypiechart.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'mixitup', QODE_JS_ROOT . '/plugins/jquery.mixitup.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'nicescroll', QODE_JS_ROOT . '/plugins/jquery.nicescroll.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto', QODE_JS_ROOT . '/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fitvids', QODE_JS_ROOT . '/plugins/jquery.fitvids.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'flexslider', QODE_JS_ROOT . '/plugins/jquery.flexslider-min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', QODE_JS_ROOT . '/plugins/jquery.isotope.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', QODE_JS_ROOT . '/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', QODE_JS_ROOT . '/plugins/waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jplayer', QODE_JS_ROOT . '/plugins/jplayer.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'bootstrap-carousel', QODE_JS_ROOT . '/plugins/bootstrap.carousel.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'skrollr', QODE_JS_ROOT . '/plugins/skrollr.js', array( 'jquery' ), false, true );
		wp_enqueue_script( "touchswipe", QODE_JS_ROOT . "/plugins/jquery.touchwipe.min.js", array( 'jquery' ), false, true );
		wp_enqueue_script( 'Chart', QODE_JS_ROOT . '/plugins/Chart.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing-1.3', QODE_JS_ROOT . '/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		
		if ( $is_IE ) {
			wp_enqueue_script( "html5", QODE_JS_ROOT . "/plugins/html5.js", array( 'jquery' ), false, false );
		}
		
		if ( $global_options['enable_google_map'] == "yes" ) :
			if ( isset( $global_options['google_maps_api_key'] ) && $global_options['google_maps_api_key'] != '' ) {
				$google_maps_api_key = $global_options['google_maps_api_key'];
				wp_enqueue_script( "strata-google-map-api", "https://maps.googleapis.com/maps/api/js?key=" . esc_attr( $google_maps_api_key ), array( 'jquery' ), false, true );
			}
		endif;
		
		if ( file_exists( QODE_JS_ROOT_DIR . '/default_dynamic.js' ) && strata_qode_is_js_folder_writable() && ! is_multisite() ) {
			wp_enqueue_script( 'strata-default-dynamic', QODE_JS_ROOT . '/default_dynamic.js', array( 'jquery' ), filemtime( QODE_JS_ROOT_DIR . '/default_dynamic.js' ), true );
		} else if ( file_exists( QODE_JS_ROOT_DIR . '/default_dynamic_ms_id_' . strata_qode_get_multisite_blog_id() . '.js' ) && strata_qode_is_js_folder_writable() && is_multisite() ) {
			wp_enqueue_script( 'strata-default-dynamic', QODE_JS_ROOT . '/default_dynamic_ms_id_' . strata_qode_get_multisite_blog_id() . '.js', array( 'jquery' ), filemtime( QODE_JS_ROOT_DIR . '/default_dynamic_ms_id_' . strata_qode_get_multisite_blog_id() . '.js' ), true );
		} else {
			wp_enqueue_script( 'strata-default-dynamic', QODE_JS_ROOT . '/default_dynamic_callback.php', array( 'jquery' ), false, true ); // Temporary case for Major update 4.0
		}
		
		wp_enqueue_script( "strata-default", QODE_JS_ROOT . "/default.min.js", array( 'jquery' ), false, true );
		
		$custom_js = $global_options['custom_js'];
		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'strata-default', $custom_js );
		}
		
		global $wp_scripts;
		$wp_scripts->add_data( 'comment-reply', 'group', 1 );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( "comment-reply" );
		}
		
		$has_ajax       = false;
		$qode_animation = "";
		if ( isset( $_SESSION['qode_animation'] ) ) {
			$qode_animation = $_SESSION['qode_animation'];
		}
		if ( ( $global_options['page_transitions'] != "0" ) && ( empty( $qode_animation ) || ( $qode_animation != "no" ) ) ) {
			$has_ajax = true;
		} elseif ( ! empty( $qode_animation ) && ( $qode_animation != "no" ) ) {
			$has_ajax = true;
		}
		
		if ( $has_ajax ) :
			wp_enqueue_script( "strata-ajax", QODE_JS_ROOT . "/ajax.min.js", array( 'jquery' ), false, true );
		endif;
		
		wp_enqueue_script( 'wpb_composer_front_js' );
		
		if ( $global_options['use_recaptcha'] == "yes" ) :
			wp_enqueue_script( "recaptcha-ajax", "https://www.google.com/recaptcha/api/js/recaptcha_ajax.js", array( 'jquery' ), false, true );
		endif;
		
		if ( strata_qode_return_toolbar_variable() ):
			wp_enqueue_script( "strata-toolbar", QODE_ROOT . "/js/toolbar.js", array( 'jquery' ), false, true );
		endif;
		
		if ( strata_qode_is_woocommerce_installed() ) {
			wp_enqueue_script( "strata-woocommerce", QODE_JS_ROOT . "/woocommerce.js", array( 'jquery' ), false, true );
			wp_enqueue_script( "select2", QODE_JS_ROOT . "/plugins/select2.min.js", array( 'jquery' ), false, true );
		}
	}
	
	add_action('wp_enqueue_scripts', 'strata_qode_scripts');
}

if ( ! function_exists( 'strata_qode_set_global_variables' ) ) {
	function strata_qode_set_global_variables() {
		$sticky_scroll_amount = get_post_meta( strata_qode_get_page_id(), "qode_page_scroll_amount_for_sticky", true );
		
		if ( $sticky_scroll_amount !== '' ) {
			wp_localize_script( 'strata-default', 'page_scroll_amount_for_sticky', $sticky_scroll_amount );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'strata_qode_set_global_variables' );
}

if ( ! function_exists( 'strata_qode_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function strata_qode_enqueue_editor_customizer_styles() {
		$protocol = is_ssl() ? 'https:' : 'http:';
		//include default google font that theme is using
		$default_fonts_args          = array(
			'family' => urlencode( 'Open Sans:300,400,600,700' ),
			'subset' => urlencode( 'latin-ext' ),
		);
		$strata_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
		wp_enqueue_style( 'strata-editor-google-fonts', esc_url_raw( $strata_global_fonts ) );
		
		wp_enqueue_style( 'strata-editor-customizer-style', QODE_CSS_ROOT . '/admin/editor-customizer-style.css' );
		wp_enqueue_style( 'strata-editor-blocks-style', QODE_CSS_ROOT . '/admin/editor-blocks-style.css' );
	}
	
	add_action( 'enqueue_block_editor_assets', 'strata_qode_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'strata_qode_enqueue_gutenberg_styles' ) ) {
	function strata_qode_enqueue_gutenberg_styles() {
		if ( function_exists( 'is_gutenberg_page' ) && is_admin() ) {
			wp_enqueue_style( 'strata-gutenberg-fix', get_template_directory_uri() . '/css/gutenberg.css', array(), '1.0' );
		}
	}
	
	add_action( 'admin_enqueue_scripts', 'strata_qode_enqueue_gutenberg_styles' );
}

if ( ! function_exists( 'strata_qode_admin_jquery' ) ) {
	function strata_qode_admin_jquery() {
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_style( 'strata-admin-style', QODE_CSS_ROOT . '/admin/admin-style.css', false, '1.0', 'screen' );
		wp_enqueue_style( 'strata-admin-colorstyle', QODE_CSS_ROOT . '/admin/admin-colorpicker.css', false, '1.0', 'screen' );
		wp_enqueue_script( 'color-picker', QODE_JS_ROOT . '/admin/colorpicker.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
		wp_register_script( 'strata-admin-default', QODE_JS_ROOT . '/admin/default.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_script( 'strata-admin-default' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
	}
	
	add_action( 'admin_enqueue_scripts', 'strata_qode_admin_jquery' );
}

if ( ! function_exists( 'strata_qode_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function strata_qode_enqueue_editor_customizer_styles() {
		$protocol = is_ssl() ? 'https:' : 'http:';
		//include default google font that theme is using
		$default_fonts_args          = array(
			'family' => urlencode( 'Open Sans:300,400,600,700' ),
			'subset' => urlencode( 'latin-ext' ),
		);
		$strata_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
		wp_enqueue_style( 'strata-editor-google-fonts', esc_url_raw( $strata_global_fonts ) );
		
		wp_enqueue_style( 'strata-editor-customizer-style', QODE_CSS_ROOT . '/admin/editor-customizer-style.css' );
		wp_enqueue_style( 'strata-editor-blocks-style', QODE_CSS_ROOT . '/admin/editor-blocks-style.css' );
	}
	
	add_action( 'enqueue_block_editor_assets', 'strata_qode_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'strata_qode_excerpt_more' ) ) {
	function strata_qode_excerpt_more( $more ) {
		return '...';
	}
	
	add_filter( 'excerpt_more', 'strata_qode_excerpt_more' );
}

if ( ! function_exists( 'strata_qode_excerpt_length' ) ) {
	function strata_qode_excerpt_length( $length ) {
		$global_options = strata_qode_return_global_options();
		
		if ( $global_options['number_of_chars'] ) {
			return $global_options['number_of_chars'];
		} else {
			return 45;
		}
	}
	
	add_filter( 'excerpt_length', 'strata_qode_excerpt_length', 999 );
}

if ( ! function_exists( 'strata_qode_the_excerpt_max_charlength' ) ) {
	function strata_qode_the_excerpt_max_charlength( $charlength ) {
		$global_options = strata_qode_return_global_options();
		
		$via        = isset( $global_options['twitter_via'] ) && $global_options['twitter_via'] !== '' ? esc_html__( 'via ', 'strata' ) . $global_options['twitter_via'] : '';
		$excerpt    = get_the_excerpt();
		$charlength = 140 - ( mb_strlen( $via ) + $charlength );
		
		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex   = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut   = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			
			if ( $excut < 0 ) {
				return mb_substr( $subex, 0, $excut );
			} else {
				return $subex;
			}
		} else {
			return $excerpt;
		}
	}
}

if ( ! function_exists( 'strata_qode_excerpt' ) ) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in strata_qode_set_blog_word_count function
	 */
	function strata_qode_excerpt() {
		$global_options = strata_qode_return_global_options();
		global $word_count, $post;
		
		if ( post_password_required() ) {
			echo get_the_password_form();
		} else {
			$word_count    = isset( $word_count ) && $word_count != "" ? $word_count : $global_options['number_of_chars'];
			$post_excerpt = $post->post_excerpt !== '' ? $post->post_excerpt : strip_tags( strip_shortcodes( $post->post_content ) );
			$clean_excerpt = strlen( $post_excerpt ) && strpos( $post_excerpt, '...' ) ? strstr( $post_excerpt, '...', true ) : $post_excerpt;
			
			if ( $clean_excerpt !== '' ) {
				$excerpt_word_array = explode( ' ', $clean_excerpt );
				$excerpt_word_array = array_slice( $excerpt_word_array, 0, $word_count );
				$excerpt            = implode( ' ', $excerpt_word_array ) . '...';
				
				echo '<p>' . wp_kses_post( $excerpt ) . '</p>';
			}
		}
	}
}

if ( ! function_exists( 'strata_qode_set_blog_word_count' ) ) {
	/**
	 * Function that sets global blog word count variable used by strata_qode_excerpt function
	 */
	function strata_qode_set_blog_word_count( $word_count_param ) {
		global $word_count;
		
		$word_count = $word_count_param;
	}
}

if ( ! function_exists( 'strata_qode_get_page_id' ) ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see strata_qode_is_woocommerce_installed()
	 * @see strata_qode_is_woocommerce_shop()
	 */
	function strata_qode_get_page_id() {
		if ( strata_qode_is_woocommerce_installed() && strata_qode_is_woocommerce_shop() ) {
			return strata_qode_get_woo_shop_page_id();
		}
		
		if ( is_archive() || is_search() || is_404() || ( is_front_page() && is_home() ) ) {
			return - 1;
		}
		
		return get_queried_object_id();
	}
}

if ( ! function_exists( 'strata_qode_user_scalable_meta' ) ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to strata_qode_action_header_meta action
	 */
	function strata_qode_user_scalable_meta() {
		$global_options = strata_qode_return_global_options();
		
		//is responsiveness option is chosen?
		if ( isset( $global_options['responsiveness'] ) && $global_options['responsiveness'] !== 'no' ) { ?>
			<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
		<?php } else { ?>
			<meta name=viewport content="width=1200,user-scalable=no">
		<?php }
	}
	
	add_action( 'strata_qode_action_header_meta', 'strata_qode_user_scalable_meta' );
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once QODE_INCLUDES_ROOT_DIR . '/class-tgm-plugin-activation.php';

if ( ! function_exists( 'strata_qode_register_required_plugins' ) ) {
	/**
	 * Register the required plugins for this theme.
	 *
	 * In this example, we register two plugins - one included with the TGMPA library
	 * and one from the .org repo.
	 *
	 * The variable passed to tgmpa_register_plugins() should be an array of plugin
	 * arrays.
	 *
	 * This function is hooked into tgmpa_init, which is fired within the
	 * TGM_Plugin_Activation class constructor.
	 */
	function strata_qode_register_required_plugins() {
		
		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			
			// This is an example of how to include a plugin pre-packaged with a theme
			array(
				'name'               => esc_html__( 'Strata Core', 'strata' ),
				'slug'               => 'strata-core',
				'source'             => get_template_directory() . '/plugins/strata-core.zip',
				'version'            => '1.1',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'LayerSlider WP', 'strata' ),
				'slug'               => 'LayerSlider',
				'source'             => get_template_directory() . '/plugins/layersliderwp-6.9.2.installable.zip',
				'version'            => '6.9.2',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'strata' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/plugins/js_composer.zip',
				'version'            => '6.0.5',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'strata' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'WooCommerce Plugin', 'strata' ),
				'slug'     => 'woocommerce',
				'required' => false
			)
		);
		
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       => 'strata',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'strata' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'strata' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'strata' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'strata' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'strata' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'strata' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'strata' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'strata' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'strata' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'strata' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'strata' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'strata' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'strata' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'strata' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'strata' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'strata' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'strata' ),
				'nag_type'                        => 'updated'
			)
		);
		
		tgmpa( $plugins, $config );
	}
	
	add_action( 'tgmpa_register', 'strata_qode_register_required_plugins' );
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

// Initialising Shortcodes
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) && ! function_exists( 'strata_qode_include_main_vc_file' ) ) {
	function strata_qode_include_main_vc_file() {
		require_once QODE_ROOT_DIR . '/extendvc/extend-vc.php';
	}
	
	add_action( 'init', 'strata_qode_include_main_vc_file', 2 );
}

if ( ! function_exists( 'strata_qode_remove_vc_grid_element' ) ) {
	/**
	 * Function that removes Grid Elements Post Type
	 * that comes with Visual Composer from version 4.4.2
	 */
	function strata_qode_remove_vc_grid_element() {
		remove_action( 'init', 'vc_grid_item_editor_create_post_type' );
	}
	
	add_action( 'vc_after_init', 'strata_qode_remove_vc_grid_element', 12 );
}

if ( ! function_exists( 'strata_qode_compare_portfolio_images' ) ) {
	function strata_qode_compare_portfolio_images( $a, $b ) {
		if ( isset( $a['portfolioimgordernumber'] ) && isset( $b['portfolioimgordernumber'] ) ) {
			if ( $a['portfolioimgordernumber'] == $b['portfolioimgordernumber'] ) {
				return 0;
			}
			
			return ( $a['portfolioimgordernumber'] < $b['portfolioimgordernumber'] ) ? - 1 : 1;
		}
		
		return 0;
	}
}

if ( ! function_exists( 'strata_qode_compare_portfolio_options' ) ) {
	function strata_qode_compare_portfolio_options( $a, $b ) {
		if ( isset( $a['optionlabelordernumber'] ) && isset( $b['optionlabelordernumber'] ) ) {
			if ( $a['optionlabelordernumber'] == $b['optionlabelordernumber'] ) {
				return 0;
			}
			
			return ( $a['optionlabelordernumber'] < $b['optionlabelordernumber'] ) ? - 1 : 1;
		}
		
		return 0;
	}
}

if ( ! function_exists( 'strata_qode_hex2rgb' ) ) {
	function strata_qode_hex2rgb( $hex ) {
		$hex = str_replace( "#", "", $hex );
		
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
		
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}
}

if ( ! function_exists( 'strata_qode_get_carousel_slider_array' ) ) {
	function strata_qode_get_carousel_slider_array() {
		$carousel_output = array( "" => "" );
		$terms           = get_terms( 'carousels_category' );
		
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ):
				$carousel_output[ $term->name ] = $term->slug;
			endforeach;
		}
		
		return $carousel_output;
	}
	
	add_action( 'init', 'strata_qode_get_carousel_slider_array', 1 );
}

if ( ! function_exists( 'strata_qode_register_sidebars' ) ) {
	function strata_qode_register_sidebars() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'strata' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable sidebar layout through global theme options or on page meta box options.', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
			'after_widget'  => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4><span class="widget_title_border"></span>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Page', 'strata' ),
			'id'            => 'sidebar_page',
			'description'   => esc_html__( 'Default Sidebar area for Pages. In order to display this area you need to enable sidebar layout through global theme options or on page meta box options.', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
			'after_widget'  => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4><span class="widget_title_border"></span>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Top Left', 'strata' ),
			'id'            => 'header_left',
			'description'   => esc_html__( 'Widgets added here will appear on the left side in top header area', 'strata' ),
			'before_widget' => '<div class="header-widget %2$s header-left-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Top Right', 'strata' ),
			'id'            => 'header_right',
			'description'   => esc_html__( 'Widgets added here will appear on the right side in top header area', 'strata' ),
			'before_widget' => '<div class="header-widget %2$s header-right-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Header Sticky Right', 'strata' ),
			'id'            => 'header_fixed_right',
			'description'   => esc_html__( 'This widget area is used only with "sticky with menu on bottom" menu type', 'strata' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Side Area', 'strata' ),
			'id'            => 'sidearea',
			'description'   => esc_html__( 'Widgets added here will appear inside Side Area', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s posts_holder">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4><span class="widget_title_border"></span>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 1', 'strata' ),
			'id'            => 'footer_column_1',
			'description'   => esc_html__( 'Widgets added here will appear in the first column of top footer area', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 2', 'strata' ),
			'id'            => 'footer_column_2',
			'description'   => esc_html__( 'Widgets added here will appear in the second column of top footer area', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 3', 'strata' ),
			'id'            => 'footer_column_3',
			'description'   => esc_html__( 'Widgets added here will appear in the third column of top footer area', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 4', 'strata' ),
			'id'            => 'footer_column_4',
			'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'strata' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Text', 'strata' ),
			'id'            => 'footer_text',
			'description'   => esc_html__( 'Widgets added here will appear in the footer bottom text area', 'strata' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		) );
		
		if ( strata_qode_is_woocommerce_installed() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'WooCommerce Dropdown Widget Area', 'strata' ),
				'id'            => 'woocommerce_dropdown',
				'description'   => esc_html__( 'This widget area should be used only for WooCommerce dropdown cart widget', 'strata' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => ''
			) );
		}
	}
	
	add_action( 'widgets_init', 'strata_qode_register_sidebars' );
}

if ( ! function_exists( 'strata_qode_comment' ) ) {
	function strata_qode_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		
		$is_pingback_comment = $comment->comment_type == 'pingback';
		
		$comment_class = 'comment';
		
		if ( $is_pingback_comment ) {
			$comment_class .= ' pingback-comment';
		}
		?>
		<li>
		<div class="<?php echo esc_attr( $comment_class ); ?>">
			<?php if ( ! $is_pingback_comment ) { ?>
				<div class="image"> <?php echo get_avatar($comment, 69); ?> </div>
			<?php } ?>
			<div class="text">
				<span class="name"><?php if ( $is_pingback_comment ) { esc_html_e( 'Pingback:', 'strata' ); } ?><?php echo get_comment_author_link(); ?></span>
				<span class="comment_date"><i class="fa fa-clock-o"></i> <?php comment_date( get_option( 'time_format' ) ); ?>, <?php comment_date( get_option( 'date_format' ) ); ?></span>
				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>
				<?php if ( ! $is_pingback_comment ) { ?>
					<div class="text_holder" id="comment-<?php echo esc_attr( comment_ID() ); ?>">
						<?php comment_text(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'strata' ); ?></em></p>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'strata_qode_is_gutenberg_installed' ) ) {
    /**
     * Function that checks if Gutenberg plugin installed
     */
    function strata_qode_is_gutenberg_installed() {
        if ( function_exists( 'is_gutenberg_page' ) ) {
            if(is_admin()){
                wp_enqueue_style( 'gutenberg-fix', get_template_directory_uri() . '/css/gutenberg.css', array(), '1.0' );
            }
        }
    }
}
add_action( 'admin_enqueue_scripts', 'strata_qode_is_gutenberg_installed' );

if ( ! function_exists( 'strata_qode_is_wp_gutenberg_installed' ) ) {
    /**
     * Function that checks if WordPress 5.x with Gutenberg editor installed
     * @return bool
     */
    function strata_qode_is_wp_gutenberg_installed() {
        return class_exists( 'WP_Block_Type' );
    }
}
