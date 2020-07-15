<?php get_header(); ?>
<?php
$qode_sidebar = strata_qode_get_sidebar_layout();
?>
	<?php get_template_part( 'title' ); ?>
	
	<div class="container">
	<div class="container_inner clearfix">
		<?php if(($qode_sidebar == "default")||($qode_sidebar == "")) : ?>
			<div class="blog_holder blog_large_image">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
						<?php 
							get_template_part('blog_search', 'loop');
						?>
				<?php endwhile; ?>
				<?php else: //If no posts are present ?>
						<div class="entry">                        
								<p><?php esc_html_e('No posts were found.', 'strata'); ?></p>
						</div>
				<?php endif; ?>
				<?php strata_qode_get_blog_pagination( strata_qode_return_global_wp_query() ); ?>
			</div>	
		<?php elseif($qode_sidebar == "1" || $qode_sidebar == "2"): ?>
			<div class="<?php if($qode_sidebar == "1"):?>two_columns_66_33<?php elseif($qode_sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
				<div class="column1">
					<div class="column_inner">
						<div class="blog_holder blog_large_image">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<?php 
										get_template_part('blog_search', 'loop');
									?>
							<?php endwhile; ?>
							<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php esc_html_e('No posts were found.', 'strata'); ?></p>
									</div>
							<?php endif; ?>
							<?php strata_qode_get_blog_pagination( strata_qode_return_global_wp_query() ); ?>
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
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<?php 
										get_template_part('blog_search', 'loop');
									?>
							<?php endwhile; ?>
							<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php esc_html_e('No posts were found.', 'strata'); ?></p>
									</div>
							<?php endif; ?>
							<?php strata_qode_get_blog_pagination( strata_qode_return_global_wp_query() ); ?>
						</div>	
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
	
<?php get_footer(); ?>