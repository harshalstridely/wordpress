<?php
$strata_options     = strata_qode_return_global_options();
$enable_side_area = "yes";

if ( isset( $strata_options['enable_side_area'] ) && $strata_options['enable_side_area'] == "no" ) {
	$enable_side_area = "no";
}

if ( $enable_side_area != "no" && is_active_sidebar( 'sidearea' ) ) { ?>
	<a class="side_menu_button" href="javascript:void(0)">
		<i class="fa fa-bars"></i>
	</a>
<?php } ?>