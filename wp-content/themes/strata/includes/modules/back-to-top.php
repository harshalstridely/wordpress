<?php
$strata_options = strata_qode_return_global_options();

if ( $strata_options['show_back_button'] == "yes" ) { ?>
	<a id='back_to_top' href='#'>
		<span class="fa-stack">
			<i class="fa fa-angle-up"></i>
		</span>
	</a>
<?php } ?>