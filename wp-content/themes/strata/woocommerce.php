<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php
get_header();

$qode_sidebar = strata_qode_get_sidebar_layout( true );

?>
        <?php get_template_part( 'title' ); ?>
		<?php get_template_part( 'slider' ); ?>
		<?php get_template_part( 'includes/modules/back-to-top' ); ?>
		<div class="container">
			<div class="container_inner clearfix">
				<?php if(!is_singular('product')) { ?>
					<?php if(($qode_sidebar == "default")||($qode_sidebar == "")) : ?>
						<?php strata_qode_woocommerce_content(); ?>
					<?php elseif($qode_sidebar == "1" || $qode_sidebar == "2"): ?>
					<?php strata_qode_set_number_of_columns_woo_product_list(); ?>
					<?php if($qode_sidebar == "1") : ?>
						<div class="two_columns_66_33 grid2 clearfix">
							<div class="column1">
					<?php elseif($qode_sidebar == "2") : ?>
						<div class="two_columns_75_25 grid2 clearfix">
							<div class="column1">
					<?php endif; ?>
								<div class="column_inner">
									<?php strata_qode_woocommerce_content(); ?>
								</div>
							</div>
							<div class="column2"><?php get_sidebar();?></div>
						</div>
					<?php elseif($qode_sidebar == "3" || $qode_sidebar == "4"): ?>
						<?php strata_qode_set_number_of_columns_woo_product_list(); ?>
						<?php if($qode_sidebar == "3") : ?>
							<div class="two_columns_33_66 grid2 clearfix">
								<div class="column1"><?php get_sidebar();?></div>
								<div class="column2">
						<?php elseif($qode_sidebar == "4") : ?>
							<div class="two_columns_25_75 grid2 clearfix">
								<div class="column1"><?php get_sidebar();?></div>
								<div class="column2">
						<?php endif; ?>
									<div class="column_inner">
										<?php strata_qode_woocommerce_content(); ?>
									</div>
								</div>
							</div>
					<?php endif; ?>
                <?php } else {
					strata_qode_woocommerce_content();
                } ?>
			</div>
		</div>
	<?php get_footer(); ?>