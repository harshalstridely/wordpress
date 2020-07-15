<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	
	<?php
	/**
	 * strata_qode_action_header_meta hook
	 *
	 * @see strata_core_header_meta() - hooked with 10
	 * @see strata_qode_user_scalable_meta() - hooked with 10
	 */
	do_action( 'strata_qode_action_header_meta' );
	?>
	
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'includes/modules/preloader' ); ?>
	<?php get_template_part( 'includes/modules/sidearea' ); ?>
	<div class="wrapper">
	<div class="wrapper_inner">
		<?php do_action( 'strata_qode_after_wrapper_inner_begin' ); ?>

		<?php get_template_part( 'includes/modules/header' ); ?>
		<?php get_template_part( 'includes/modules/back-to-top' ); ?>
		<div class="content <?php echo strata_qode_get_content_classes(); ?>">
			<?php do_action( 'strata_qode_after_content_begin' ); ?>
			
			<div class="<?php echo esc_attr( apply_filters( 'strata_qode_content_classes', 'content_inner' ) ); ?>">
				<?php do_action( 'strata_qode_after_content_inner_begin' ); ?>
			