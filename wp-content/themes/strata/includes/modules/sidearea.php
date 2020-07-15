<?php
$strata_options     = strata_qode_return_global_options();
$enable_side_area = "yes";

if ( isset( $strata_options['enable_side_area'] ) && $strata_options['enable_side_area'] == "no" ) {
	$enable_side_area = "no";
}

if ( $enable_side_area != "no" && is_active_sidebar( 'sidearea' ) ) { ?>
	<section class="side_menu right">
		<div class="side_menu_title">
			<?php if ( isset( $strata_options['side_area_title'] ) && $strata_options['side_area_title'] != "" ) {
				echo '<h4>' . wp_kses_post( $strata_options['side_area_title'] ) . '</h4>';
			} ?>
		</div>
		<?php dynamic_sidebar( 'sidearea' ); ?>
	</section>
<?php } ?>