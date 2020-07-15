<?php
$strata_revslider = get_post_meta( strata_qode_get_page_id(), "qode_revolution-slider", true );

if ( ! empty( $strata_revslider ) ) { ?>
	<div class="q_slider">
		<div class="q_slider_inner">
			<?php echo do_shortcode( $strata_revslider ); ?>
		</div>
	</div>
	<?php
}
?>