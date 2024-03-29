<?php
$_post_format = get_post_format();
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
				<?php if($_video_type == "youtube") { ?>
					<iframe src="https://www.youtube.com/embed/<?php echo esc_attr(get_post_meta(get_the_ID()), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
				<?php } elseif ($_video_type == "vimeo"){ ?>
					<iframe src="https://player.vimeo.com/video/<?php echo esc_attr(get_post_meta(get_the_ID()), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } elseif ($_video_type == "self"){ ?> 
					<div class="video"> 
					<div class="mobile-video-image" style="background-image: url(<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>);"></div> 
					<div class="video-wrap"  > 
						<video class="video" poster="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" preload="auto"> 
							<?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo get_post_meta(get_the_ID(), "video_format_webm", true);  ?>"> <?php } ?> 
							<?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>"> <?php } ?> 
							<?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo get_post_meta(get_the_ID(), "video_format_ogv", true);  ?>"> <?php } ?> 
							<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"> 
								<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" /> 
								<param name="flashvars" value="controls=true&file=<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>" /> 
								<img src="<?php echo esc_url(get_post_meta(get_the_ID()), "video_format_image", true);  ?>" width="1920" height="800" title="<?php esc_attr_e( 'No video playback capabilities', 'strata' ); ?>" alt="<?php esc_attr_e( 'Video thumb', 'strata' ); ?>" />
							</object> 
						</video>   
					</div></div> 
				<?php } ?>
			</div>
			<div class="post_text">
				<h4><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="post_description">
					<div class="post_description_left">
						<span class="date"><i class="fa fa-clock-o"></i><?php the_time('H:i d F'); ?></span>
						<?php esc_html_e('in','strata'); ?> <?php the_category(', '); ?>
						<?php esc_html_e('by','strata'); ?> <a target="_self" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
					</div>
				</div>
				<?php strata_qode_excerpt(); ?>
				<div class="post_info">
					<?php if(strata_qode_is_comments_enabled()){ ?>
						<a class="post_comments" href="<?php comments_link(); ?>" target="_self"><i class="fa fa-comment-o"></i><?php comments_number('0 ' . esc_html__('Comments','strata'), '1 '.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata') ); ?></a>
					<?php } ?>
					<?php if( strata_qode_is_like_enabled() ) { ?>
						<span class="blog_like">
							 <?php if(function_exists('qode_like')) { qode_like(); } ?>
						</span>
					<?php } ?>
					<?php if ( strata_qode_is_core_installed() ) {
								echo do_shortcode('[social_share]');
							} ?>
				</div>
			</div>
		</article>	

<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<audio src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
					<?php esc_html_e("Your browser don't support audio player",'strata'); ?>
				</audio>
			</div>
			<div class="post_text">
				<h4><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="post_description">
					<div class="post_description_left">
						<span class="date"><i class="fa fa-clock-o"></i><?php the_time('H:i d F'); ?></span>
						<?php esc_html_e('in','strata'); ?> <?php the_category(', '); ?>
						<?php esc_html_e('by','strata'); ?> <a target="_self" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
					</div>
				</div>
				<?php strata_qode_excerpt(); ?>
				<div class="post_info">
					<?php if(strata_qode_is_comments_enabled()){ ?>
						<a class="post_comments" href="<?php comments_link(); ?>" target="_self"><i class="fa fa-comment-o"></i><?php comments_number('0 ' . esc_html__('Comments','strata'), '1 '.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata') ); ?></a>
					<?php } ?>
					<?php if( strata_qode_is_like_enabled() ) { ?>
						<span class="blog_like">
							 <?php if(function_exists('qode_like')) { qode_like(); } ?>
						</span>
					<?php } ?>
					<?php if ( strata_qode_is_core_installed() ) {
								echo do_shortcode('[social_share]');
							} ?>
				</div>
			</div>
		</article>
<?php
		break;
		case "link":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_text">
					<div class="post_text_holder">
						<div class="post_description">
							<div class="post_description_left">
								<span class="date"><i class="fa fa-clock-o"></i><?php the_time('H:i d F'); ?></span>
								<?php esc_html_e('in','strata'); ?> <?php the_category(', '); ?>
							</div>
						</div>
						<i class="link_mark fa fa-link pull-left"></i>
						<div class="post_title">
							<h4><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						</div>
						<div class="post_info">
							<?php if(strata_qode_is_comments_enabled()){ ?>
								<a class="post_comments" href="<?php comments_link(); ?>" target="_self"><i class="fa fa-comment-o"></i><?php comments_number('0 ' . esc_html__('Comments','strata'), '1 '.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata') ); ?></a>
							<?php } ?>
							<?php if( strata_qode_is_like_enabled() ) { ?>
								<span class="blog_like">
									 <?php if(function_exists('qode_like')) { qode_like(); } ?>
								</span>
							<?php } ?>
							<?php if ( strata_qode_is_core_installed() ) {
								echo do_shortcode('[social_share]');
							} ?>
						</div>
					</div>	
				</div>
			</article>
<?php
		break;
		case "gallery":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_image">
					<div class="flexslider">
						<ul class="slides">
							<?php
							$post_content = get_the_content();
							preg_match( '/\[gallery.*ids=.(.*).\]/', $post_content, $ids );
							
							if ( ! empty( $ids ) ) {
								$array_id = explode( ",", $ids[1] );
								
								foreach ( $array_id as $img_id ) { ?>
									<li>
										<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></a>
									</li>
								<?php }
							}
							?>
						</ul>
					</div>
				</div>
				<div class="post_text">
					<h4><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
					<div class="post_description">
						<div class="post_description_left">
							<span class="date"><i class="fa fa-clock-o"></i><?php the_time('H:i d F'); ?></span>
							<?php esc_html_e('in','strata'); ?> <?php the_category(', '); ?>
							<?php esc_html_e('by','strata'); ?> <a target="_self" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
						</div>
					</div>
					<?php strata_qode_excerpt(); ?>
					<div class="post_info">
						<?php if(strata_qode_is_comments_enabled()){ ?>
							<a class="post_comments" href="<?php comments_link(); ?>" target="_self"><i class="fa fa-comment-o"></i><?php comments_number('0 ' . esc_html__('Comments','strata'), '1 '.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata') ); ?></a>
						<?php } ?>
						<?php if( strata_qode_is_like_enabled() ) { ?>
							<span class="blog_like">
								 <?php if(function_exists('qode_like')) { qode_like(); } ?>
							</span>
						<?php } ?>
						<?php if ( strata_qode_is_core_installed() ) {
								echo do_shortcode('[social_share]');
							} ?>
					</div>
				</div>
			</article>
<?php
		break;
		case "quote":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_text">
				<div class="post_text_holder">
					<div class="post_description">
						<div class="post_description_left">
							<span class="date"><i class="fa fa-clock-o"></i><?php the_time('H:i d F'); ?></span>
							<?php esc_html_e('in','strata'); ?> <?php the_category(', '); ?>
						</div>
					</div>
					<i class="qoute_mark fa fa-quote-right pull-left"></i>
					<div class="post_title">
						<h4><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></a></h4>
						<span class="quote_author">&mdash; <?php the_title(); ?></span>
					</div>
					<div class="post_info">
						<?php if(strata_qode_is_comments_enabled()){ ?>
							<a class="post_comments" href="<?php comments_link(); ?>" target="_self"><i class="fa fa-comment-o"></i><?php comments_number('0 ' . esc_html__('Comments','strata'), '1 '.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata') ); ?></a>
						<?php } ?>
						<?php if( strata_qode_is_like_enabled() ) { ?>
							<span class="blog_like">
								 <?php if(function_exists('qode_like')) { qode_like(); } ?>
							</span>
						<?php } ?>
						<?php if ( strata_qode_is_core_installed() ) {
								echo do_shortcode('[social_share]');
							} ?>
					</div>
				</div>	
			</div>
		</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>
				</div>
			<?php } ?>
			<div class="post_text">
				<a class="masonry_avatar" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
					<?php echo get_avatar( get_the_author_meta('user_email'), $size = '47'); ?>
				</a>
				<h4><a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				<div class="post_description">
					<div class="post_description_left">
						<span class="date"><i class="fa fa-clock-o"></i><?php the_time('H:i d F'); ?></span>
						<?php esc_html_e('in','strata'); ?> <?php the_category(', '); ?>
						<?php esc_html_e('by','strata'); ?> <a target="_self" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
					</div>
				</div>
				<?php strata_qode_excerpt(); ?>
				<div class="post_info">
					<?php if(strata_qode_is_comments_enabled()){ ?>
						<a class="post_comments" href="<?php comments_link(); ?>" target="_self"><i class="fa fa-comment-o"></i><?php comments_number( '0 ' . esc_html__('Comments','strata'), '1 '.esc_html__('Comment','strata'), '% '.esc_html__('Comments','strata') ); ?></a>
					<?php } ?>
					<?php if( strata_qode_is_like_enabled() ) { ?>
						<span class="blog_like">
							 <?php if(function_exists('qode_like')) { qode_like(); } ?>
						</span>
					<?php } ?>
					<?php if ( strata_qode_is_core_installed() ) {
								echo do_shortcode('[social_share]');
							} ?>
				</div>
			</div>
		</article>
<?php
}
?>		

