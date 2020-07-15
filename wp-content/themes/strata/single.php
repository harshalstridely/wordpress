<?php
$qode_page_id = strata_qode_get_page_id();
$qode_sidebar = strata_qode_get_sidebar_layout( false );
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part( 'slider' ); ?>
				<div class="container" <?php strata_qode_inline_page_background_style( $qode_page_id ); ?>>
					<div class="container_inner">
				
					<?php if(($qode_sidebar == "default")||($qode_sidebar == "")) : ?>
						<div class="blog_holder blog_single">
						<?php 
							get_template_part('blog_single', 'loop');
						?>
						<?php if ( strata_qode_is_comments_enabled() ) {
							comments_template( '', true );
						} else {
							echo "<br/><br/>";
						} ?>
					<?php elseif($qode_sidebar == "1" || $qode_sidebar == "2"): ?>
						<?php if($qode_sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
						<?php elseif($qode_sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1">
						<?php endif; ?>
					
									<div class="column_inner">
										<div class="blog_holder blog_single">	
											<?php 
												get_template_part('blog_single', 'loop');
											?>
										</div>
										<?php if ( strata_qode_is_comments_enabled() ) {
											comments_template( '', true );
										} else {
											echo "<br/><br/>";
										} ?>
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($qode_sidebar == "3" || $qode_sidebar == "4"): ?>
							<?php if($qode_sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($qode_sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
										<div class="column_inner">
											<div class="blog_holder blog_single">	
												<?php 
													get_template_part('blog_single', 'loop');
												?>
											</div>
											<?php if ( strata_qode_is_comments_enabled() ) {
												comments_template( '', true );
											} else {
												echo "<br/><br/>";
											} ?>
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
					</div>
				</div>
			</div>						
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	