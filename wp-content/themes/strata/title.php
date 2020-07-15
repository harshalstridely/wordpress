<?php
$strata_options = strata_qode_return_global_options();
$qode_page_id = strata_qode_get_page_id();

if ( get_post_meta( $qode_page_id, "qode_responsive-title-image", true ) != "" ) {
	$responsive_title_image = get_post_meta( $qode_page_id, "qode_responsive-title-image", true );
} else {
	$responsive_title_image = $strata_options['responsive_title_image'];
}

if ( get_post_meta( $qode_page_id, "qode_fixed-title-image", true ) != "" ) {
	$fixed_title_image = get_post_meta( $qode_page_id, "qode_fixed-title-image", true );
} else {
	$fixed_title_image = $strata_options['fixed_title_image'];
}

if ( get_post_meta( $qode_page_id, "qode_title-image", true ) != "" ) {
	$title_image = get_post_meta( $qode_page_id, "qode_title-image", true );
} else {
	$title_image = $strata_options['title_image'];
}

$title_overlay_image = '';
if ( get_post_meta( $qode_page_id, "qode_title-overlay-image", true ) != "" ) {
	$title_overlay_image = get_post_meta( $qode_page_id, "qode_title-overlay-image", true );
} else {
	$title_overlay_image = $strata_options['title_overlay_image'];
}

$title_image_width = '';
if ( ! empty( $title_image ) ) {
	$image_dimension = strata_qode_get_image_dimensions( $title_image );
	
	if ( ! empty( $image_dimension ) ) {
		$title_image_width = $image_dimension['width'];
	}
}

$header_height_padding = 0;
if ( ! empty( $strata_options['header_height'] ) ) {
	$header_height = $strata_options['header_height'];
} else {
	$header_height = 86;
}

if ( isset( $strata_options['header_bottom_appearance'] ) && ( $strata_options['header_bottom_appearance'] == 'stick menu_bottom' ) ) {
	$menu_bottom = 46;
	
	if ( is_active_sidebar( 'header_fixed_right' ) ) {
		$menu_bottom = $menu_bottom + 22;
	}
} else {
	$menu_bottom = 0;
}

$header_top = 0;
if ( isset( $strata_options['header_top_area'] ) && $strata_options['header_top_area'] == "yes" ) {
	$header_top = 34;
}
$header_height_padding = $header_height + $menu_bottom + $header_top;
if ( isset( $strata_options['center_logo_image'] ) && $strata_options['center_logo_image'] == "yes" ) {
	if ( isset( $strata_options['logo_image'] ) ) {
		$logo_width  = 0;
		$logo_height = 0;
		
		if ( ! empty( $strata_options['logo_image'] ) ) {
			$image_dimension = strata_qode_get_image_dimensions( $strata_options['logo_image'] );
			
			if ( ! empty( $image_dimension ) ) {
				$logo_height  = intval( $image_dimension['height'] );
				$logo_width = intval( $image_dimension['width'] );
			}
		}
	}
	if ( $strata_options['header_bottom_appearance'] == 'stick menu_bottom' ) {
		$header_height_padding = $logo_height + 30 + $menu_bottom + $header_top; // 30 is top and bottom margin of centered logo
	} else {
		$header_height_padding = $logo_height + 30 + $header_height + $header_top; // 30 is top and bottom margin of centered logo
	}
}

$title_height = 85;
if ( get_post_meta( $qode_page_id, "qode_title-height", true ) != "" ) {
	$title_height = get_post_meta( $qode_page_id, "qode_title-height", true );
} else if ( $strata_options['title_height'] != '' ) {
	$title_height = $strata_options['title_height'];
} else {
	if ( isset( $strata_options['center_logo_image'] ) && $strata_options['center_logo_image'] == "yes" ) {
		if ( $strata_options['header_bottom_appearance'] == 'stick menu_bottom' ) {
			$title_height = $title_height + $logo_height + 30 + $menu_bottom + $header_top; // 30 is top and bottom margin of centered logo
		} else {
			$title_height = $header_height + $title_height + $logo_height + 30 + $header_top; // 30 is top and bottom margin of centered logo
		}
		
	} else {
		$title_height = $title_height + $header_height + $menu_bottom + $header_top;
		
	}
}

$title_background_color = '';
if ( get_post_meta( $qode_page_id, "qode_page-title-background-color", true ) != "" ) {
	$title_background_color = get_post_meta( $qode_page_id, "qode_page-title-background-color", true );
} else {
	$title_background_color = $strata_options['title_background_color'];
}

$show_title_image = true;
if ( get_post_meta( $qode_page_id, "qode_show-page-title-image", true ) ) {
	$show_title_image = false;
}

$enable_breadcrumbs = 'yes';
if ( get_post_meta( $qode_page_id, "qode_enable_breadcrumbs", true ) != "" ) {
	$enable_breadcrumbs = get_post_meta( $qode_page_id, "qode_enable_breadcrumbs", true );
} elseif ( isset( $strata_options['enable_breadcrumbs'] ) ) {
	$enable_breadcrumbs = $strata_options['enable_breadcrumbs'];
}

$title_outer_classes = array();

$animate_title_area = '';
if ( get_post_meta( $qode_page_id, "qode_animate-page-title", true ) != "" ) {
	$animate_title_area = get_post_meta( $qode_page_id, "qode_animate-page-title", true );
} elseif ( isset( $strata_options['animate_title_area'] ) ) {
	$animate_title_area = $strata_options['animate_title_area'];
}

if ( $animate_title_area == "text_right_left" ) {
	$title_outer_classes[] = "animate_title_text";
} elseif ( $animate_title_area == "area_top_bottom" ) {
	$title_outer_classes[] = "animate_title_area";
} else {
	$title_outer_classes[] = "title_without_animation";
}

if ( get_post_meta( $qode_page_id, "qode_title_text_shadow", true ) == "yes" ) {
	$title_outer_classes[] = 'title_text_shadow';
} elseif ( isset( $strata_options['title_text_shadow'] ) && ( $strata_options['title_text_shadow'] == "yes" ) ) {
	$title_outer_classes[] = 'title_text_shadow';
}

if ( $responsive_title_image == 'yes' && $show_title_image == true ) {
	$title_outer_classes[] = 'with_image';
}

$title_classes = array();
if ( get_post_meta( $qode_page_id, "qode_page_title_font_size", true ) != "" ) {
	$title_classes[] = "title_size_" . get_post_meta( $qode_page_id, "qode_page_title_font_size", true );
} elseif ( isset( $strata_options['predefined_title_sizes'] ) ) {
	$title_classes[] = "title_size_" . $strata_options['predefined_title_sizes'];
}

$page_title_position = 'left';
if ( get_post_meta( $qode_page_id, "qode_page_title_position", true ) != "" ) {
	$page_title_position = get_post_meta( $qode_page_id, "qode_page_title_position", true );
} else {
	$page_title_position = $strata_options['page_title_position'];
}

if ( $page_title_position == "center" ) {
	$title_classes[] = "position_center ";
} else {
	$title_classes[] = "position_left ";
}

if ( $responsive_title_image == 'no' && $title_image != "" && ( $fixed_title_image == "yes" || $fixed_title_image == "yes_zoom" ) && $show_title_image == true ) {
	$title_classes[] = 'has_fixed_background';
	
	if ( $fixed_title_image == "yes_zoom" ) {
		$title_classes[] = 'zoom_out';
	}
}

if ( $responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true ) {
	$title_classes[] = 'has_background';
}

$title_img_classes = array();
if ( $responsive_title_image == 'yes' && $title_image != "" && $show_title_image == true ) {
	$title_img_classes[] = "responive";
} else {
	$title_img_classes[] = "not_responsive";
}

$title             = get_the_title( $qode_page_id );
$enable_page_title = get_post_meta( $qode_page_id, "qode_page-title-text", true );
if ( is_home() && is_front_page() ) {
	$title = get_option( 'blogname' );
} elseif ( is_tag() ) {
	$title = single_term_title( '', false ) . esc_html__( ' Tag', 'strata' );
} elseif ( is_date() ) {
	$title = get_the_time( 'F Y' );
} elseif ( is_author() ) {
	$title = esc_html__( 'Author: ', 'strata' ) . get_the_author();
} elseif ( is_category() ) {
	$title = single_cat_title( '', false );
} elseif ( is_archive() ) {
	$title = esc_html__( 'Archive', 'strata' );
} elseif ( is_search() ) {
	$title = esc_html__( 'Search: ', 'strata' ) . get_search_query();
} elseif ( is_404() ) {
	$title = $strata_options['404_title'] !== '' ? $strata_options['404_title'] : esc_html__( '404', 'strata' );
	
	if ( $strata_options['404_subtitle'] != "" ) {
		$title .= $strata_options['404_subtitle'];
	} else {
		$title .= " - " . esc_html__( 'Page not found', 'strata' );
	}
} elseif ( is_singular( 'post' ) && empty( $enable_page_title ) ) {
	$title              = esc_html__( 'Blog', 'strata' );
	$custom_title_label = get_post_meta( $qode_page_id, "qode_page_title_text_single_post", true );
	
	if ( ! empty( $custom_title_label ) ) {
		$title = esc_html( $custom_title_label );
	}
}

if ( strata_qode_is_woocommerce_shop() || is_singular( 'product' ) ) {
	$shop_id = strata_qode_get_woo_shop_page_id();
	$title   = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'strata' );
} elseif ( ( function_exists( 'is_product_category' ) && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) ) {
	$tax = get_queried_object();
	
	if ( ! empty( $tax ) ) {
		$title = $tax->name ;
	}
}

$title_outer_styles = array();
if ( $title_height != ''&& $animate_title_area == 'area_top_bottom' ) {
	$title_outer_styles[] = 'opacity: 0;';
	$title_outer_styles[] = 'height:' . intval( $header_height_padding ) . 'px;';
}

$title_styles = array();
if ( $responsive_title_image == 'no' && $title_image != "" && $show_title_image == true ) {
	if ( $title_image_width != '' ) {
		$title_styles[] = 'background-size:' . intval( $title_image_width ) . 'px auto;';
	}
	
	$title_styles[] = 'background-image:url(' . esc_url( $title_image ) . ');';
}

if ( $title_height != '' ) {
	$title_styles[] = 'height:' . intval( $title_height ) . 'px;';
}

if ( $title_background_color != '' ) {
	$title_styles[] = 'background-color:' . $title_background_color . ';';
}

$title_overlay_styles = array();
if ( ! empty( $title_overlay_image ) ) {
	$title_overlay_styles[] = 'background-image:url(' . esc_url( $title_overlay_image ) . ');';
}

$title_holder_styles = array();
if ( $responsive_title_image != 'yes' && get_post_meta( $qode_page_id, "qode_show-page-title-image", true ) == "" ) {
	if ( get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true ) == "" ) {
		if ( $strata_options['header_background_transparency_initial'] == "" || $strata_options['header_background_transparency_initial'] == "1" ) {
			$title_holder_styles[] = 'padding-top:' . intval( $header_height_padding ) . 'px;height:' . intval( $title_height - $header_height_padding ) . 'px;';
		} else {
			$title_holder_styles[] = 'padding-top:0px;height:' . intval( $title_height ) . 'px;';
		}
	} elseif ( get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true ) == "1" ) {
		$title_holder_styles[] = 'padding-top:' . intval( $header_height_padding ) . 'px;height:' . intval( $title_height - $header_height_padding ) . 'px;';
	} else {
		$title_holder_styles[] = 'padding-top:0px;height:' . intval( $title_height ) . 'px;';
	}
}

$title_subtitle_padding_styles = array();
if ( $responsive_title_image == 'yes' && $show_title_image == true ) {
	if ( get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true ) == "" ) {
		if ( $strata_options['header_background_transparency_initial'] == "" || $strata_options['header_background_transparency_initial'] == "1" ) {
			$title_subtitle_padding_styles[] = 'padding-top:' . intval( $header_height_padding ) . 'px;';
		} else {
			$title_subtitle_padding_styles[] = 'padding-top:0px;';
		}
	} elseif ( get_post_meta( $qode_page_id, "qode_header_color_transparency_per_page", true ) == "1" ) {
		$title_subtitle_padding_styles[] = 'padding-top:' . intval( $header_height_padding ) . 'px;';
	} else {
		$title_subtitle_padding_styles[] = 'padding-top:0px;';
	}
}

$title_label_styles = array();
if ( get_post_meta( $qode_page_id, "qode_page-title-color", true ) != "" ) {
	$title_label_styles[] = 'color: ' . get_post_meta( $qode_page_id, "qode_page-title-color", true );
}

$subtitle_styles = array();
if ( get_post_meta( $qode_page_id, "qode_page_subtitle_color", true ) != "" ) {
	$subtitle_styles[] = 'color: ' . get_post_meta( $qode_page_id, "qode_page_subtitle_color", true );
}

if(!get_post_meta($qode_page_id, "qode_show-page-title", true)) { ?>
	<div class="title_outer <?php echo esc_attr( implode( ' ', $title_outer_classes ) ); ?>" <?php strata_qode_inline_style( $title_outer_styles ); ?> <?php echo strata_qode_get_inline_attr( intval( $title_height ), 'data-height', true ); ?>>
		<div class="title <?php echo esc_attr( implode( ' ', $title_classes ) ); ?>" <?php strata_qode_inline_style( $title_styles ); ?>>
			<?php if ( ! empty( $title_image ) ) { ?>
				<div class="image  <?php echo esc_attr( implode( ' ', $title_img_classes ) ); ?>">
					<img src="<?php echo esc_url( $title_image ); ?>" alt="<?php esc_attr_e( 'Title Image', 'strata' ); ?>" />
				</div>
			<?php } ?>
			<?php if ( ! empty( $title_overlay_image ) ) { ?>
				<div class="title_overlay" <?php strata_qode_inline_style( $title_overlay_styles ); ?>></div>
			<?php } ?>
			<?php if(!get_post_meta($qode_page_id, "qode_show-page-title-text", true)) { ?>
				<div class="title_holder" <?php strata_qode_inline_style( $title_holder_styles ); ?>>
					<div class="container">
						<div class="container_inner clearfix">
							<div class="title_subtitle_holder" <?php strata_qode_inline_style( $title_subtitle_padding_styles ); ?>>
								<?php if(($responsive_title_image == 'yes' && $show_title_image == true) || ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") || ($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true)){ ?>
									<div class="title_subtitle_holder_inner">
								<?php } ?>
									<h1 <?php strata_qode_inline_style( $title_label_styles ); ?>><span><?php echo wp_kses_post( $title ); ?></span></h1>
									<?php if(get_post_meta($qode_page_id, "qode_page_subtitle", true) != ""){ ?>
										<span class="subtitle" <?php strata_qode_inline_style( $subtitle_styles ); ?>><?php echo get_post_meta($qode_page_id, "qode_page_subtitle", true); ?></span>
									<?php } ?>
									<?php if ($enable_breadcrumbs == "yes") { ?>
										<div class="breadcrumb"> <?php strata_qode_custom_breadcrumbs(); ?></div>
									<?php } ?>
								<?php if(($responsive_title_image == 'yes' && $show_title_image == true)  || ($fixed_title_image == "yes" || $fixed_title_image == "yes_zoom") || ($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no" && $show_title_image == true)){ ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>