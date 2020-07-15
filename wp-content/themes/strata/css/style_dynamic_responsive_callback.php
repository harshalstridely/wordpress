<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
    require_once( $root.'/wp-config.php' );
} else {
	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
    require_once( $root.'/wp-config.php' );
	}
}
header("Content-type: text/css; charset=utf-8");
$strata_options = strata_qode_return_global_options();
?>
@media only screen and (max-width: 1000px){
	<?php if (!empty($strata_options['header_background_color'])) { ?>
	.header_bottom {
		background-color: <?php echo esc_attr($strata_options['header_background_color']);  ?>;
	}
	<?php } ?>
}
@media only screen and (min-width: 480px) and (max-width: 768px){
	
	<?php if (isset($strata_options['parallax_minheight']) && !empty($strata_options['parallax_minheight'])) { ?>
        section.parallax_section_holder{
		height: auto !important;
		min-height: <?php echo intval($strata_options['parallax_minheight']); ?>px;
	}
	<?php } ?>
	
	<?php if (isset($strata_options['header_background_color_mobile']) &&  !empty($strata_options['header_background_color_mobile'])) { ?>
	header
	{
		 background-color: <?php echo esc_attr($strata_options['header_background_color_mobile']);  ?> !important;
		 background-image:none;
	}
	<?php } ?>
}

@media only screen and (max-width: 480px){
	
	<?php if (isset($strata_options['parallax_minheight']) && !empty($strata_options['parallax_minheight'])) { ?>
	section.parallax_section_holder{
		height: auto !important;
		min-height: <?php echo intval($strata_options['parallax_minheight']); ?>px;
	}
	<?php } ?>
	
	
	<?php if (isset($strata_options['header_background_color_mobile']) &&  !empty($strata_options['header_background_color_mobile'])) { ?>
	header
	{
		 background-color: <?php echo esc_attr($strata_options['header_background_color_mobile']);  ?> !important;
		 background-image:none;
	}
	<?php } ?>
}