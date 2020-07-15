<?php
$strata_options       = strata_qode_return_global_options();
$enable_search_opener = false;

if ( isset( $strata_options['enable_search'] ) && $strata_options['enable_search'] == "yes" ) {
	$enable_search_opener = true;
}

if ( $enable_search_opener ) { ?>
	<a class="search_button" href="javascript:void(0)">
		<i class="fa fa-search"></i>
	</a>
<?php } ?>