<?php 
/*
Template Name: Blog Large Image Whole Post 
*/ 
?>
<?php get_header(); ?>
<?php
$strata_options  = strata_qode_return_global_options();
$qode_page_id    = strata_qode_get_page_id();
$qode_sidebar    = strata_qode_get_sidebar_layout();
$qode_blog_query = strata_qode_get_blog_query_posts();

if ( $strata_options['number_of_chars_large_image'] ) {
	strata_qode_set_blog_word_count( $strata_options['number_of_chars_large_image'] );
}
?>
	<?php get_template_part( 'title' ); ?>
	<?php get_template_part( 'slider' ); ?>
	<div class="container" <?php strata_qode_inline_page_background_style( $qode_page_id ); ?>>
		<div class="container_inner">
				<?php if(($qode_sidebar == "default")||($qode_sidebar == "")) : ?>
					<div class="blog_holder blog_large_image">
						<?php if($qode_blog_query->have_posts() ) : while ( $qode_blog_query->have_posts() ) : $qode_blog_query->the_post(); ?>
								<?php 
									get_template_part('blog_large_image_whole_post', 'loop');
								?>
						<?php endwhile; ?>
						<?php else: //If no posts are present ?>
								<div class="entry">                        
										<p><?php esc_html_e('No posts were found.', 'strata'); ?></p>
								</div>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
						<?php strata_qode_get_blog_pagination( $qode_blog_query ); ?>
					</div>			
				<?php elseif($qode_sidebar == "1" || $qode_sidebar == "2"): ?>
					<div class="<?php if($qode_sidebar == "1"):?>two_columns_66_33<?php elseif($qode_sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
						<div class="column1">
							<div class="column_inner">
								<div class="blog_holder blog_large_image">
									<?php if($qode_blog_query->have_posts() ) : while ( $qode_blog_query->have_posts() ) : $qode_blog_query->the_post(); ?>
										<?php 
											get_template_part('blog_large_image_whole_post', 'loop');
										?>
									<?php endwhile; ?>
									<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php esc_html_e('No posts were found.', 'strata'); ?></p>
									</div>
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
									<?php strata_qode_get_blog_pagination( $qode_blog_query ); ?>
								</div>					
							</div>
						</div>
						<div class="column2">
							<?php get_sidebar(); ?>	
						</div>
					</div>
				<?php elseif($qode_sidebar == "3" || $qode_sidebar == "4"): ?>
						<div class="<?php if($qode_sidebar == "3"):?>two_columns_33_66<?php elseif($qode_sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
							<div class="column1">
								<?php get_sidebar(); ?>	
							</div>
							<div class="column2">
								<div class="column_inner">
									<div class="blog_holder blog_large_image">
										<?php if($qode_blog_query->have_posts() ) : while ( $qode_blog_query->have_posts() ) : $qode_blog_query->the_post(); ?>
												<?php 
													get_template_part('blog_large_image_whole_post', 'loop');
												?>
										<?php endwhile; ?>
										<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php esc_html_e('No posts were found.', 'strata'); ?></p>
												</div>
										<?php endif; ?>
										<?php wp_reset_postdata(); ?>
										<?php strata_qode_get_blog_pagination( $qode_blog_query ); ?>
									</div>			
								</div>
							</div>
							
						</div>
				<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>