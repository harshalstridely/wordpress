<?php 
/*
Template Name: Full Width
*/ 
?>
<?php
$qode_page_id = strata_qode_get_page_id();
$qode_sidebar = strata_qode_get_sidebar_layout( false );
?>
	<?php get_header(); ?>
	<?php get_template_part( 'title' ); ?>
	<?php get_template_part( 'slider' ); ?>
	<div class="full_width" <?php strata_qode_inline_page_background_style( $qode_page_id ); ?>>
	<div class="full_width_inner">
		<?php if(($qode_sidebar == "default")||($qode_sidebar == "")) : ?>
			<?php if (have_posts()) : 
					while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php strata_qode_wp_link_pages(); ?>
					<?php echo strata_qode_get_comments_template( true ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
		<?php elseif($qode_sidebar == "1" || $qode_sidebar == "2"): ?>		
			
			<?php if($qode_sidebar == "1") : ?>	
				<div class="two_columns_66_33 clearfix grid2">
					<div class="column1">
			<?php elseif($qode_sidebar == "2") : ?>	
				<div class="two_columns_75_25 clearfix grid2">
					<div class="column1">
			<?php endif; ?>
					<?php if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
						<div class="column_inner">
						
						<?php the_content(); ?>
						<?php strata_qode_wp_link_pages(); ?>
						<?php echo strata_qode_get_comments_template( true ); ?>
						</div>
				<?php endwhile; ?>
				<?php endif; ?>
			
							
					</div>
					<div class="column2"><?php get_sidebar();?></div>
				</div>
			<?php elseif($qode_sidebar == "3" || $qode_sidebar == "4"): ?>
				<?php if($qode_sidebar == "3") : ?>	
					<div class="two_columns_33_66 clearfix grid2">
						<div class="column1"><?php get_sidebar();?></div>
						<div class="column2">
				<?php elseif($qode_sidebar == "4") : ?>	
					<div class="two_columns_25_75 clearfix grid2">
						<div class="column1"><?php get_sidebar();?></div>
						<div class="column2">
				<?php endif; ?>
						<?php if (have_posts()) : 
							while (have_posts()) : the_post(); ?>
							<div class="column_inner">
							<?php the_content(); ?>
							<?php strata_qode_wp_link_pages(); ?>
							<?php echo strata_qode_get_comments_template( true ); ?>
							</div>
					<?php endwhile; ?>
					<?php endif; ?>
				
								
						</div>
						
					</div>
			<?php endif; ?>
	</div>
	</div>	
	<?php get_footer(); ?>