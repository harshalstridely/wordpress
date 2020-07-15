<?php
$strata_options = strata_qode_return_global_options();
$qode_page_id = strata_qode_get_page_id();

$header_in_grid = true;
if ( isset( $strata_options['header_in_grid'] ) && $strata_options['header_in_grid'] == "no" ) {
	$header_in_grid = false;
}

$menu_position = "";
if ( isset( $strata_options['menu_position'] ) ) {
	$menu_position = $strata_options['menu_position'];
}

$centered_logo = false;
if ( isset( $strata_options['center_logo_image'] ) ) {
	if ( $strata_options['center_logo_image'] == "yes" ) {
		$centered_logo = true;
	}
};

$display_header_top = "yes";
if ( isset( $strata_options['header_top_area'] ) ) {
	$display_header_top = $strata_options['header_top_area'];
}
if ( ! empty( $_SESSION['qode_strata_header_top'] ) ) {
	$display_header_top = $_SESSION['qode_strata_header_top'];
}

$header_top_area_scroll = "no";
if ( isset( $strata_options['header_top_area_scroll'] ) ) {
	$header_top_area_scroll = $strata_options['header_top_area_scroll'];
}
if ( ! empty( $_SESSION['qode_header_top'] ) ) {
	if ( $_SESSION['qode_header_top'] == "no" ) {
		$header_top_area_scroll = "no";
	}
	if ( $_SESSION['qode_header_top'] == "yes" ) {
		$header_top_area_scroll = "yes";
	}
}

$header_style = "";
if ( get_post_meta( $qode_page_id, "qode_header-style", true ) != "" ) {
	$header_style = get_post_meta( $qode_page_id, "qode_header-style", true );
} else if ( isset( $strata_options['header_style'] ) ) {
	$header_style = $strata_options['header_style'];
}

$header_color_transparency_per_page = "";
if($strata_options['header_background_transparency_initial'] != "") {
	$header_color_transparency_per_page = $strata_options['header_background_transparency_initial'];
}
if(get_post_meta($qode_page_id, "qode_header_color_transparency_per_page", true) != ""){
	$header_color_transparency_per_page = get_post_meta($qode_page_id, "qode_header_color_transparency_per_page", true);
}

$header_color_per_page = "style='";
if(get_post_meta($qode_page_id, "qode_header_color_per_page", true) != ""){
	if($header_color_transparency_per_page != ""){
		$header_background_color = strata_qode_hex2rgb(get_post_meta($qode_page_id, "qode_header_color_per_page", true));
		$header_color_per_page .= " background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}else{
		$header_color_per_page .= " background-color:" . get_post_meta($qode_page_id, "qode_header_color_per_page", true) . ";";
	}
} else if($header_color_transparency_per_page != "" && get_post_meta($qode_page_id, "qode_header_color_per_page", true) == ""){
	if(isset($strata_options['header_background_color']) && $strata_options['header_background_color'] != ""){
		$header_background_color = strata_qode_hex2rgb($strata_options['header_background_color']);
	}else{
		$header_background_color = strata_qode_hex2rgb("#ffffff");
	}
	$header_color_per_page .= " background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
}

$header_top_color_per_page = "style='";
if(get_post_meta($qode_page_id, "qode_header_color_per_page", true) != ""){
	if($header_color_transparency_per_page != ""){
		$header_background_color = strata_qode_hex2rgb(get_post_meta($qode_page_id, "qode_header_color_per_page", true));
		$header_top_color_per_page .= "background-color:rgba(" . $header_background_color[0] . ", " . $header_background_color[1] . ", " . $header_background_color[2] . ", " . $header_color_transparency_per_page . ");";
	}else{
		$header_top_color_per_page .= "background-color:" . get_post_meta($qode_page_id, "qode_header_color_per_page", true) . ";";
	}
} else if($header_color_transparency_per_page != "" && get_post_meta($qode_page_id, "qode_header_color_per_page", true) == ""){
	if(isset($strata_options['header_top_background_color']) && $strata_options['header_top_background_color'] != ""){
		$header_top_background_color = strata_qode_hex2rgb($strata_options['header_top_background_color']);
	}else{
		$header_top_background_color = strata_qode_hex2rgb("#ffffff");
	}
	$header_top_color_per_page .= "background-color:rgba(" . $header_top_background_color[0] . ", " . $header_top_background_color[1] . ", " . $header_top_background_color[2] . ", " . $header_color_transparency_per_page . ");";
}

$header_separator = strata_qode_hex2rgb("#eaeaea");
if(isset($strata_options['header_separator_color']) && $strata_options['header_separator_color'] != ""){
	$header_separator = strata_qode_hex2rgb($strata_options['header_separator_color']);
}
if(get_post_meta($qode_page_id, "qode_header_border_per_page", true) != ""){
	$header_separator = strata_qode_hex2rgb(get_post_meta($qode_page_id, "qode_header_border_per_page", true));
}

$header_border_transparency_per_page = "";
if(isset($strata_options['header_border_transparency_initial']) && $strata_options['header_border_transparency_initial'] != ""){
	$header_border_transparency_per_page = $strata_options['header_border_transparency_initial'];
}
if(get_post_meta($qode_page_id, "qode_header_border_transparency_per_page", true) != ""){
	$header_border_transparency_per_page = get_post_meta($qode_page_id, "qode_header_border_transparency_per_page", true);
}

$header_borders_color_per_page = "";
if($header_border_transparency_per_page != ""){
	$header_borders_color_per_page = "<style type='text/css'>
			.header_top .left .inner > div,
			.header_top .left .inner > div:last-child,
			.header_top .right .inner > div:first-child,
			.header_top .right .inner > div,
			header .header_top .q_social_icon_holder,
			.header_menu_bottom
			{ border-color:rgba(" . $header_separator[0] . ", " . $header_separator[1] . ", " . $header_separator[2] . ", " . $header_border_transparency_per_page . "); }
			
				</style>";
}elseif($header_border_transparency_per_page == "" && get_post_meta($qode_page_id, "qode_header_border_per_page", true) != ""){
	$header_borders_color_per_page = "<style type='text/css'>
			.header_top .left .inner > div,
			.header_top .left .inner > div:last-child,
			.header_top .right .inner > div:first-child,
			.header_top .right .inner > div,
			header .header_top .q_social_icon_holder,
			.header_menu_bottom
			{ border-color:".get_post_meta($qode_page_id, "qode_header_border_per_page", true)."; }
			
				</style>";
}
if($header_border_transparency_per_page != ""){
	$header_top_color_per_page .= " border-color:rgba(" . $header_separator[0] . ", " . $header_separator[1] . ", " . $header_separator[2] . ", " . $header_border_transparency_per_page . ");";
	$header_color_per_page .= " border-color:rgba(" . $header_separator[0] . ", " . $header_separator[1] . ", " . $header_separator[2] . ", " . $header_border_transparency_per_page . ");";
} elseif($header_border_transparency_per_page == "" && get_post_meta($qode_page_id, "qode_header_border_per_page", true) != ""){
	$header_top_color_per_page .= " border-color:" . get_post_meta($qode_page_id, "qode_header_border_per_page", true) . ";";
	$header_color_per_page .= " border-color:" . get_post_meta($qode_page_id, "qode_header_border_per_page", true) . ";";
}
$header_color_per_page .="'";
$header_top_color_per_page .="'";
$header_bottom_appearance = 'fixed';
if(isset($strata_options['header_bottom_appearance'])){
	$header_bottom_appearance = $strata_options['header_bottom_appearance'];
}

$header_classes = array( $header_style );
$header_classes[] = $header_bottom_appearance;
if ( $display_header_top == "yes" ) {
	$header_classes[] = 'has_top';
}

if ( $header_top_area_scroll == "yes" ) {
	$header_classes[] = "scroll_top";
}

if ( $centered_logo ) {
	$header_classes[] = "centered_logo";
}

if ( is_active_sidebar('header_fixed_right') ) {
	$header_classes[] = "has_header_fixed_right";
}
?>

<header class="page_header <?php echo esc_attr( implode( ' ', $header_classes ) ); ?>">
	<div class="header_inner clearfix">
		
		<?php if(isset($strata_options['enable_search']) && $strata_options['enable_search'] == "yes"){ ?>
			<form role="search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qode_search_form" method="get">
				<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
						<?php } ?>
						
						<i class="fa fa-search"></i>
						<input type="text" placeholder="<?php esc_attr_e('Search', 'strata'); ?>" name="s" class="qode_search_field" autocomplete="off" />
						<input type="submit" value="Search" />
						
						<div class="qode_search_close">
							<a href="#"><i class="fa fa-times"></i></a>
						</div>
						<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
			</form>
		
		<?php } ?>
		<div class="header_top_bottom_holder">
			<?php if($display_header_top == "yes"){ ?>
				<div class="header_top clearfix" <?php echo strata_qode_get_module_part( $header_top_color_per_page ); ?> >
					<?php if($header_in_grid){ ?>
					<div class="container">
						<div class="container_inner clearfix">
							<?php } ?>
							<div class="left">
								<div class="inner">
									<?php
									dynamic_sidebar('header_left');
									?>
								</div>
							</div>
							<div class="right">
								<div class="inner">
									<?php
									dynamic_sidebar('header_right');
									?>
								</div>
							</div>
							<?php if($header_in_grid){ ?>
						</div>
					</div>
				<?php } ?>
				</div>
			<?php } ?>
			<div class="header_bottom clearfix" <?php echo strata_qode_get_module_part( $header_color_per_page ); ?> >
				<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
						<?php } ?>
						<div class="header_inner_left">
							<?php if ( has_nav_menu( 'top-navigation' ) ) { ?>
								<div class="mobile_menu_button"><span><i class="fa fa-bars"></i></span></div>
							<?php } ?>
							<div class="logo_wrapper">
								<?php
								if ( isset( $strata_options['logo_image'] ) && $strata_options['logo_image'] != "" ) {
									$logo_image = $strata_options['logo_image'];
								} else {
									$logo_image = get_template_directory_uri() . '/img/logo.png';
								};
								if ( isset( $strata_options['logo_image_light'] ) && $strata_options['logo_image_light'] != "" ) {
									$logo_image_light = $strata_options['logo_image_light'];
								} else {
									$logo_image_light = get_template_directory_uri() . '/img/logo.png';
								};
								if ( isset( $strata_options['logo_image_dark'] ) && $strata_options['logo_image_dark'] != "" ) {
									$logo_image_dark = $strata_options['logo_image_dark'];
								} else {
									$logo_image_dark = get_template_directory_uri() . '/img/logo_black.png';
								};
								if ( isset( $strata_options['logo_image_sticky'] ) && $strata_options['logo_image_sticky'] != "" ) {
									$logo_image_sticky = $strata_options['logo_image_sticky'];
								} else {
									$logo_image_sticky = get_template_directory_uri() . '/img/logo_black.png';
								};
								?>
								<div class="q_logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="normal" src="<?php echo esc_url( $logo_image ); ?>"	alt="<?php esc_attr_e( 'Logo', 'strata' ); ?>"/>
										<img class="light" src="<?php echo esc_url( $logo_image_light ); ?>" alt="<?php esc_attr_e( 'Logo', 'strata' ); ?>"/>
										<img class="dark" src="<?php echo esc_url( $logo_image_dark ); ?>" alt="<?php esc_attr_e( 'Logo', 'strata' ); ?>"/>
										<img class="sticky" src="<?php echo esc_url( $logo_image_sticky ); ?>" alt="<?php esc_attr_e( 'Logo', 'strata' ); ?>"/>
									</a>
								</div>
							</div>
							<?php if ( $header_bottom_appearance == "stick menu_bottom" && is_active_sidebar( 'header_fixed_right' ) ) { ?>
								<div class="header_fixed_right_area">
									<?php dynamic_sidebar( 'header_fixed_right' ); ?>
								</div>
							<?php } ?>
						</div>
						<?php if ( $header_bottom_appearance != "stick menu_bottom" ){ ?>
							<?php if ( ! $centered_logo ) { ?>
								<div class="header_inner_right">
									<div class="side_menu_button_wrapper right">
										<div class="side_menu_button">
											<?php if(is_active_sidebar('woocommerce_dropdown')) {
												dynamic_sidebar('woocommerce_dropdown');
											} ?>
											<?php get_template_part( 'includes/modules/search-opener' ); ?>
											<?php get_template_part( 'includes/modules/sidearea-opener' ); ?>
										</div>
									</div>
								</div>
							<?php } ?>
							<nav class="main_menu drop_down <?php if ( $menu_position == "" ) { echo 'right'; } ?>">
								<?php
								wp_nav_menu( array(
									'theme_location'  => 'top-navigation',
									'container'       => '',
									'container_class' => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'fallback_cb'     => 'strata_qode_top_navigation_fallback',
									'link_before'     => '<span>',
									'link_after'      => '</span>',
									'walker'          => new strata_qode_type1_walker_nav_menu()
								) );
								?>
							</nav>
							<?php if($centered_logo) { ?>
								<div class="header_inner_right">
									<div class="side_menu_button_wrapper right">
										<div class="side_menu_button">
											<?php if(is_active_sidebar('woocommerce_dropdown')) {
												dynamic_sidebar('woocommerce_dropdown');
											} ?>
											<?php get_template_part( 'includes/modules/search-opener' ); ?>
											<?php get_template_part( 'includes/modules/sidearea-opener' ); ?>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php }else{ ?>
						<div class="header_menu_bottom">
							<div class="header_menu_bottom_inner">
								<?php if($centered_logo) { ?>
								<div class="main_menu_header_inner_right_holder with_center_logo">
									<?php } else { ?>
									<div class="main_menu_header_inner_right_holder">
										<?php } ?>
										<nav class="main_menu drop_down">
											<?php
											wp_nav_menu( array(
												'theme_location' => 'top-navigation' ,
												'container'  => '',
												'container_class' => '',
												'menu_class' => 'clearfix',
												'menu_id' => '',
												'fallback_cb' => 'strata_qode_top_navigation_fallback',
												'link_before' => '<span>',
												'link_after' => '</span>',
												'walker' => new strata_qode_type1_walker_nav_menu()
											));
											?>
										</nav>
										<div class="header_inner_right">
											<div class="side_menu_button_wrapper right">
												<div class="side_menu_button">
													<?php if(is_active_sidebar('woocommerce_dropdown')) {
														dynamic_sidebar('woocommerce_dropdown');
													} ?>
													<?php get_template_part( 'includes/modules/search-opener' ); ?>
													<?php get_template_part( 'includes/modules/sidearea-opener' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<nav class="mobile_menu">
								<?php
								wp_nav_menu( array(
									'theme_location'  => 'top-navigation',
									'container'       => '',
									'container_class' => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'fallback_cb'     => 'strata_qode_top_navigation_fallback',
									'link_before'     => '<span>',
									'link_after'      => '</span>',
									'walker'          => new strata_qode_type2_walker_nav_menu()
								) );
								?>
							</nav>
							<?php if ( $header_in_grid ){ ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
</header>
<?php echo strata_qode_get_module_part( $header_borders_color_per_page ); ?>