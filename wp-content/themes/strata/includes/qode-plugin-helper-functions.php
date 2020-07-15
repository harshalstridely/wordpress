<?php

if ( ! function_exists( 'strata_qode_return_toolbar_variable' ) ) {
	function strata_qode_return_toolbar_variable() {
		global $qode_toolbar;
		
		return $qode_toolbar;
	}
}

if ( ! function_exists( 'strata_qode_return_global_options' ) ) {
	function strata_qode_return_global_options() {
		global $qode_options_theme13;
		
		return $qode_options_theme13;
	}
}

if ( ! function_exists( 'strata_qode_return_global_wp_query' ) ) {
	function strata_qode_return_global_wp_query() {
		global $wp_query;
		
		return $wp_query;
	}
}

if ( ! function_exists( 'strata_qode_get_module_part' ) ) {
	function strata_qode_get_module_part( $module ) {
		return $module;
	}
}

if ( ! function_exists( 'strata_qode_get_sidebar_layout' ) ) {
	function strata_qode_get_sidebar_layout( $default_value = true ) {
		$global_options    = strata_qode_return_global_options();
		$qode_page_id      = strata_qode_get_page_id();
		$show_sidebar_meta = get_post_meta( $qode_page_id, "qode_show-sidebar", true );
		$sidebar           = $default_value ? $global_options['category_blog_sidebar'] : '';
		
		if ( ! empty( $show_sidebar_meta ) ) {
			$sidebar = $show_sidebar_meta;
		}
		
		if ( is_singular( 'post' ) && empty( $show_sidebar_meta ) ) {
			$sidebar = $global_options['blog_single_sidebar'];
		}
		
		if ( ! empty( $sidebar ) && ! is_active_sidebar( strata_qode_get_sidebar_name() ) ) {
			$sidebar = '';
		}
		
		return $sidebar;
	}
}

if ( ! function_exists( 'strata_qode_get_sidebar_name' ) ) {
	function strata_qode_get_sidebar_name() {
		$strata_options = strata_qode_return_global_options();
		$page_id      = strata_qode_get_page_id();
		
		if ( get_post_meta( $page_id, 'qode_choose-sidebar', true ) != "" ) {
			$sidebar = get_post_meta( $page_id, 'qode_choose-sidebar', true );
		} else {
			if ( is_singular( "post" ) ) {
				if ( $strata_options['blog_single_sidebar_custom_display'] != "" ) {
					$sidebar = $strata_options['blog_single_sidebar_custom_display'];
				} else {
					$sidebar = 'sidebar';
				}
			} else {
				$sidebar = 'sidebar_page';
			}
		}
		
		return $sidebar;
	}
}

if ( ! function_exists( 'strata_qode_init_global_option' ) ) {
	function strata_qode_init_global_option() {
		
		if ( ! strata_qode_is_core_installed() ) {
			global $qode_options_theme13;
			
			$qode_options_theme13 = array( // intitialize the 'qode_options_theme13' array with the following key => value pairs:
			                               "reset_to_defaults" => '',
			                               "first_color" => '',
			                               "first_color_gradient" => '',
			                               "first_gradient_border" => '',
			                               "second_color" => '',
			                               "second_color_gradient" => '',
			                               "second_gradient_border" => '',
			                               "third_color" => '',
			                               "fourth_color" => '',
			                               "background_color" => '',
			                               "background_color_box" => '',
			                               "background_color_boxes" => '',
			                               "highlight_color" => '',
			                               "selection_color" => '',
			                               "favicon_image" => QODE_ROOT."/img/favicon.ico",
			                               "background_image" => '',
			                               "patern_background_image" => '',
			                               "google_fonts" => '-1',
			                               "page_transitions" => '0',
			                               "boxed" => 'no',
			                               "loading_animation" => 'off',
			                               "qode_like" => 'on',
			                               "portfolio_qode_like" => 'on',
			                               "loading_image" => '',
			                               "smooth_scroll" => 'yes',
			                               "responsiveness" => 'yes',
			                               "show_back_button" => 'yes',
			                               "elements_animation_on_touch" => 'no',
			                               "parallax_speed" => '1',
			                               "parallax_minheight" => '400',
			                               "parallax_onoff" => 'on',
			                               "google_maps_api_key" => '',
			                               "internal_no_ajax_links" => '',
			                               "custom_css" => '',
			                               "custom_js" => '',
			                               "meta_keywords" => '',
			                               "meta_description" => '',
			                               "disable_qode_seo" => 'no',
			                               "h1_color" => '',
			                               "h1_google_fonts" => '-1',
			                               "h1_fontsize" => '',
			                               "h1_lineheight" => '',
			                               "h1_fontstyle" => '',
			                               "h1_fontweight" => '',
			                               "h2_color" => '',
			                               "h2_google_fonts" => '-1',
			                               "h2_fontsize" => '',
			                               "h2_lineheight" => '',
			                               "h2_fontstyle" => '',
			                               "h2_fontweight" => '',
			                               "h3_color" => '',
			                               "h3_google_fonts" => '-1',
			                               "h3_fontsize" => '',
			                               "h3_lineheight" => '',
			                               "h3_fontstyle" => '',
			                               "h3_fontweight" => '',
			                               "h4_color" => '',
			                               "h4_google_fonts" => '-1',
			                               "h4_fontsize" => '',
			                               "h4_lineheight" => '',
			                               "h4_fontstyle" => '',
			                               "h4_fontweight" => '',
			                               "h5_color" => '',
			                               "h5_google_fonts" => '-1',
			                               "h5_fontsize" => '',
			                               "h5_lineheight" => '',
			                               "h5_fontstyle" => '',
			                               "h5_fontweight" => '',
			                               "h6_color" => '',
			                               "h6_google_fonts" => '-1',
			                               "h6_fontsize" => '',
			                               "h6_lineheight" => '',
			                               "h6_fontstyle" => '',
			                               "h6_fontweight" => '',
			                               "h6_letterspacing" => '',
			                               "text_color" => '',
			                               "text_google_fonts" => '-1',
			                               "text_fontsize" => '',
			                               "text_lineheight" => '',
			                               "text_fontstyle" => '',
			                               "text_fontweight" => '',
			                               "text_margin" => '',
			                               "link_color" => '',
			                               "link_hovercolor" => '',
			                               "link_fontstyle" => '',
			                               "link_fontweight" => '',
			                               "link_fontdecoration" => '',
			                               "page_title_color" => '',
			                               "page_title_google_fonts" => '-1',
			                               "page_title_fontsize" => '',
			                               "page_title_lineheight" => '',
			                               "page_title_fontstyle" => '',
			                               "page_title_fontweight" => '',
			                               "info_data_color" => '',
			                               "info_data_google_fonts" => '-1',
			                               "info_data_fontsize" => '',
			                               "info_data_icon_color" => '',
			                               "info_data_fontstyle" => '',
			                               "info_data_fontweight" => '',
			                               "menu_color" => '',
			                               "menu_hovercolor" => '',
			                               "menu_google_fonts" => '-1',
			                               "menu_fontsize" => '',
			                               "menu_lineheight" => '',
			                               "menu_fontstyle" => '',
			                               "menu_fontweight" => '',
			                               "header_in_grid" => 'yes',
			                               "header_top_area" => 'no',
			                               "header_top_area_scroll" => 'no',
			                               "enable_breadcrumbs" => 'yes',
			                               "enable_search" => 'no',
			                               "header_bottom_appearance" => 'fixed',
			                               "header_style" => '',
			                               "menu_position" => '',
			                               "header_top_background_color" => '',
			                               "header_background_color" => '',
			                               "header_background_color_scroll" => '',
			                               "header_background_color_sticky" => '',
			                               "header_background_transparency_initial" => '',
			                               "header_background_transparency_scroll" => '',
			                               "header_background_transparency_sticky" => '',
			                               "header_border_transparency_initial" => '',
			                               "logo_image" => QODE_ROOT."/img/logo.png",
			                               "logo_image_light" => QODE_ROOT."/img/logo.png",
			                               "logo_image_dark" => QODE_ROOT."/img/logo_black.png",
			                               "logo_image_sticky" => QODE_ROOT."/img/logo_black.png",
			                               "center_logo_image" => 'no',
			                               "header_height" => '',
			                               "header_height_scroll" => '',
			                               "header_height_sticky" => '',
			                               "scroll_amount_for_sticky" => '',
			                               "dropdown_background_color" => '',
			                               "dropdown_background_transparency" => '',
			                               "dropdown_color" => '',
			                               "dropdown_hovercolor" => '',
			                               "dropdown_google_fonts" => '-1',
			                               "dropdown_fontsize" => '',
			                               "dropdown_lineheight" => '',
			                               "dropdown_fontstyle" => '',
			                               "dropdown_fontweight" => '',
			                               "dropdown_color_thirdlvl" => '',
			                               "dropdown_hovercolor_thirdlvl" => '',
			                               "dropdown_google_fonts_thirdlvl" => '-1',
			                               "fixed_google_fonts" => '-1',
			                               "dropdown_fontsize_thirdlvl" => '',
			                               "dropdown_lineheight_thirdlvl" => '',
			                               "dropdown_fontstyle_thirdlvl" => '',
			                               "dropdown_fontweight_thirdlvl" => '',
			                               "sticky_color" => '',
			                               "sticky_hovercolor" => '',
			                               "sticky_google_fonts" => '-1',
			                               "sticky_fontsizel" => '',
			                               "sticky_lineheight" => '',
			                               "sticky_fontstyle" => '',
			                               "sticky_fontweight" => '',
			                               "mobile_color" => '',
			                               "mobile_hovercolor" => '',
			                               "mobile_google_fonts" => '-1',
			                               "mobile_fontsize" => '',
			                               "mobile_lineheight" => '',
			                               "mobile_fontstyle" => '',
			                               "mobile_fontweight" => '',
			                               "mobile_separator_color" => '',
			                               "mobile_background_color" => '',
			                               "mobile_letter_spacing" => '',
			                               "header_separator_color" => '',
			                               "animate_title_area" => 'no',
			                               "title_text_shadow" => 'no',
			                               "title_background_color" => '',
			                               "responsive_title_image" => '',
			                               "fixed_title_image" => '',
			                               "title_image" => '',
			                               "title_overlay_image" => '',
			                               "title_height" => '',
			                               "page_title_position" => 'left',
			                               "predefined_title_sizes" => 'small',
			                               "uncovering_footer" => 'yes',
			                               "footer_in_grid" => 'no',
			                               "footer_text" => 'yes',
			                               "show_footer_top" => 'yes',
			                               "footer_top_columns" => '5',
			                               "footer_separator_color" => '',
			                               "footer_top_title_color" => '',
			                               "footer_top_text_color" => '',
			                               "footer_link_color" => '',
			                               "footer_link_hover_color" => '',
			                               "footer_top_background_color" => '',
			                               "footer_bottom_text_color" => '',
			                               "footer_bottom_background_color" => '',
			                               "enable_side_area" => 'yes',
			                               "side_area_title" => '',
			                               "side_area_background_color" => '',
			                               "side_area_text_color" => '',
			                               "side_area_title_color" => '',
			                               "separator_thickness" => '',
			                               "separator_topmargin" => '',
			                               "separator_bottommargin" => '',
			                               "button_title_color" => '',
			                               "button_title_hovercolor" => '',
			                               "button_title_google_fonts" => '-1',
			                               "button_title_fontsize" => '',
			                               "button_title_lineheight" => '',
			                               "button_title_fontstyle" => '',
			                               "button_title_fontweight" => '',
			                               "button_size" => '',
			                               "button_backgroundcolor_hover" => '',
			                               "button_border_color" => '',
			                               "button_bottom_gradient_color" => '',
			                               "button_top_gradient_color" => '',
			                               "message_title_color" => '',
			                               "message_title_google_fonts" => '-1',
			                               "message_title_fontsize" => '',
			                               "message_title_lineheight" => '',
			                               "message_title_fontstyle" => '',
			                               "message_title_fontweight" => '',
			                               "message_backgroundcolor" => '',
			                               "message_bordercolor" => '',
			                               "message_icon_color" => '',
			                               "message_icon_fontsize" => '',
			                               "blockquote_font_color" => '',
			                               "blockquote_border_color" => '',
			                               "blockquote_background_color" => '',
			                               "blockquote_quote_icon_color" => '',
			                               "pricing_table_top_color" => '',
			                               "pricing_table_bottom_color" => '',
			                               "pricing_table_border_color" => '',
			                               "social_icon_color" => '',
			                               "social_icon_top_gradient_background_color" => '',
			                               "social_icon_bottom_gradient_background_color" => '',
			                               "social_icon_border_color" => '',
			                               "smooth_background_color" => '',
			                               "smooth_bar_color" => '',
			                               "portfolio_style" => '1',
			                               "lightbox_single_project" => 'no',
			                               "portfolio_columns_number" => '2',
			                               "portfolio_single_slug" => '',
			                               "blog_quote_link_box_color" => '',
			                               "pagination" => '1',
			                               "blog_style" => '1',
			                               "category_blog_sidebar" => 'default',
			                               "blog_hide_comments" => 'no',
			                               "blog_page_range" => '',
			                               "number_of_chars" => '45',
			                               "number_of_chars_masonry" => '',
			                               "number_of_chars_large_image" => '',
			                               "number_of_chars_small_image" => '',
			                               "blog_single_sidebar" => 'default',
			                               "blog_single_sidebar_custom_display" => '',
			                               "blog_author_info" => 'no',
			                               "receive_mail" => '',
			                               "enable_contact_form" => 'no',
			                               "hide_contact_form_website" => 'no',
			                               "email_from" => '',
			                               "email_subject" => '',
			                               "use_recaptcha" => 'no',
			                               "recaptcha_public_key" => '',
			                               "recaptcha_private_key" => '',
			                               "contact_heading_above" => '',
			                               "enable_google_map" => 'no',
			                               "google_maps_pin_image" => QODE_ROOT."/img/pin.png",
			                               "google_maps_address" => '',
			                               "google_maps_address2" => '',
			                               "google_maps_address3" => '',
			                               "google_maps_address4" => '',
			                               "google_maps_address5" => '',
			                               "google_maps_zoom" => '12',
			                               "google_maps_height" => '750',
			                               "google_maps_style" => 'yes',
			                               "google_maps_color" => '',
			                               "google_maps_scroll_wheel" => 'no',
			                               "google_maps_iframe" => '',
			                               "404_title" => '',
			                               "404_subtitle" => '',
			                               "404_text" => '',
			                               "404_backlabel" => '',
			                               "enable_social_share" => 'no',
			                               "enable_facebook_share" => 'no',
			                               "enable_twitter_share" => 'no',
			                               "enable_google_plus" => 'no',
			                               "enable_linkedin" => 'no',
			                               "enable_tumblr" => 'no',
			                               "enable_pinterest" => 'no',
			                               "enable_vk" => 'no',
			                               "facebook_icon" => '',
			                               "twitter_icon" => '',
			                               "google_plus_icon" => '',
			                               "linkedin_icon" => '',
			                               "tumblr_icon" => '',
			                               "pinterest_icon" => '',
			                               "vk_icon" => '',
			                               "twitter_via" => ''
			);
		}
	}
	
	add_action( 'after_setup_theme', 'strata_qode_init_global_option' );
}

if ( ! function_exists( 'strata_qode_is_core_installed' ) ) {
	/**
	 * Function that checks if Core plugin is installed
	 * @return bool
	 */
	function strata_qode_is_core_installed() {
		return class_exists( 'StrataCore' );
	}
}

if ( ! function_exists( 'strata_qode_visual_composer_installed' ) ) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function strata_qode_visual_composer_installed() {
		return class_exists( 'WPBakeryVisualComposerAbstract' );
	}
}

if ( ! function_exists( 'strata_qode_get_vc_version' ) ) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function strata_qode_get_vc_version() {
		if ( strata_qode_visual_composer_installed() ) {
			return WPB_VC_VERSION;
		}
		
		return false;
	}
}

if ( ! function_exists( 'strata_qode_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function strata_qode_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'strata_qode_is_woocommerce_shop' ) ) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function strata_qode_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && ( is_shop() || is_product() );
	}
}

if ( ! function_exists( 'strata_qode_is_product_category' ) ) {
	function strata_qode_is_product_category() {
		return function_exists( 'is_product_category' ) && is_product_category();
	}
}

if ( ! function_exists( 'strata_qode_get_woo_shop_page_id' ) ) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function strata_qode_get_woo_shop_page_id() {
		if ( strata_qode_is_woocommerce_installed() ) {
			return get_option( 'woocommerce_shop_page_id' );
		}
		
		return 0;
	}
}

if ( ! function_exists( 'strata_qode_is_user_made_sidebar' ) ) {
	function strata_qode_is_user_made_sidebar( $name ) {
		
		//this have to be changed depending on theme
		if ( $name == esc_html__( 'Sidebar', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Sidebar Page', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'WooCommerce Dropdown Widget Area', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Sticky Right', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Top Left', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Header Top Right', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Side Area', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 1', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 2', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 3', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Column 4', 'strata' ) ) {
			return false;
		} else if ( $name == esc_html__( 'Footer Text', 'strata' ) ) {
			return false;
		} else {
			return true;
		}
	}
}

if ( ! function_exists( 'strata_qode_get_blog_query_posts' ) ) {
	function strata_qode_get_blog_query_posts() {
		$qode_page_id             = strata_qode_get_page_id();
		$category                 = get_post_meta( $qode_page_id, "qode_choose-blog-category", true );
		$number_of_posts_per_page = get_post_meta( $qode_page_id, "qode_show-posts-per-page", true );
		$post_number              = ! empty( $number_of_posts_per_page ) ? esc_attr( $number_of_posts_per_page ) : esc_attr( get_option( 'posts_per_page' ) );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'paged'          => $paged,
			'cat'            => $category,
			'posts_per_page' => $post_number
		);
		
		$blog_query = new WP_Query( $query_array );
		if ( is_archive() ) {
			global $wp_query;
			$blog_query = $wp_query;
		}
		
		return $blog_query;
	}
}

if ( ! function_exists( 'strata_qode_wp_link_pages' ) ) {
	function strata_qode_wp_link_pages() {
		$args_pages = array(
			'before'   => '<p class="single_links_pages">',
			'after'    => '</p>',
			'pagelink' => '<span>%</span>'
		);
		
		wp_link_pages( $args_pages );
	}
}

if ( ! function_exists( 'strata_qode_wp_link_pages_exist' ) ) {
	function strata_qode_wp_link_pages_exist() {
		$args_pages = array(
			'echo' => 0
		);
		
		return wp_link_pages( $args_pages );
	}
}

if ( ! function_exists( 'strata_qode_post_has_read_more' ) ) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function strata_qode_post_has_read_more() {
		global $post;
		
		return strpos( $post->post_content, '<!--more-->' );
	}
}

if ( ! function_exists( 'strata_qode_get_blog_pagination' ) ) {
	function strata_qode_get_blog_pagination( $qode_blog_query ) {
		$global_options = strata_qode_return_global_options();
		
		if ( isset( $global_options['pagination'] ) && $global_options['pagination'] != "0" ) {
			
			if ( isset( $global_options['blog_page_range'] ) && $global_options['blog_page_range'] != "" ) {
				$blog_page_range = $global_options['blog_page_range'];
			} else {
				$blog_page_range = $qode_blog_query->max_num_pages;
			}
			
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}
			
			strata_qode_get_blog_pagination_html( $qode_blog_query->max_num_pages, $blog_page_range, $paged );
		}
	}
}

if ( ! function_exists( 'strata_qode_get_blog_pagination_html' ) ) {
	function strata_qode_get_blog_pagination_html( $pages = '', $range = 4, $paged = 1 ) {
		$showitems = $range + 1;
		
		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}
		
		if ( 1 != $pages ) {
			echo "<div class='pagination'><ul>";
			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo "<li class='first'><a href='" . get_pagenum_link( 1 ) . "'><i class='fa fa-angle-double-left'></i></a></li>";
			}
			echo "<li class='prev";
			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo " prev_first";
			}
			echo "'><a href='" . get_pagenum_link( $paged - 1 ) . "'><i class='fa fa-angle-left'></i></a></li>";
			
			for ( $i = 1; $i <= $pages; $i ++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					echo esc_attr( $paged == $i ) ? "<li class='active'><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link( $i ) . "' class='inactive'>" . $i . "</a></li>";
				}
			}
			
			echo "<li class='next";
			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo " next_last";
			}
			echo "'><a href=\"";
			if ( $pages > $paged ) {
				echo get_pagenum_link( $paged + 1 );
			} else {
				echo get_pagenum_link( $paged );
			}
			echo "\"><i class='fa fa-angle-right'></i></a></li>";
			
			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo "<li class='last'><a href='" . get_pagenum_link( $pages ) . "'><i class='fa fa-angle-double-right'></i></a></li>";
			}
			echo "</ul></div>\n";
		}
	}
}

if ( ! function_exists( 'strata_qode_custom_breadcrumbs' ) ) {
	function strata_qode_custom_breadcrumbs() {
		global $post;
		$homeLink  = esc_url( home_url( '/' )  );
		
		$pageid      = strata_qode_get_page_id();
		$bread_style = "";
		if ( get_post_meta( $pageid, "qode_page_breadcrumbs_color", true ) != "" ) {
			$bread_style = " style='color:" . get_post_meta( $pageid, "qode_page_breadcrumbs_color", true ) . "';";
		}
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter   = '<span class="delimiter"' . $bread_style . '> / </span>'; // delimiter between crumbs
		$home        = esc_html__( 'Home', 'strata' ); // text for the 'Home' link
		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before      = '<span class="current"' . $bread_style . '>'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		$html        = '';
		
		if ( is_home() && ! is_front_page() ) {
			
			$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a>' . $delimiter . ' <<a' . $bread_style . ' href="' . $homeLink . '">' . get_the_title( $pageid ) . '</a></div></div>';
			
		} elseif ( is_home() ) {
			
			if ( $showOnHome == 1 ) {
				$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div></div>';
			}
		} elseif ( is_front_page() ) {
			
			if ( $showOnHome == 1 ) {
				$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div></div>';
			}
		} else {
			
			$html .= '<div class="breadcrumbs"><div class="breadcrumbs_inner"><a' . $bread_style . ' href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a>' . $delimiter;
			
			if ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $thisCat->parent != 0 ) {
					$html .= get_category_parents( $thisCat->parent, true, ' ' . $delimiter );
				}
				$html .= $before . single_cat_title( '', false ) . $after;
				
			} elseif ( is_search() ) {
				$html .= $before . esc_html__( 'Search results for "', 'strata' ) . get_search_query() . '"' . $after;
				
			} elseif ( is_day() ) {
				$html .= '<a' . $bread_style . ' href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
				$html .= '<a' . $bread_style . ' href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $delimiter;
				$html .= $before . get_the_time( 'd' ) . $after;
				
			} elseif ( is_month() ) {
				$html .= '<a' . $bread_style . ' href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
				$html .= $before . get_the_time( 'F' ) . $after;
				
			} elseif ( is_year() ) {
				$html .= $before . get_the_time( 'Y' ) . $after;
				
			} elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					
					if ( $showCurrent == 1 ) {
						$html .= $before . get_the_title() . $after;
					}
				} else {
					$cat  = get_the_category();
					$cat  = $cat[0];
					$cats = get_category_parents( $cat, true, ' ' . $delimiter );
					if ( $showCurrent == 0 ) {
						$cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
					}
					$html .= $cats;
					if ( $showCurrent == 1 ) {
						$html .= $before . get_the_title() . $after;
					}
				}
				
			} elseif ( is_attachment() && ! $post->post_parent ) {
				if ( $showCurrent == 1 ) {
					$html .= $before . get_the_title() . $after;
				}
				
			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID );
				if ( $cat ) {
					$cat = $cat[0];
					$html .= get_category_parents( $cat, true, ' ' . $delimiter );
				}
				$html .= '<a' . $bread_style . ' href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>';
				if ( $showCurrent == 1 ) {
					$html .= $delimiter . $before . get_the_title() . $after;
				}
				
			} elseif ( is_page() && ! $post->post_parent ) {
				if ( $showCurrent == 1 ) {
					$html .= $before . get_the_title() . $after;
				}
				
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id   = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page          = get_post( $parent_id );
					$breadcrumbs[] = '<a' . $bread_style . ' href="' . get_permalink( $page->ID ) . '">' . wp_kses_post( get_the_title( $page->ID ) ) . '</a>';
					$parent_id     = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i ++ ) {
					$html .= $breadcrumbs[ $i ];
					if ( $i != count( $breadcrumbs ) - 1 ) {
						$html .= ' ' . $delimiter;
					}
				}
				if ( $showCurrent == 1 ) {
					$html .= $delimiter . $before . get_the_title() . $after;
				}
				
			} elseif ( is_tag() ) {
				$html .= $before . esc_html__( 'Posts tagged "', 'strata' ) . single_tag_title( '', false ) . '"' . $after;
				
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				$html .= $before . esc_html__( 'Articles posted by ', 'strata' ) . wp_kses_post( $userdata->display_name ) . $after;
				
			} elseif ( is_404() ) {
				$html .= $before . esc_html__( 'Error 404', 'strata' ) . $after;
			} elseif ( strata_qode_is_woocommerce_installed() ) {
				$html .= $before . get_the_title( strata_qode_get_woo_shop_page_id() ) . $after;
			}
			
			if ( get_query_var('paged') ) {
				$html .= $before . " (" . esc_html__('Page', 'strata') . ' ' . get_query_var('paged') . ")" . $after;
			}
			
			$html .= '</div></div>';
		}
		
		echo strata_qode_get_module_part( $html );
	}
}

if ( ! function_exists( 'strata_qode_is_like_enabled' ) ) {
	function strata_qode_is_like_enabled( $is_portfolio = false ) {
		$global_options = strata_qode_return_global_options();
		
		$is_enabled = "on";
		
		if ( isset( $global_options['qode_like'] ) && ! $is_portfolio ) {
			$is_enabled = $global_options['qode_like'];
		}
		
		if ( isset( $global_options['portfolio_qode_like'] ) && $is_portfolio ) {
			$is_enabled = $global_options['portfolio_qode_like'];
		}
		
		if ( ! strata_qode_is_core_installed() ) {
			$is_enabled = 'off';
		}
		
		return $is_enabled === 'on';
	}
}

if ( ! function_exists( 'strata_qode_is_author_info_enabled' ) ) {
	function strata_qode_is_author_info_enabled() {
		$strata_options = strata_qode_return_global_options();
		
		$is_enabled = "no";
		
		if ( isset( $strata_options['blog_author_info'] ) ) {
			$is_enabled = $strata_options['blog_author_info'];
		}
		
		return $is_enabled === 'yes';
	}
}

if ( ! function_exists( 'strata_qode_is_comments_enabled' ) ) {
	function strata_qode_is_comments_enabled() {
		$global_options = strata_qode_return_global_options();
		
		$is_disabled = "";
		
		if ( isset( $global_options['blog_hide_comments'] ) ) {
			$is_disabled = $global_options['blog_hide_comments'];
		}
		
		if ( ! comments_open() ) {
			$is_disabled = 'yes';
		}
		
		return $is_disabled !== 'yes';
	}
}

if ( ! function_exists( 'strata_qode_get_comments_template' ) ) {
	function strata_qode_get_comments_template( $is_full_width = false ) {
		$qode_page_id = strata_qode_get_page_id();
		
		$enable_page_comments = false;
		if ( get_post_meta( $qode_page_id, "qode_enable-page-comments", true ) ) {
			$enable_page_comments = true;
		}
		
		if ( $enable_page_comments ) { ?>
			<?php if( $is_full_width ) { ?>
				<div class="container">
				<div class="container_inner">
			<?php } ?>
			<?php comments_template( '', true ); ?>
			<?php if( $is_full_width ) { ?>
				</div>
				</div>
			<?php } ?>
		<?php }
	}
}

if ( ! function_exists( 'strata_qode_get_content_classes' ) ) {
	function strata_qode_get_content_classes() {
		$page_id = strata_qode_get_page_id();
		$classes = array();
		
		if ( get_post_meta( $page_id, "qode_revolution-slider", true ) == "" && get_post_meta( $page_id, "qode_show-page-title", true ) ) {
			$classes[] = "content_top_margin";
		}
		
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'strata_qode_inline_page_background_style' ) ) {
	function strata_qode_inline_page_background_style( $page_id ) {
		
		if ( empty( $page_id ) ) {
			return;
		}
		
		$background_color = get_post_meta( $page_id, "qode_page_background_color", true );
		$style            = array();
		
		if ( ! empty( $background_color ) ) {
			$style[] = 'background-color:' . esc_attr( $background_color );
		}
		
		if ( ! empty( $style ) ) {
			echo strata_qode_get_inline_style( $style );
		}
	}
}

if ( ! function_exists( 'strata_qode_inline_style' ) ) {
	/**
	 * Function that echoes generated style attribute
	 *
	 * @param $value string | array attribute value
	 *
	 * @see strata_qode_get_inline_style()
	 */
	function strata_qode_inline_style( $value ) {
		echo strata_qode_get_inline_style( $value );
	}
}

if ( ! function_exists( 'strata_qode_get_inline_style' ) ) {
	/**
	 * Function that generates style attribute and returns generated string
	 *
	 * @param $value string | array value of style attribute
	 *
	 * @return string generated style attribute
	 *
	 * @see strata_qode_get_inline_style()
	 */
	function strata_qode_get_inline_style( $value ) {
		return strata_qode_get_inline_attr( $value, 'style', ';' );
	}
}

if ( ! function_exists( 'strata_qode_class_attribute' ) ) {
	/**
	 * Function that echoes class attribute
	 *
	 * @param $value string value of class attribute
	 *
	 * @see strata_qode_get_class_attribute()
	 */
	function strata_qode_class_attribute( $value ) {
		echo strata_qode_get_class_attribute( $value );
	}
}

if ( ! function_exists( 'strata_qode_get_class_attribute' ) ) {
	/**
	 * Function that returns generated class attribute
	 *
	 * @param $value string value of class attribute
	 *
	 * @return string generated class attribute
	 *
	 * @see strata_qode_get_inline_attr()
	 */
	function strata_qode_get_class_attribute( $value ) {
		return strata_qode_get_inline_attr( $value, 'class', ' ' );
	}
}

if ( ! function_exists( 'strata_qode_get_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 * @param $allow_zero_values boolean allow data to have zero value
	 *
	 * @return string generated html attribute
	 */
	function strata_qode_get_inline_attr( $value, $attr, $glue = '', $allow_zero_values = false ) {
		if ( $allow_zero_values ) {
			if ( $value !== '' ) {
				
				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} elseif ( $value !== '' ) {
					$properties = $value;
				}
				
				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		} else {
			if ( ! empty( $value ) ) {
				
				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} elseif ( $value !== '' ) {
					$properties = $value;
				}
				
				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		}
		
		return '';
	}
}

if ( ! function_exists( 'strata_qode_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 *
	 * @return string generated html attribute
	 */
	function strata_qode_inline_attr( $value, $attr, $glue = '' ) {
		echo strata_qode_get_inline_attr( $value, $attr, $glue );
	}
}

if ( ! function_exists( 'strata_qode_get_inline_attrs' ) ) {
	/**
	 * Generate multiple inline attributes
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	function strata_qode_get_inline_attrs( $attrs, $allow_zero_values = false ) {
		$output = '';
		
		if ( is_array( $attrs ) && count( $attrs ) ) {
			if ( $allow_zero_values ) {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . strata_qode_get_inline_attr( $value, $attr, '', true );
				}
			} else {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . strata_qode_get_inline_attr( $value, $attr );
				}
			}
		}
		
		$output = ltrim( $output );
		
		return $output;
	}
}

if ( ! function_exists( 'strata_qode_get_attachment_meta' ) ) {
	/**
	 * Function that returns attachment meta data from attachment id
	 *
	 * @param $attachment_id
	 * @param array $keys sub array of attachment meta
	 *
	 * @return array|mixed
	 */
	function strata_qode_get_attachment_meta( $attachment_id, $keys = array() ) {
		$meta_data = array();
		
		//is attachment id set?
		if ( ! empty( $attachment_id ) ) {
			//get all post meta for given attachment id
			$meta_data = get_post_meta( $attachment_id, '_wp_attachment_metadata', true );
			
			//is subarray of meta array keys set?
			if ( is_array( $keys ) && count( $keys ) ) {
				$sub_array = array();
				
				//for each defined key
				foreach ( $keys as $key ) {
					//check if that key exists in all meta array
					if ( array_key_exists( $key, $meta_data ) ) {
						//assign key from meta array for current key to meta subarray
						$sub_array[ $key ] = $meta_data[ $key ];
					}
				}
				
				//we want meta array to be subarray because that is what used whants to get
				$meta_data = $sub_array;
			}
		}
		
		//return meta array
		return $meta_data;
	}
}

if ( ! function_exists( 'strata_qode_get_attachment_id_from_url' ) ) {
	/**
	 * Function that retrieves attachment id for passed attachment url
	 *
	 * @param $attachment_url
	 *
	 * @return null|string
	 */
	function strata_qode_get_attachment_id_from_url( $attachment_url ) {
		global $wpdb;
		$attachment_id = '';
		
		//is attachment url set?
		if ( $attachment_url !== '' ) {
			//prepare query
			
			$query = $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid=%s", $attachment_url );
			
			//get attachment id
			$attachment_id = $wpdb->get_var( $query );
		}
		
		//return id
		return $attachment_id;
	}
}

if ( ! function_exists( 'strata_qode_get_attachment_meta_from_url' ) ) {
	/**
	 * Function that returns meta array for give attachment url
	 *
	 * @param $attachment_url
	 * @param array $keys sub array of attachment meta
	 *
	 * @return array|mixed
	 *
	 * @see strata_qode_get_attachment_id_from_url()
	 * @see strata_qode_get_attachment_meta()
	 *
	 * @version 0.1
	 */
	function strata_qode_get_attachment_meta_from_url( $attachment_url, $keys = array() ) {
		$attachment_meta = array();
		
		//get attachment id for attachment url
		$attachment_id = strata_qode_get_attachment_id_from_url( $attachment_url );
		
		//is attachment id set?
		if ( ! empty( $attachment_id ) ) {
			//get post meta
			$attachment_meta                  = strata_qode_get_attachment_meta( $attachment_id, $keys );
			$attachment_meta['attachment_id'] = $attachment_id;
		}
		
		//return post meta
		return $attachment_meta;
	}
}

if ( ! function_exists( 'strata_qode_get_image_dimensions' ) ) {
	/**
	 * Function that returns image sizes array. First looks in post_meta table if attachment exists in the database,
	 * if it does not than it uses getimagesize PHP function to get image sizes
	 *
	 * @param $url string url of the image
	 *
	 * @return array array of image sizes that contains height and width
	 *
	 * @see  strata_qode_get_attachment_meta_from_url()
	 * @uses getimagesize
	 *
	 * @version 0.1
	 */
	function strata_qode_get_image_dimensions( $url ) {
		$image_sizes = array();
		
		//is url passed?
		if ( $url !== '' ) {
			//get image sizes from posts meta if attachment exists
			$image_sizes = strata_qode_get_attachment_meta_from_url( $url, array( 'width', 'height' ) );
			
			//image does not exists in post table, we have to use PHP way of getting image size
			if ( ! count( $image_sizes ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				
				//can we open file by url?
				if ( ini_get( 'allow_url_fopen' ) == 1 && file_exists( $url ) ) {
					list( $width, $height, $type, $attr ) = getimagesize( $url );
				} else {
					//we can't open file directly, have to locate it with relative path.
					$image_obj           = parse_url( $url );
					$image_relative_path = rtrim( get_home_path(), '/' ) . $image_obj['path'];
					
					if ( file_exists( $image_relative_path ) ) {
						list( $width, $height, $type, $attr ) = getimagesize( $image_relative_path );
					}
				}
				
				//did we get width and height from some of above methods?
				if ( isset( $width ) && isset( $height ) ) {
					//set them to our image sizes array
					$image_sizes = array(
						'width'  => $width,
						'height' => $height
					);
				}
			}
		}
		
		return $image_sizes;
	}
}

if ( ! function_exists( 'strata_qode_return_portfolio_single_media' ) ) {
	function strata_qode_return_portfolio_single_media( $porftolio_template ) {
		$strata_options = strata_qode_return_global_options();
		$qode_page_id   = get_the_ID();
		
		$lightbox_single_project = "no";
		if ( isset( $strata_options['lightbox_single_project'] ) ) {
			$lightbox_single_project = $strata_options['lightbox_single_project'];
		}
		
		$columns_number = "v4";
		if ( get_post_meta( $qode_page_id, "qode_choose-number-of-portfolio-columns", true ) != "" ) {
			if ( get_post_meta( $qode_page_id, "qode_choose-number-of-portfolio-columns", true ) == 2 ) {
				$columns_number = "v2";
			} else if ( get_post_meta( $qode_page_id, "qode_choose-number-of-portfolio-columns", true ) == 3 ) {
				$columns_number = "v3";
			} else if ( get_post_meta( $qode_page_id, "qode_choose-number-of-portfolio-columns", true ) == 4 ) {
				$columns_number = "v4";
			}
		} else {
			if ( isset( $strata_options['portfolio_columns_number'] ) ) {
				if ( $strata_options['portfolio_columns_number'] == 2 ) {
					$columns_number = "v2";
				} else if ( $strata_options['portfolio_columns_number'] == 3 ) {
					$columns_number = "v3";
				} else if ( $strata_options['portfolio_columns_number'] == 4 ) {
					$columns_number = "v4";
				}
			}
		}
		
		$portfolio_images = get_post_meta( $qode_page_id, "qode_portfolio_images", true );
		if ( $portfolio_images ) {
			usort( $portfolio_images, "strata_qode_compare_portfolio_images" );
			
			foreach ( $portfolio_images as $portfolio_image ) {
				if ( $portfolio_image['portfolioimg'] != "" ) {
					global $wpdb;
					$image_src = $portfolio_image['portfolioimg'];
					$query     = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
					$id        = $wpdb->get_var( $query );
					$title     = get_the_title( $id );
					$alt       = get_post_meta( $id, '_wp_attachment_image_alt', true );
					
					if ( $porftolio_template === 2 || $porftolio_template === 3 ) { ?>
						<li class="slide">
							<img src="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>"/>
						</li>
					<?php } else if ( $porftolio_template === 6 ) {
						if ( $lightbox_single_project == "yes" ) { ?>
							<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" title="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>" href="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" data-rel="prettyPhoto[single_pretty_photo]">
								<span class="gallery_text_holder"><span class="gallery_text_inner"><h4><?php echo wp_kses_post( $portfolio_image['portfoliotitle'] ); ?></h4></span></span>
								<img src="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>"/>
							</a>
						<?php } else { ?>
							<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" href="#">
								<span class="gallery_text_holder"><span class="gallery_text_inner"><h4><?php echo wp_kses_post( $portfolio_image['portfoliotitle'] ); ?></h4></span></span>
								<img src="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>"/>
							</a>
						<?php }
					} else {
						if ( $lightbox_single_project == "yes" ) { ?>
							<a class="lightbox_single_portfolio" title="<?php echo esc_attr( $title ); ?>" href="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" data-rel="prettyPhoto[single_pretty_photo]">
								<img src="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>"/>
							</a>
						<?php } else { ?>
							<img src="<?php echo esc_url( $portfolio_image['portfolioimg'] ); ?>" alt="<?php echo esc_attr( $alt ); ?>"/>
						<?php }
					}
				} else {
					$portfoliovideotype = "";
					if ( isset( $portfolio_image['portfoliovideotype'] ) ) {
						$portfoliovideotype = $portfolio_image['portfoliovideotype'];
					}
					
					$video_wrapper_begin = '';
					$video_wrapper_end   = '';
					
					if ( $porftolio_template === 2 || $porftolio_template === 3 ) {
						$video_wrapper_begin = '<li class="slide">';
						$video_wrapper_end   = '</li>';
					}
					
					if ( $porftolio_template === 6 ) {
						switch ( $portfoliovideotype ) {
							case "youtube":
								if ( $lightbox_single_project == "yes" ) { ?>
									<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" title="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>" href="https://www.youtube.com/watch?feature=player_embedded&v=<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>" rel="prettyPhoto[single_pretty_photo]">
										<span class="gallery_text_holder"><span class="gallery_text_inner"><h4><?php echo wp_kses_post( $portfolio_image['portfoliotitle'] ); ?></h4></span></span>
										<img width="100%" src="https://img.youtube.com/vi/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>/maxresdefault.jpg"/>
									</a>
								<?php } else { ?>
									<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" href="#">
										<iframe width="100%" src="https://www.youtube.com/embed/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
									</a>
								<?php }
								break;
							case "vimeo":
								if ( $lightbox_single_project == "yes" ) {
									$videoid = $portfolio_image['portfoliovideoid'];
									$xml     = simplexml_load_file( "https://vimeo.com/api/v2/video/" . $videoid . ".xml" );
									$xml     = $xml->video;
									$xml_pic = $xml->thumbnail_large; ?>
									<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" title="<?php echo esc_attr( $portfolio_image['portfoliotitle'] ); ?>" href="https://vimeo.com/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>" rel="prettyPhoto[single_pretty_photo]">
										<span class="gallery_text_holder"><span class="gallery_text_inner"><h4><?php echo wp_kses_post( $portfolio_image['portfoliotitle'] ); ?></h4></span></span>
										<img width="100%" src="<?php echo esc_url( $xml_pic ); ?>"/>
									</a>
								<?php } else { ?>
									<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" href="#">
										<iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									</a>
								<?php }
								break;
							case "self": ?>
								<a class="lightbox_single_portfolio <?php echo esc_attr( $columns_number ); ?>" onclick='return false;' href="#">
									<div class="video">
										<div class="mobile-video-image" style="background-image: url(<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>);"></div>
										<div class="video-wrap">
											<video class="video" poster="<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>" preload="auto">
												<?php if ( ! empty( $portfolio_image['portfoliovideowebm'] ) ) { ?>
													<source type="video/webm" src="<?php echo esc_url( $portfolio_image['portfoliovideowebm'] ); ?>">
												<?php } ?>
												<?php if ( ! empty( $portfolio_image['portfoliovideomp4'] ) ) { ?>
													<source type="video/mp4" src="<?php echo esc_url( $portfolio_image['portfoliovideomp4'] ); ?>">
												<?php } ?>
												<?php if ( ! empty( $portfolio_image['portfoliovideoogv'] ) ) { ?>
													<source type="video/ogg" src="<?php echo esc_url( $portfolio_image['portfoliovideoogv'] ); ?>">
												<?php } ?>
												<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
													<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"/>
													<param name="flashvars" value="controls=true&file=<?php echo esc_url( $portfolio_image['portfoliovideomp4'] ); ?>"/>
													<img src="<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>" width="1920" height="800" title="<?php esc_attr_e( 'No video playback capabilities', 'strata' ); ?>" alt="<?php esc_attr_e( 'Video thumb', 'strata' ); ?>"/>
												</object>
											</video>
										</div>
									</div>
								</a>
								<?php break;
						}
					} else {
						switch ( $portfoliovideotype ) {
							case "youtube": ?>
								<?php echo strata_qode_get_module_part( $video_wrapper_begin ); ?><iframe width="100%" src="https://www.youtube.com/embed/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe><?php echo strata_qode_get_module_part( $video_wrapper_end ); ?>
								<?php break;
							case "vimeo": ?>
								<?php echo strata_qode_get_module_part( $video_wrapper_begin ); ?><iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $portfolio_image['portfoliovideoid'] ); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><?php echo strata_qode_get_module_part( $video_wrapper_end ); ?>
								<?php break;
							case "self": ?>
								<?php echo strata_qode_get_module_part( $video_wrapper_begin ); ?>
								<div class="video">
									<div class="mobile-video-image" style="background-image: url(<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>);"></div>
									<div class="video-wrap">
										<video class="video" poster="<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>" preload="auto">
											<?php if ( ! empty( $portfolio_image['portfoliovideowebm'] ) ) { ?>
												<source type="video/webm" src="<?php echo esc_url( $portfolio_image['portfoliovideowebm'] ); ?>">
											<?php } ?>
											<?php if ( ! empty( $portfolio_image['portfoliovideomp4'] ) ) { ?>
												<source type="video/mp4" src="<?php echo esc_url( $portfolio_image['portfoliovideomp4'] ); ?>">
											<?php } ?>
											<?php if ( ! empty( $portfolio_image['portfoliovideoogv'] ) ) { ?>
												<source type="video/ogg" src="<?php echo esc_url( $portfolio_image['portfoliovideoogv'] ); ?>">
											<?php } ?>
											<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
												<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"/>
												<param name="flashvars" value="controls=true&file=<?php echo esc_url( $portfolio_image['portfoliovideomp4'] ); ?>"/>
												<img src="<?php echo esc_url( $portfolio_image['portfoliovideoimage'] ); ?>" width="1920" height="800" title="<?php esc_attr_e( 'No video playback capabilities', 'strata' ); ?>" alt="<?php esc_attr_e( 'Video thumb', 'strata' ); ?>"/>
											</object>
										</video>
									</div>
								</div>
								<?php echo strata_qode_get_module_part( $video_wrapper_end ); ?>
								<?php break;
						}
					}
				}
			}
		}
	}
}